<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, User::all()->count()),
            'product_id' => $this->faker->numberBetween(1, Product::all()->count()),
            "comments" => $this->faker->text($maxNbChars = 200),
            "ratings" => $this->faker->numberBetween(1, 5)
        ];
    }
}
