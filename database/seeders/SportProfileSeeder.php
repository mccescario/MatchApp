<?php

namespace Database\Seeders;

use App\Models\SportProfile;
use Illuminate\Database\Seeder;

class SportProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SportProfile::insert([
            [
                'olympic_game_id' => 2,
                'sport_profile_height' => '123',
                'sport_profile_weight' => '321',
                'sport_profile_primary_position' => 'Power Forward',
                'sport_profile_secondary_position' => 'Small Forward',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
