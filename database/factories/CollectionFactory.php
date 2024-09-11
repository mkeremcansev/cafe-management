<?php

namespace Database\Factories;

use App\Enums\CollectionMethod;
use App\Enums\CollectionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'table_state_id' => \App\Models\TableState::factory()->lazy(),
            'user_id' => \App\Models\User::factory()->lazy(),
            'company_id' => \App\Models\Company::factory()->lazy(),
            'amount' => $this->faker->numberBetween(100, 1000),
            'method' => CollectionMethod::getRandomCase(),
            'type' => CollectionType::getRandomCase(),
        ];
    }
}
