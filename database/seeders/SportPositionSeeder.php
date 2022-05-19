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
                "is_captain" => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Power Forward',
                "is_captain" => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Small Forward',
                "is_captain" => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Point Guard',
                "is_captain" => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 1,
                'sport_position_name' => 'Shooting Guard',
                "is_captain" => false,
                'created_at' => now(),
                'updated_at' => now()
            ],

            //for volleyball
            [
                'sport_category_id' => 2,
                'sport_position_name' => 'Setter',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 2,
                'sport_position_name' => 'Outside Hitter',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 2,
                'sport_position_name' => 'Opposite Hitter',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 2,
                'sport_position_name' => 'Middle Blocker',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 2,
                'sport_position_name' => 'Libero',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 2,
                'sport_position_name' => 'Defensive Specialist',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],

            //for football
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Goalkeeper',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Right Fullback',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Left Fullback',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Center Back',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Sweeper',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Defending/Holding Midfielder',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Right Midfielder/Winger',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Central/Box-to-Box Midfielder',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Striker',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Attacking Midfielder/Playmaker',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sport_category_id' => 3,
                'sport_position_name' => 'Left Midfielder/Wingers',
                "is_captain" => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
