<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('-35 days', 'today')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 40, 100),
            'calories' => $this->faker->optional()->numberBetween(1000, 2500),
            'exercise_time' => $this->faker->optional()->time('H:i:s'),
            'exercise_content' => $this->faker->optional()->sentence(),
        ];
    }
}
