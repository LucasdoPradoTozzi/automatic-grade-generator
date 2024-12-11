<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            [
                "name" => "Programming SAD",
                "description" => "",
                "course_id" => 1,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Algorithms and Data Structures SAD",
                "description" => "",
                "course_id" => 1,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Relational Database Management SAD",
                "description" => "",
                "course_id" => 1,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Front-end Web Development SAD",
                "description" => "",
                "course_id" => 1,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Software Engineering SAD",
                "description" => "",
                "course_id" => 1,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "IT Project Management SAD",
                "description" => "",
                "course_id" => 1,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Programming GAMES",
                "description" => "",
                "course_id" => 2,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Algorithms and Data Structures GAMES",
                "description" => "",
                "course_id" => 2,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Relational Database Management GAMES",
                "description" => "",
                "course_id" => 2,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Front-end Web Development GAMES",
                "description" => "",
                "course_id" => 2,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Software Engineering GAMES",
                "description" => "",
                "course_id" => 2,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "IT Project Management GAMES",
                "description" => "",
                "course_id" => 2,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Programming SECURITY",
                "description" => "",
                "course_id" => 3,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Algorithms and Data Structures SECURITY",
                "description" => "",
                "course_id" => 3,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Relational Database Management SECURITY",
                "description" => "",
                "course_id" => 3,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Front-end Web Development SECURITY",
                "description" => "",
                "course_id" => 3,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "Software Engineering SECURITY",
                "description" => "",
                "course_id" => 3,
                "period_id" => 3,
                "semester_id" => 1,
            ],
            [
                "name" => "IT Project Management SECURITY",
                "description" => "",
                "course_id" => 3,
                "period_id" => 3,
                "semester_id" => 1,
            ],
        ];

        foreach ($modules as $module) {
            Module::factory()->create($module);
        }
    }
}
