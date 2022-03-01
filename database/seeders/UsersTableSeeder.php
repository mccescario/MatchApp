<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'                 => 1,
                'firstname'          => 'Admin',
                'lastname'           => 'Testing',
                'email'              => 'admin@gmail.com',
                'role'               => 1,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                //'profile_id'         => 0,
            ],
            [
                'id'                 => 2,
                'firstname'          => 'Host',
                'lastname'           => 'Testing',
                'email'              => 'host@gmail.com',
                'role'               => 2,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                //'profile_id'         => 0,

            ],
            [
                'id'                 => 3,
                'firstname'          => 'Normal',
                'lastname'           => 'Testing',
                'email'              => 'normal@gmail.com',
                'role'               => 3,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                //'profile_id'         => 0,

            ],
            [
                'id'                 => 4,
                'firstname'          => 'Bryan',
                'lastname'           => 'Bernardo',
                'email'              => 'bryanbernardo9828@gmail.com',
                'role'               => 3,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                //'profile_id'         => 0,

            ],
        ]);
    }
}
