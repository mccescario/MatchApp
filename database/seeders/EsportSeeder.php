<?php

namespace Database\Seeders;

use App\Models\Esport;
use App\Models\EsportCategory;
use App\Models\EsportRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;

class EsportSeeder extends Seeder
{

    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;
    
    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $count = 50;
        for($i = 0;$i < $count; $i++){
            $esports = Esport::pluck('user_id')->all();
            $esports[] = 101;
            $esports[] = 102;
            $filterUser = User::whereNotIn('id',$esports)->get()->random()->id;
            
            $game = EsportCategory::all()->random()->id;
    
            $dota2ranks = ['HERALD','GUARDIAN','GUARDIAN','GUARDIAN','GUARDIAN','ANCIENT','DIVINE','IMMORTAL'];
            $valorant2ranks = ['IRON','BRONZE','SILVER','GOLD','PLATINUM','DIAMOND','IMMORTAL'];
            $valorantroles = EsportRole::where('esport_category_id',2)->whereNotIn('id',[10])->get()->random()->id;
            $dota2roles = EsportRole::where('esport_category_id',1)->whereNotIn('id',[5])->get()->random()->id;

            Esport::create([
                'user_id'     => $filterUser,
                'esport_category_id' => $game,
                'esport_ign' => $this->faker->name(),
                'esport_level' => rand(50,100),
                'esport_rank' => strtolower($game) == 2 ? collect($valorant2ranks)->random() : collect($dota2ranks)->random(),
                'esport_role_id' => strtolower($game) == 2 ? $valorantroles : $dota2roles,
                'esport_win_rate' => rand(50,100),
            ]);
        }
    }
}
