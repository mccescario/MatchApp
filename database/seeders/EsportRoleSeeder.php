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
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Mid",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Offlaner",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Support",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Coach/Captain",
                "is_captain" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
            

            //for valorant
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Sentinel",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Controller",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Duelist",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Initiator",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Coach/Captain",
                "is_captain" => true,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
