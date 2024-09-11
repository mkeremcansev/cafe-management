<?php

namespace Database\Factories;

use App\Enums\CartStatus;
use App\Services\MoneyService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
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
            'user_id' => \App\Models\User::factory()->lazy(),
            'table_state_id' => \App\Models\TableState::factory()->lazy(),
            'company_id' => \App\Models\Company::factory()->lazy(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => CartStatus::getRandomCase(),
            'is_before_collection' => false,
            'price' => MoneyService::ofMinor($this->faker->numberBetween(100, 1000)),
            'total_price' => MoneyService::ofMinor($this->faker->numberBetween(100, 1000)),
        ];
    }
}
