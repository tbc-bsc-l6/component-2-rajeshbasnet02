<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table("categories")->insert([
            "product_category" => "book"
        ]);

        DB::table("categories")->insert([
            "product_category" => "cd"
        ]);

        DB::table("categories")->insert([
            "product_category" => "game"
        ]);

        DB::table("users")->insert([
            "firstname" => "Rajesh",
            "lastname" => "Basnet",
            'email' => "brajesh18@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$zr8ZP58Cny2oW4yLaJwj3eT2qT/GV50mRafS2pR1tRZa7WEjDByc6',
            'remember_token' => Str::random(10),
        ]);

        Product::factory(300)->create();
    }
}
