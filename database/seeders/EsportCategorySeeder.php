<?php

namespace Database\Seeders;

use App\Models\EsportCategory;
use Illuminate\Database\Seeder;

class EsportCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EsportCategory::insert([
            [
                'olympic_category_id' => 2,
                'esport_category_name' => 'Dota 2',
                'created_at' => now(),
                'updated_at' => now()
                
            ],
            [
                'olympic_category_id' => 2,
                "esport_category_name" => "Valorant",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
