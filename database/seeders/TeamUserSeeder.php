<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Database\Seeder;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $team1 = Team::find(1);
        $team1->users()->attach([14,1,2,3,4,5]);

        $team2 = Team::find(2);
        $team2->users()->attach([14,6,7,8,9,10]);

        $team3 = Team::find(3);
        $team3->users()->attach([14,1,2,3,4,5,6,7,8,9,10]);

        // TeamUser::insert([
        //     //Valorant
        //     [
        //         'user_id' => 14,
        //         'team_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 1,
        //         'team_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 2,
        //         'team_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 3,
        //         'team_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 4,
        //         'team_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 5,
        //         'team_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],

        //     //Dota 2
        //     [
        //         'user_id' => 14,
        //         'team_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 6,
        //         'team_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 7,
        //         'team_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 8,
        //         'team_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 9,
        //         'team_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'user_id' => 10,
        //         'team_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ]);
    }
}
