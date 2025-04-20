<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->value('id'),
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'total_price' => $this->faker->randomFloat(2, 200, 1000),
            'shipping_address' => $this->faker->address(),
        ];
    }
}
