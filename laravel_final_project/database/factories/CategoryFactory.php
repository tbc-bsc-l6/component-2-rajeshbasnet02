<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = ["book", "cd", "game"];

        return [
            "product_category" => $categories[$this->faker->numberBetween(0, 2)]
        ];
    }
}
