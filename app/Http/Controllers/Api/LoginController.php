<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Verification;
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
        $validator = Validator::make($request->all(), [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required'],
            'role' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        }
        else{
            $verification_code = Str::random(6);
            $email = $request->email;
            $registerUser = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'verification_code' => $verification_code
            ]);
            $user = $registerUser->fresh();
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
