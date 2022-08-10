<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerPlayer()
    {
        return view('auth.player-register');
    }

    public function storePlayer(Request $request)
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

        // dd($request->all());

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

        return redirect()->route('platform.player-profile');
    }

    public function registerHost()
    {
        return view('auth.host-register');
    }

    public function storeHost(Request $request)
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

        return redirect()->route('platform.profile');
    }
}
