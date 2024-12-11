<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModuleHours>
 */
class ModuleHoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "module_id" => 1,
            "week_day" => 1,
            "hour_start" => "19:00:00",
            "hour_end" => "19:50:00",
        ];
    }
}
