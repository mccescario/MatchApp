<?php

namespace Database\Seeders;

use App\Models\Esport;
use Illuminate\Database\Seeder;

class EsportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Esport::insert([
            [
                'user_id'     => 13,
                'esport_name' => 'Dota 2',
                'esport_ign' => 'JohnDoe',
                'esport_level' => '2',
                'esport_rank' => 'Immortal',
                'esport_role' => 'Carry',
                'esport_win_rate' => '52',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 14,
                'esport_name' => 'Valorant',
                'esport_ign' => 'JaneDoe1',
                'esport_level' => '99',
                'esport_rank' => 'Radiant',
                'esport_role' => 'Coach/Captain',
                'esport_win_rate' => '89',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 1,
                'esport_name' => 'Valorant',
                'esport_ign' => 'JaneDoe2',
                'esport_level' => '99',
                'esport_rank' => 'Radiant',
                'esport_role' => 'Duelist',
                'esport_win_rate' => '89',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 2,
                'esport_name' => 'Valorant',
                'esport_ign' => 'JaneDoe3',
                'esport_level' => '99',
                'esport_rank' => 'Immortal',
                'esport_role' => 'Sentinel',
                'esport_win_rate' => '89',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 3,
                'esport_name' => 'Valorant',
                'esport_ign' => 'JaneDoe4',
                'esport_level' => '99',
                'esport_rank' => 'Radiant',
                'esport_role' => 'Initiator',
                'esport_win_rate' => '89',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 4,
                'esport_name' => 'Valorant',
                'esport_ign' => 'JaneDoe5',
                'esport_level' => '99',
                'esport_rank' => 'Radiant',
                'esport_role' => 'Controller',
                'esport_win_rate' => '89',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id'     => 5,
                'esport_name' => 'Valorant',
                'esport_ign' => 'JaneDoe6',
                'esport_level' => '99',
                'esport_rank' => 'Radiant',
                'esport_role' => 'Duelist',
                'esport_win_rate' => '89',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
