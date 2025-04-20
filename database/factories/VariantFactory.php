<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::inRandomOrder()->value('id'),
            'size' => $this->faker->randomElement(['S', 'M', 'L']),
            'color' => $this->faker->safeColorName(),
            'price' => $this->faker->randomFloat(2, 100, 500),
            'stock_quantity' => $this->faker->numberBetween(1, 50),
        ];
    }
}
