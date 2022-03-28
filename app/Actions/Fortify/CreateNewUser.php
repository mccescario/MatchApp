<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\Player\PlayerProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(Users::create([

                'firstname' => $input['firstname'],
                'lastname' => $input['lastname'],
                'email' => $input['email'],
                'birthdate' => $input['birthdate'],
                'gender' => $input['gender'],
                'age' => Carbon::parse($request->birthdate)->diff(Carbon::now())->y,
                'course' => $input['course'],
                'student_number' => $input['student_number'],
                'password' => Hash::make($input['password']),
                'role' => $input['role'],
                'address' => $input['address'] ?? null,
                'contact_number' => $input['contact_number'] ?? null,


            ]), function (Users $user) {
                $this->createProfile($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void

    *protected function createTeam(User $user)
    *{
    *    $user->ownedTeams()->save(Team::forceCreate([
    *        'user_id' => $user->id,
    *        'name' => explode(' ', $user->name, 2)[0]."'s Team",
    *        'personal_team' => true,
    *    ]));
    *}*/

        protected function createProfile(User $user)
        {
            PlayerProfile::create([
                'id' => $user->id
            ]);
        }

}
