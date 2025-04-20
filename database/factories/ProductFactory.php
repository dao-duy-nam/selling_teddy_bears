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
            'name' => $this->faker->word(),
            'category_id' => \App\Models\Category::inRandomOrder()->value('id'),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 100, 500),
            'stock_quantity' => $this->faker->numberBetween(10, 100),
            'image' => $this->faker->imageUrl(400, 400, 'teddy bear'),
        ];
    }
}
