<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory()->lazy(),
            'company_id' => \App\Models\Company::factory()->lazy(),
            'category_id' => \App\Models\Category::factory()->lazy(),
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'price' => \App\Services\MoneyService::ofMinor($this->faker->numberBetween(100, 1000)),
        ];
    }
}
