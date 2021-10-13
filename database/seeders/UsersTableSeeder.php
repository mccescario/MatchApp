<?php

namespace Database\Seeders;

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
                'name'               => 'Admin Testing',
                'email'              => 'admin.testing101@gmail.com',
                'role'               => '1',
                'password'           => bcrypt('adminpassword'),
            ],
            [
                'id'                 => 2,
                'name'               => 'Host Testing',
                'email'              => 'host.testing101@gmail.com',
                'role'               => '2',
                'password'           => bcrypt('host-test123'),

            ],
            [
                'id'                 => 3,
                'name'               => 'Normal Testing',
                'email'              => 'normal.testing101@gmail.com',
                'role'               => '3',
                'password'           => bcrypt('normal-test123'),

            ],
        ]);
    }
}
