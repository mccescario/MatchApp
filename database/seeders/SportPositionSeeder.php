<?php

namespace Database\Seeders;

use App\Models\SportPosition;
use Illuminate\Database\Seeder;

class SportPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SportPosition::insert([
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Center',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Power Forward',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Small Forward',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Point Guard',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Shooting Guard',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
