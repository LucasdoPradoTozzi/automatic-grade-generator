<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesters = [
            [
                "name" => "1 Semester"
            ],
            [
                "name" => "2 Semester"
            ],
            [
                "name" => "3 Semester"
            ],
            [
                "name" => "4 Semester"
            ],
            [
                "name" => "5 Semester"
            ],
            [
                "name" => "6 Semester"
            ]
        ];

        foreach ($semesters as $semester) {
            Semester::factory()->create($semester);
        }
    }
}
