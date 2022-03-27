<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
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
                'firstname'          => 'Admin',
                'lastname'           => 'Testing',
                'email'              => 'admin@gmail.com',
                'role'               => 1,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret12'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'firstname'          => 'Host',
                'lastname'           => 'Testing',
                'email'              => 'host@gmail.com',
                'role'               => 2,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret12'),
                'created_at' => now(),
                'updated_at' => now()

            ]
        ]);

        User::insert([
            [
                'firstname'          => 'Normal',
                'lastname'           => 'Testing',
                'email'              => 'normal@gmail.com',
                'student_number' => "2016".rand(10000,99999),
                'birthdate' => "02/29/2001",
                'course' => Course::all()->random()->course_title,
                'role'               => 3,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret12'),
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'firstname'          => 'Marthen Christ',
                'lastname'           => 'Escario',
                'email'              => 'mccescario@gmail.com',
                'student_number' => "201811926",
                'birthdate' => "01/31/1995",
                'course' => Course::all()->random()->course_title,
                'role'               => 3,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret12'),
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
