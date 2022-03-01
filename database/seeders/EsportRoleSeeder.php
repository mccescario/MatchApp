<?php

namespace Database\Seeders;

use App\Models\EsportRole;
use Illuminate\Database\Seeder;

class EsportRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EsportRole::insert([
            // dota 2
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Carry",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Mid",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Offlaner",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Support",
                "created_at" => now(),
                "updated_at" => now()
            ],
            

            //for valorant
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Sentinel",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Controller",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Duelist",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Initiator",
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
