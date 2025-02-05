<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->text(),
            'id' => fake()->unique()->numberBetween(1001,1005),
            'name' => fake()->unique()->randomElement([
                'PPLG',
                'Animasi 3D',
                'Animasi 2D',
                'Desain Grafis',
                'Teknik Grafika',

            ]),
        ];
    }
}
