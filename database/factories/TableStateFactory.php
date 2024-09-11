<?php

namespace Database\Factories;

use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TableState>
 */
class TableStateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'table_id' => \App\Models\Table::factory()->lazy(),
            'company_id' => \App\Models\Company::factory()->lazy(),
            'user_id' => \App\Models\User::factory()->lazy(),
            'status' => TableStatus::getRandomCase(),
        ];
    }
}
