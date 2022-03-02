<?php

namespace Database\Seeders;

use App\Models\Sport;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sport::insert([
            [
                'user_id'     => 4,
                'sport_name' => 'Basketball',
                'sport_height' => '123',
                'sport_weight' => '321',
                'sport_primary_position' => 'Power Forward',
                'sport_secondary_position' => 'Small Forward',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
