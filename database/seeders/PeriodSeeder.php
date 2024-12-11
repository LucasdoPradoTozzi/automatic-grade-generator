<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periods = [
            [
                "name" => "Morning"
            ],
            [
                "name" => "Afternoon"
            ],
            [
                "name" => "Night"
            ]
        ];

        foreach ($periods as $period) {
            Period::factory()->create($period);
        }
    }
}
