<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CdController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\UserController::class, "index"])->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::get("/products/{slug}", [\App\Http\Controllers\ProductController::class, "index"])->where('slug', 'books|cds|games');
Route::get("/products", [\App\Http\Controllers\ProductController::class, "create"]);
Route::post("/products",[\App\Http\Controllers\ProductController::class, "store"]);

//Route model binding
Route::get("/products/update/{product}", [\App\Http\Controllers\ProductController::class, "edit"]);
Route::post("/products/update/{id}", [\App\Http\Controllers\ProductController::class, "update"]);


Route::get("/products/delete/{product}", [\App\Http\Controllers\ProductController::class, "destroy"]);

Route::get("/products/{category}/{product}", [\App\Http\Controllers\ProductController::class, "show"])->where("category", "books|cds|games");
