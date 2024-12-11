<?php

namespace Database\Seeders;

use App\Models\Equivalence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquivalenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equivalences = [
            ["main_module_id" => 1, "equivalence_module_id" => 7],
            ["main_module_id" => 1, "equivalence_module_id" => 13],
            ["main_module_id" => 2, "equivalence_module_id" => 8],
            ["main_module_id" => 2, "equivalence_module_id" => 14],
            ["main_module_id" => 3, "equivalence_module_id" => 9],
            ["main_module_id" => 3, "equivalence_module_id" => 15],
            ["main_module_id" => 4, "equivalence_module_id" => 10],
            ["main_module_id" => 4, "equivalence_module_id" => 16],
            ["main_module_id" => 5, "equivalence_module_id" => 11],
            ["main_module_id" => 5, "equivalence_module_id" => 17],
            ["main_module_id" => 6, "equivalence_module_id" => 12],
            ["main_module_id" => 6, "equivalence_module_id" => 18],
        ];

        foreach ($equivalences as $equivalence) {
            Equivalence::factory()->create($equivalence);
        }
    }
}
