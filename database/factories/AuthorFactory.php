<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'birthdate' => fake()->dateTimeBetween('-50 years', '-18 years')->format('d/m/Y'),
            'nationality' => fake()->country(),
        ];
    }
}
