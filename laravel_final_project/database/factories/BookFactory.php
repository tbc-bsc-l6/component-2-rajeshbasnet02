<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' =>$this->faker->firstName,
            'lastname' =>$this->faker->lastName,
            'title' => $this->faker->title,
            'pages' => $this->faker->numberBetween(200, 1000),
            'price' =>$this->faker->numberBetween(20, 80)
        ];
    }
}
