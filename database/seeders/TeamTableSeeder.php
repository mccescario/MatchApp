<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\TeamParticipant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Team::insert([
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 1',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 2',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 3',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 4',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 5',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 6',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 7',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 8',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 9',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 10',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 11',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 12',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 13',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 14',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 15',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'olympic_category_id' => 2,
        //         'team_game_id' => 1,
        //         'team_name' => 'Team 16',
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]
        // ]);
        TeamParticipant::insert([
            [
                'tournament_model_id' => 3,
                'team_id' => 6,
                'status' => 'ACCEPTED'
            ],
            [
                'tournament_model_id' => 3,
                'team_id' => 7,
                'status' => 'ACCEPTED'
            ],
            [
                'tournament_model_id' => 3,
                'team_id' => 8,
                'status' => 'ACCEPTED'
            ],
            [
                'tournament_model_id' => 3,
                'team_id' => 9,
                'status' => 'ACCEPTED'
            ],
            [
                'tournament_model_id' => 3,
                'team_id' => 10,
                'status' => 'ACCEPTED'
            ],
            [
                'tournament_model_id' => 3,
                'team_id' => 11,
                'status' => 'ACCEPTED'
            ],
            [
                'tournament_model_id' => 3,
                'team_id' => 12,
                'status' => 'ACCEPTED'
            ],
            [
                'tournament_model_id' => 3,
                'team_id' => 13,
                'status' => 'ACCEPTED'
            ],
            // [
            //     'tournament_model_id' => 2,
            //     'team_id' => 14,
            //     'status' => 'ACCEPTED'
            // ],
            // [

            //     'tournament_model_id' => 2,
            //     'team_id' => 15,
            //     'status' => 'ACCEPTED'
            // ],
            // [
            //     'tournament_model_id' => 2,
            //     'team_id' => 16,
            //     'status' => 'ACCEPTED'
            // ],
            // [
            //     'tournament_model_id' => 2,
            //     'team_id' => 17,
            //     'status' => 'ACCEPTED'
            // ],
            // [
            //     'tournament_model_id' => 2,
            //     'team_id' => 18,
            //     'status' => 'ACCEPTED'
            // ],
            // [
            //     'tournament_model_id' => 2,
            //     'team_id' => 19,
            //     'status' => 'ACCEPTED'
            // ],
            // [
            //     'tournament_model_id' => 2,
            //     'team_id' => 20,
            //     'status' => 'ACCEPTED'
            // ],
            // [
            //     'tournament_model_id' => 2,
            //     'team_id' => 5,
            //     'status' => 'ACCEPTED'
            // ]
        ]);
    }
}
