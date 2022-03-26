<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Verification;
use App\Models\Course;
use App\Models\OlympicCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $return = [];
        $response = ['success' => false];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if($validator->fails()){
            $response['errors'] = $validator->errors()->first();
            $return = response()->json($response, 422);
        }
        else{
            $user = User::with(['esport','sport'])->where('email', $request->email)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {
                $response['errors'] = 'The provided credentials are incorrect.';
                $return = response()->json($response, 401);
            }
            else{
                if(is_null($user->email_verified_at)){
                    $response['errors'] = 'Your account is not yet verified.';
                    $return = response()->json($response, 401);
                }
                else{
                    $response['success'] = true;
                    $response['user'] = $user;

                    $return = response()->json($response, 200);
                }
            }
        }

        return $return;
    }

    public function register(Request $request)
    {
        $response = ['success' => false];
        $return = [];

        $validator = [];

        $rules = [];

        if($request->role == 2){
            $rules = [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','email','unique:users,email'],
                'password' => ['required','min:8'],
                'contact_number' => ['required','digits_between:11,12'],
                'gender' => ['required','string'],
                'birthdate' => ['required','string'],
                'role' => ['required']
            ];
            
        } else if ($request->role == 3) {
            $rules = [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','email','unique:users,email'],
                'password' => ['required','min:8'],
                'contact_number' => ['required','digits_between:11,12'],
                'gender' => ['required','string'],
                'course' => ['required','string'],
                'student_number' => ['required','string'],
                'birthdate' => ['required','string'],
                'olympic_category' => ['required'],
                'game' => ['required'],
                'game_role' => ['required'],
                'role' => ['required']
            ];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        }
        else{
            $parseBirthdate = Carbon::createFromFormat('m-d-Y', $request->birthdate)->format('d-m-Y');
            $verification_code = Str::random(6);
            $email = $request->email;
            $firstname = $request->firstname;
            $lastname = $request->lastname;
            $password = Hash::make($request->password);
            $contact_number = $request->contact_number;
            $gender = $request->gender;
            $age = Carbon::parse($parseBirthdate)->age;
            $role = $request->role;
            $user = [];
            $registerUser = [];

            if($request->role == 2){
                $registerUser = User::create([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => $password,
                    'contact_number' => $contact_number,
                    'gender' => $gender,
                    'birthdate' => $parseBirthdate,
                    'age' => $age,
                    'role' => $role,
                    'verification_code' => $verification_code
                ]);
                $user = $registerUser->fresh();
            } else if ($request->role == 3){
                $course = $request->course;
                $student_number = $request->student_number;
                $registerUser = User::create([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => $password,
                    'contact_number' => $contact_number,
                    'gender' => $gender,
                    'birthdate' => $parseBirthdate,
                    'course' => $course,
                    'student_number' => $student_number,
                    'age' => $age,
                    'role' => $role,
                    'verification_code' => $verification_code
                ]);

                $user = $registerUser->fresh();

                $olympic_id = $request->olympic_information['id'];
               
                if($olympic_id == 1){
                    $game_id = $request->olympic_information['sport_category']['id'];
                    $role_id = $request->olympic_information['sport_category']['sport_position']['id'];
                    $registerUser->sport()->create([
                        'sport_primary_position_id' => $role_id,
                        'sport_category_id' => $game_id
                    ]);
                } else if ($olympic_id == 2) {
                    $game_id = $request->olympic_information['esport_category']['id'];
                    $role_id = $request->olympic_information['esport_category']['esport_role']['id'];
                    $registerUser->esport()->create([
                        'esport_role_id' => $role_id,
                        'esport_category_id' => $game_id
                    ]);
                }
            }

            $this->send_verification($email,$user);
            $response['success'] = true;
            $response['user'] = $user;
            
            $return = response()->json($response, 200);
        }
        
        return $return;
    }

    public function send_verification($email,$data)
    {
        Mail::to($email)->send(new Verification($data));
    }

    public function submit_verification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email']
        ]);
        
        $response = ['success' => false,'is_verified' => false,'code_success' => false];
        $code = $request->code;
        $email = $request->email;

        if($validator->fails()){
            $return = $this->emailValidateError($validator,$response);
        } else{
            $user = User::where('email',$email)->first();
            if($user){
                if(!is_null($user->email_verified_at)){
                    $response['is_verified'] = true;
                    $response['success'] = true;
                    $return = response()->json($response, 200);
                }
                else{
                    if($user->verification_code == $code){
                        $user->update([
                            'email_verified_at' => Carbon::now()->toDateTimeString()
                        ]);
                        $response['success'] = true;
                        $response['code_success'] = true;
                        $return = response()->json($response, 200);
                    } else {
                        $response['errors'] = 'Verification code did not match.';
                        $return = response()->json($response, 422);
                    }
                }
            } else {
                $return = $this->noAccount($response);
            }
        }
        return $return;
    }

    public function register_details()
    {
        $olympics = OlympicCategory::all()->each(function($olympic){
            $olympic->makeVisible(['sport_categories','esport_categories']);
            if($olympic->sport_categories->count() != 0){
                $olympic->sport_categories->each(function($sport){
                    $sport->sport_positions;
                });
            } else {
                unset($olympic->sport_categories);
            }

            if($olympic->esport_categories->count() != 0){
                $olympic->esport_categories->each(function($esport){
                    $esport->esport_roles;
                });
            } else {
                unset($olympic->esport_categories);
            }  
        });
        $olympics->makeHidden(['games']);
        $course = Course::all();

        $data['olympics'] = $olympics;
        $data['courses'] = $course;
        return response()->json($data, 200);
    }

    public function resend_verification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','email']
        ]);

        $response = ['success' => false,'is_verified' => false];
        $return = [];

        if($validator->fails()){
            $return = $this->emailValidateError($validator,$response);
        } else {
            $email = $request->email;
            $user = User::where('email',$email)->first();
            if($user){
                $response['success'] = true;
                if(!is_null($user->email_verified_at)){
                    $response['is_verified'] = true;
                }
                else{
                    $this->send_verification($email,$user);
                }
                $return = response()->json($response, 200);
            }
            else {
                $return = $this->noAccount($response);
            }
        }
        return $return;
    }

    public function noAccount($response)
    {
        $response['errors'] = 'No account associated with email.';
        return response()->json($response, 422);
    }

    public function emailValidateError($validator,$response)
    {
        $response['errors'] = $validator->errors()->first();
        return response()->json($response, 422);
    }
}
