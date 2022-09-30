<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $courses = [
            "BSITWMA",
            "BSITSMBA",
            "BSITDA",
            "BSITAGD",
            "BSCSDS",
            "BSCSSE",
            "BSMADA",
            "BSCE",
            "BSEE",
            "BSECE",
            "BSCPE",
            "BSME"
        ];

        foreach ($courses as $course) {
            Course::create([
                'name' => $course,
            ]);
        }
    }
}
