<?php

namespace Database\Seeders;

use App\Models\Team;
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
        Team::insert([
            [
                'olympic_category_id' => 2,
                'team_game_id' => 2,
                'team_name' => 'Team Secret',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 2,
                'team_game_id' => 1,
                'team_name' => 'Team Secret',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 1,
                'team_game_id' => 1,
                'team_name' => 'Gilas Pilipinas',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
