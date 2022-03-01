<?php

namespace Database\Seeders;

use App\Models\OlympicCategory;
use Illuminate\Database\Seeder;

class OlympicCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OlympicCategory::insert([
            [
                'olympic_category_name' => "Sports",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_name' => "eSports",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
