<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Database\Seeder;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team1 = Team::find(1);
        $team1->users()->attach([14,1,2,3,4,5]);

        // $team2 = Team::find(2);
        // $team2->users()->attach([6,7,8,9,10]);

        $team3 = Team::find(3);
        $team3->users()->attach([14,1,2,3,4,5,6,7,8,9,10]);
    }
}
