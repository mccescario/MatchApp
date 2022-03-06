<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamMember::insert([
            [
                'team_id' => 1,
                'user_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 1,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 1,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 1,
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 1,
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
