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
            //Valorant
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
            ],

            //Dota 2
            [
                'team_id' => 2,
                'user_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 2,
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 2,
                'user_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 2,
                'user_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 2,
                'user_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'team_id' => 2,
                'user_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
