<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
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


        //Creating one default user for simplicity
        DB::table("users")->insert([
            "firstname" => "Rajesh",
            "lastname" => "Basnet",
            'email' => "brajesh18@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("test123"),
            'remember_token' => Str::random(10),
        ]);


        //Below are admins
        DB::table("users")->insert([
            "firstname" => "Rajesh",
            "lastname" => "Basnet",
            'role' => 'admin',
            'specific_role' => 'superadmin',
            'email' => "rajeshbasnet@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("test123"),
            'remember_token' => Str::random(10),
        ]);



        DB::table("users")->insert([
            "firstname" => "Sabin",
            "lastname" => "Karki",
            'role' => 'admin',
            'specific_role' => 'cdadmin',
            'email' => "sabin@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("test123"),
            'remember_token' => Str::random(10),
        ]);

        DB::table("users")->insert([
            "firstname" => "Utsav",
            "lastname" => "Basnet",
            'role' => 'admin',
            'specific_role' => 'bookadmin',
            'email' => "raju@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("test123"),
            'remember_token' => Str::random(10),
        ]);

        DB::table("users")->insert([
            "firstname" => "Bikas",
            "lastname" => "Raut",
            'role' => 'admin',
            'specific_role' => 'gameadmin',
            'email' => "bikas@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt("test123"),
            'remember_token' => Str::random(10),
        ]);

        User::factory(100)->create();
        Product::factory(300)->create();
        Comment::factory(900)->create();
    }
}
