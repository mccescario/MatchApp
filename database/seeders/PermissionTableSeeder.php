<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id'    => 1,
                'permission_name' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'permission_name' => 'permission_create',
            ],
            [
                'id'    => 3,
                'permission_name' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'permission_name' => 'permission_show',
            ],
            [
                'id'    => 5,
                'permission_name' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'permission_name' => 'permission_access',
            ],
            [
                'id'    => 7,
                'permission_name' => 'role_create',
            ],
            [
                'id'    => 8,
                'permission_name' => 'role_edit',
            ],
            [
                'id'    => 9,
                'permission_name' => 'role_show',
            ],
            [
                'id'    => 10,
                'permission_name' => 'role_delete',
            ],
            [
                'id'    => 11,
                'permission_name' => 'role_access',
            ],
            [
                'id'    => 12,
                'permission_name' => 'user_create',
            ],
            [
                'id'    => 13,
                'permission_name' => 'user_edit',
            ],
            [
                'id'    => 14,
                'permission_name' => 'user_show',
            ],
            [
                'id'    => 15,
                'permission_name' => 'user_delete',
            ],
            [
                'id'    => 16,
                'permission_name' => 'user_access',
            ],
            [
                'id'    => 17,
                'permission_name' => 'profile_password_edit',
            ],
            [
                'id'    => 18,
                'permission_name' => 'tournament_management_access',
            ],
            [
                'id'    => 19,
                'permission_name' => 'streaming_management_access',
            ],
            [
                'id'    => 20,
                'permission_name' => 'schedule_management_access',
            ],
            [
                'id'    => 21,
                'permission_name' => 'news_management_access',
            ],
            [
                'id'    => 22,
                'permission_name' => 'standing_management_access',
            ],
        ]);

    }
}
