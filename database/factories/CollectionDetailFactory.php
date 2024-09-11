<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollectionDetail>
 */
class CollectionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory()->lazy(),
            'collection_id' => \App\Models\Collection::factory()->lazy(),
            'user_id' => \App\Models\User::factory()->lazy(),
            'company_id' => \App\Models\Company::factory()->lazy(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => \App\Services\MoneyService::ofMinor($this->faker->numberBetween(100, 1000)),
            'total_price' => \App\Services\MoneyService::ofMinor($this->faker->numberBetween(100, 1000)),
        ];
    }
}
