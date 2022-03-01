<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
            [
                'course_title' => 'BSITWMA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSITSMBA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSITDA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSITAGD',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
