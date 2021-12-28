<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Cd;
use App\Models\Game;
use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(10)->create();
    }
}
