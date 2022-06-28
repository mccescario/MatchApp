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
                "is_captain" => TRUE,
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
                "esport_role_name" => "Support (Roamer)",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 1,
                "esport_role_name" => "Support (Babysitter)",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],


            //for valorant
            [
                "esport_category_id" => 2,
                "esport_role_name" => "Sentinel",
                "is_captain" => TRUE,
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

            //for LoL
            [
                "esport_category_id" => 3,
                "esport_role_name" => "Marksman",
                "is_captain" => TRUE,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 3,
                "esport_role_name" => "Support",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 3,
                "esport_role_name" => "Jungler",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 3,
                "esport_role_name" => "Top Lane",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 3,
                "esport_role_name" => "Middle Lane",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],

            //for LoL - Wild Rift
            [
                "esport_category_id" => 4,
                "esport_role_name" => "Marksman",
                "is_captain" => TRUE,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 4,
                "esport_role_name" => "Support",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 4,
                "esport_role_name" => "Jungler",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 4,
                "esport_role_name" => "Top Lane",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 4,
                "esport_role_name" => "Middle Lane",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],

            //for CS:GO
            [
                "esport_category_id" => 5,
                "esport_role_name" => "Entry Fragger",
                "is_captain" => TRUE,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 5,
                "esport_role_name" => "Support",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 5,
                "esport_role_name" => "In Game Leader",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 5,
                "esport_role_name" => "Lurker",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 5,
                "esport_role_name" => "AWPer",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],

            //for Call of duty: Mobile
            [
                "esport_category_id" => 6,
                "esport_role_name" => "Slayer",
                "is_captain" => TRUE,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 6,
                "esport_role_name" => "Anchor",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 6,
                "esport_role_name" => "Support",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 6,
                "esport_role_name" => "Objective",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],

            //for Mobile Legends
            [
                "esport_category_id" => 7,
                "esport_role_name" => "Tank",
                "is_captain" => TRUE,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 7,
                "esport_role_name" => "Assassin",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 7,
                "esport_role_name" => "Marksman",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 7,
                "esport_role_name" => "Fighter",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 7,
                "esport_role_name" => "Mage",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "esport_category_id" => 7,
                "esport_role_name" => "Support",
                "is_captain" => false,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
