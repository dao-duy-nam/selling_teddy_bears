<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VariantImage>
 */
class VariantImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'variant_id' => \App\Models\Variant::inRandomOrder()->value('id'),
            'image' => $this->faker->imageUrl(400, 400, 'variant image'),
        ];
    }
}
