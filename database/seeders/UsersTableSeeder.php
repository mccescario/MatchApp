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
                'course' => Course::all()->random()->course_title,
                'role'               => 3,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret12'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'firstname'          => 'MC',
                'lastname'           => 'Escario',
                'email'              => 'mcforgames2@gmail.com',
                'student_number' => "201811926",
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
