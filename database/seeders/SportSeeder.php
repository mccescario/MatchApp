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
                'user_id'     => 14,
                'sport_name' => 'Basketball',
                'sport_height' => '123',
                'sport_weight' => '321',
                'sport_primary_position_id' => 6,
                'sport_secondary_position_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 1,
                'sport_name' => 'Basketball',
                'sport_height' => '123',
                'sport_weight' => '123',
                'sport_primary_position_id' => 1,
                'sport_secondary_position_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 2,
                'sport_name' => 'Basketball',
                'sport_height' => '321',
                'sport_weight' => '111',
                'sport_primary_position_id' => 2,
                'sport_secondary_position_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 3,
                'sport_name' => 'Basketball',
                'sport_height' => '123',
                'sport_weight' => '321',
                'sport_primary_position_id' => 5,
                'sport_secondary_position_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 4,
                'sport_name' => 'Basketball',
                'sport_height' => '123',
                'sport_weight' => '321',
                'sport_primary_position_id' => 4,
                'sport_secondary_position_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 5,
                'sport_name' => 'Basketball',
                'sport_height' => '123',
                'sport_weight' => '321',
                'sport_primary_position_id' => 1,
                'sport_secondary_position_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 6,
                'sport_name' => 'Basketball',
                'sport_height' => '123',
                'sport_weight' => '321',
                'sport_primary_position_id' => 2,
                'sport_secondary_position_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 7,
                'sport_name' => 'Basketball',
                'sport_height' => '111',
                'sport_weight' => '222',
                'sport_primary_position_id' => 2,
                'sport_secondary_position_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 8,
                'sport_name' => 'Basketball',
                'sport_height' => '333',
                'sport_weight' => '444',
                'sport_primary_position_id' => 2,
                'sport_secondary_position_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 9,
                'sport_name' => 'Basketball',
                'sport_height' => '555',
                'sport_weight' => '666',
                'sport_primary_position_id' => 2,
                'sport_secondary_position_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 10,
                'sport_name' => 'Basketball',
                'sport_height' => '112',
                'sport_weight' => '221',
                'sport_primary_position_id' => 2,
                'sport_secondary_position_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
