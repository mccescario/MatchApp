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
                'esport_category_name' => 'Dota 2',
                'created_at' => now(),
                'updated_at' => now()
                
            ],
            [
                "esport_category_name" => "Valorant",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
