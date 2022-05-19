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
            ],
            [
                'course_title' => 'BSCSDS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSCSSE',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSMADA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSCE',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSEE',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSECE',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSCPE',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'course_title' => 'BSME',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
