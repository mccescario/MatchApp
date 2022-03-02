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
                'user_id'     => 3,
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
                'user_id'     => 4,
                'esport_name' => 'Valorant',
                'esport_ign' => 'JaneDoe',
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
