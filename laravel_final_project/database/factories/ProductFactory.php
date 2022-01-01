<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::factory(),
            "category_id" => $this->faker->numberBetween(1, 3),
            "product_author" => $this->faker->name,
            "product_title" => $this->faker->title,
            "product_feature" => $this->faker->numberBetween(10, 100),
            "price" => $this->faker->numberBetween(50, 200),
            "product__description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. "
        ];
    }
}
