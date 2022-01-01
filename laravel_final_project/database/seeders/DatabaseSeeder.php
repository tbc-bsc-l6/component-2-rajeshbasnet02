<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        Product::factory(10)->create();
    }
}
