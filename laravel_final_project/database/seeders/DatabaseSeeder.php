<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Cd;
use App\Models\Game;
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
        Cd::factory()->count(10)->create();
        Book::factory()->count(10)->create();
        Game::factory()->count(10)->create();
    }
}
