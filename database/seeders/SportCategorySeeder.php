<?php

namespace Database\Seeders;

use App\Models\SportCategory;
use Illuminate\Database\Seeder;

class SportCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SportCategory::insert([
            [
                'olympic_category_id' => 1,
                'sport_category_name' => 'Basketball',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 1,
                'sport_category_name' => 'Volleybal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 1,
                'sport_category_name' => 'Football',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
