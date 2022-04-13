<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 1) {
            return redirect()->route('admin-dashboard');
        }
        elseif ($role == 2) {
            return redirect()->route('host-dashboard');
        }
        elseif ($role == 3) {
            return redirect()->route('player-dashboard');
        }
        else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $validator = [];

        $rules = [];

        if($request->role == 2){
            // $rules = [
            //     'firstname' => ['required'],
            //     'lastname' => ['required'],
            //     'email' => ['required','email','unique:users,email'],
            //     'password' => ['required','min:8'],
            //     'contact_number' => ['required','digits_between:11,12'],
            //     'gender' => ['required','string'],
            //     'birthdate' => ['required','string'],
            //     'role' => ['required']
            // ];
            $request->validate([
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','email','unique:users,email'],
                'password' => ['required','min:8'],
                'contact_number' => ['required','digits_between:11,12'],
                'gender' => ['required','string'],
                'birthdate' => ['required','string'],
                'role' => ['required']
            ]);

        } else if ($request->role == 3) {
            // $rules = [
            //     'firstname' => ['required'],
            //     'lastname' => ['required'],
            //     'email' => ['required','email','unique:users,email'],
            //     'password' => ['required','min:8'],
            //     'contact_number' => ['required','digits_between:11,12'],
            //     'gender' => ['required','string'],
            //     'course' => ['required','string'],
            //     'student_number' => ['required','string'],
            //     'birthdate' => ['required','string'],
            //     'olympic' => ['required'],
            //     'game' => ['required'],
            //     'game_role' => ['required'],
            //     'role' => ['required']
            // ];
            $request->validate([
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','email','unique:users,email'],
                'password' => ['required','min:8'],
                'contact_number' => ['required','digits_between:11,12'],
                'gender' => ['required','string'],
                'course' => ['required','string'],
                'student_number' => ['required','string'],
                'birthdate' => ['required','string'],
                'category' => ['required'],
                'game' => ['required'],
                'game_role' => ['required'],
                'role' => ['required']
            ]);
        }

        $parseBirthdate = Carbon::now()->format('d-m-Y');
        $verification_code = Str::random(6);
        $email = $request->email;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $password = Hash::make($request->password);
        $contact_number = $request->contact_number;
        $gender = $request->gender;
        $age = Carbon::parse($parseBirthdate)->age;
        $role = $request->role;
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
            return redirect()->route('login')
                    ->with('success','New user has been created successfully.');
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

            $olympic_id = $request->category;
            $game_id = $request->game;
            $game_role_id = $request->game_role;

            if($olympic_id == 1){
                $registerUser->sport()->create([
                    'sport_primary_position_id' => $game_role_id,
                    'sport_category_id' => $game_id
                ]);
            } else if ($olympic_id == 2) {
                $registerUser->esport()->create([
                    'esport_role_id' => $game_role_id,
                    'esport_category_id' => $game_id
                ]);
                return redirect()->route('login')
                    ->with('success','New user has been created successfully.');
            }
        }
    }

    public function logout(Request $request)
    {
        $logout = $request->session()->flush();
        return redirect('/');
    }

}
