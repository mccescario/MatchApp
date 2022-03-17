<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\SportCategory;
use App\Models\SportPosition;
use App\Models\User;
use Illuminate\Container\Container;
use Faker\Generator;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
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
            $sports = Sport::pluck('user_id')->all();
            $sports[] = 101;
            $sports[] = 102;
            $filterUser = User::whereNotIn('id',$sports)->get()->random()->id;
            
            $game = SportCategory::all()->random()->id;
    
            $primary_position = SportPosition::where('sport_category_id',1)->whereNotIn('id',[6])->get()->random()->id;
            $secondary_position = SportPosition::where('sport_category_id',1)->whereNotIn('id',[6])->get()->random()->id;

            Sport::create([
                'user_id'     => $filterUser,
                'sport_category_id' => $game,
                'sport_height' => rand(80,150),
                'sport_weight' => rand(80,150),
                'sport_primary_position_id' => $primary_position,
                'sport_secondary_position_id' => $secondary_position,
            ]);
        }
    }
}
