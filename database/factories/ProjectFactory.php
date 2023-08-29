<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'language' => fake()->sentence(1),
            'assigned_person' => fake()->firstNameMale(),
            'start_date'=>fake()->date(),
            'end_date'=>fake()->date(),
        ];
    }
}