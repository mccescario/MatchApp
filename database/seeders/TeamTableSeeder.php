<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teams')->insert([
            [
                'id'                => 1,
                'user_id'           => 1,
                'name'              => 'Admin Team',
                'personal_team'     => true,
            ],
            [
                'id'                => 2,
                'user_id'           => 2,
                'name'              => 'Host Team',
                'personal_team'     => true,
            ],
            [
                'id'                => 3,
                'user_id'           => 3,
                'name'              => 'Player Team',
                'personal_team'     => true,
            ],
        ]);
    }
}
