<?php

namespace Database\Seeders;

use App\Models\OlympicGame;
use Illuminate\Database\Seeder;

class OlympicGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OlympicGame::insert([
            [
                'user_id' => 4,
                'olympic_game_type' => "eSports",
                'olympic_game_name' => "Dota 2",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 4,
                'olympic_game_type' => "Sports",
                'olympic_game_name' => "Basketball",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 3,
                'olympic_game_type' => "eSports",
                'olympic_game_name' => "Valorant",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
