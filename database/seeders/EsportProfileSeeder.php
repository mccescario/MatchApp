<?php

namespace Database\Seeders;

use App\Models\EsportProfile;
use Illuminate\Database\Seeder;

class EsportProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EsportProfile::insert([
            [
                'olympic_game_id' => 1,
                'esport_profile_name' => 'JohnDoe',
                'esport_profile_level' => '2',
                'esport_profile_rank' => 'Immortal',
                'esport_profile_role' => 'Carry',
                'esport_profile_win_rate' => '52',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'olympic_game_id' => 3,
                'esport_profile_name' => 'JaneDoe',
                'esport_profile_level' => '99',
                'esport_profile_rank' => 'Radiant',
                'esport_profile_role' => 'Duelist',
                'esport_profile_win_rate' => '89',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
