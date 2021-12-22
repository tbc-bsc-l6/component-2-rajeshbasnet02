<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'title' => $this->faker->title,
            'duration' => $this->faker->numberBetween(30, 120),
            'price' => $this->faker->numberBetween(10, 60)
        ];
    }
}
