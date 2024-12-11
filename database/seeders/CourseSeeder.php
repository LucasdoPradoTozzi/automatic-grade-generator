<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                "name" => "Systems Analysis and Development",
                "description" => "Learn to become a developer or analyst",
            ],
            [
                "name" => "Digital Games",
                "description" => "Learn to become a game developer",
            ],
            [
                "name" => "Information Security",
                "description" => "Learn to become a security specialist",
            ],
        ];

        foreach ($courses as $course) {
            Course::factory()->create($course);
        }
    }
}
