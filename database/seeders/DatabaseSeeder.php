<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        $this->call([
            //PermissionsTableSeeder::class,
           // RolesTableSeeder::class,
           // PermissionRoleTableSeeder::class,
            // ProfileTableSeeder::class,
            UsersTableSeeder::class,
            //RoleUserTableSeeder::class,
            //TeamTableSeeder::class,
            CourseSeeder::class,
            EsportCategorySeeder::class,
            SportCategorySeeder::class,
            EsportRoleSeeder::class,
            SportPositionSeeder::class,
            EsportSeeder::class,
            SportSeeder::class,
            OlympicCategorySeeder::class,
            TeamTableSeeder::class,
            TeamMemberSeeder::class
        ]);

        
    }
}
