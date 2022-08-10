<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Credentials '
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user' => $user,
        ]);
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = User::findOrFail($request->user_id);

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'message' => 'Invalid Password '
            ], 401);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json(['success' => true]);
    }

    public function register_player(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation',
            'gender' => 'required',
            'sport_id' => 'required|integer',
            'student_number' => 'required|max:255',
        ]);

        $user = User::create([
            'name' => $request->first_name . __(' ') . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->profile()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
        ]);

        $user->player_profile()->create([
            'course_id' => $request->course_id,
            'sport_id' => $request->sport_id,
            'student_number' => $request->student_number,
        ]);

        $permission = collect([
            'player' => '1',
            'platform.index' => '1',
            'platform.systems.attachment' => '1',
        ])
            ->toArray();

        $user->fill(['permissions' => $permission]);
        $user->save();

        Auth::login($user, true);

        return response()->json(['success' => true, 'user' => $user]);
    }

    public function register_host(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation',
            'gender' => 'required',
        ]);

        $user = User::create([
            'name' => $request->first_name . __(' ') . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->profile()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'contact_number' => $request->contact_number,
        ]);

        $permission = collect([
            'host' => '1',
            'platform.index' => '1',
            'platform.systems.attachment' => '1',
        ])
            ->toArray();

        $user->fill(['permissions' => $permission]);
        $user->save();

        Auth::login($user, true);

        return response()->json(['success' => true, 'user' => $user]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

    public function profile()
    {
        return response()->json(Auth::user());
    }
}
