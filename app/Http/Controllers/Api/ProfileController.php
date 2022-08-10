<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update_player(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required|string',
            'email' => [
                'required',
                Rule::unique(User::class, 'email')->ignore($user),
            ],
            'student_number' => 'required',
            'course_id' => 'required',
            'sport_id' => 'required',
        ]);

        $user->update([
            'name' => $request->first_name . __(' ') . $request->last_name,
            'email' => $request->email,
        ]);

        $user->profile()->update($request->only(['first_name', 'last_name']));
        $user->player_profile()->update($request->only(['student_number', 'course_id', 'sport_id']));

        return response()->json([
            'has_change' => true,
            'message' => 'Profile Information Updated',
            'user' => $user,
        ]);
    }
}
