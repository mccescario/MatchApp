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
            ],
            [
                'olympic_category_id' => 2,
                "esport_category_name" => "League of Legends",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 2,
                "esport_category_name" => "League of Legends Wild Rift",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 2,
                "esport_category_name" => "Counter-Strike: Global Offensive",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 2,
                "esport_category_name" => "Call of Duty: Mobile",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_category_id' => 2,
                "esport_category_name" => "Mobile Legends",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
