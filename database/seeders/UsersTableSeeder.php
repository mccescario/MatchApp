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
                'firstname'          => 'Admin',
                'lastname'           => 'Testing',
                'email'              => 'admin@gmail.com',
                'role'               => 1,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'firstname'          => 'Host',
                'lastname'           => 'Testing',
                'email'              => 'host@gmail.com',
                'role'               => 2,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'firstname'          => 'Normal',
                'lastname'           => 'Testing',
                'email'              => 'normal@gmail.com',
                'role'               => 3,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'firstname'          => 'Jason',
                'lastname'           => 'Doe',
                'email'              => 'jasondoe@gmail.com',
                'role'               => 3,
                'email_verified_at'  => now(),
                'password'           => bcrypt('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
