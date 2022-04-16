<?php

namespace Database\Seeders;

use App\Models\Esport;
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
        // $this->call(CourseSeeder::class);
        // User::factory(100)->create();
        $this->call([
            //PermissionsTableSeeder::class,
            // RolesTableSeeder::class,
            // PermissionRoleTableSeeder::class,
            // ProfileTableSeeder::class,
            // RoleUserTableSeeder::class,
            // TeamTableSeeder::class,
             CourseSeeder::class,
             UsersTableSeeder::class,
             OlympicCategorySeeder::class,
             EsportCategorySeeder::class,
             SportCategorySeeder::class,
             EsportRoleSeeder::class,
             SportPositionSeeder::class,
            // EsportSeeder::class,
            // SportSeeder::class,
            // TeamTableSeeder::class,
            // TeamMemberSeeder::class,
            // TeamUserSeeder::class,
        ]);
    }
}
