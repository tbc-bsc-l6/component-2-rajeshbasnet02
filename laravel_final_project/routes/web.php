<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CdController;
use App\Http\Controllers\GameController;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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


//Mailchimp API for newsletter
Route::post('/newsletter', function (Newsletter $newsletter) {

    request()->validate(['email' => "required|email"]);

    try {

        $newsletter->subscribe(request('email'));

    } catch (Exception $exception) {
        throw ValidationException::withMessages([
            'email' => 'Please, enter a valid email address !'
        ]);
    }

    return redirect('/')->with('subscribed', 'Thank you for subscribing our newletter!');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get("/products/{slug}", [\App\Http\Controllers\ProductController::class, "index"])->where('slug', 'books|cds|games');

Route::get("/products/{category}/{id}", [\App\Http\Controllers\ProductController::class, "show"])->where("category", "books|cds|games");
Route::get("/products/search/{category}", [\App\Http\Controllers\ProductController::class, "search"])->where("category", "book|cd|game");


Route::middleware(["user.access", "auth"])->group(function () {
    Route::get("/products", [\App\Http\Controllers\ProductController::class, "create"]);
    Route::post("/products", [\App\Http\Controllers\ProductController::class, "store"]);

    Route::get("/products/update/{id}", [\App\Http\Controllers\ProductController::class, "edit"]);
    Route::post("/products/update/{id}", [\App\Http\Controllers\ProductController::class, "update"]);

    Route::get("/products/delete/{product}", [\App\Http\Controllers\ProductController::class, "destroy"]);
});

Route::post("/products/comment", [\App\Http\Controllers\CommentController::class, 'store'])->middleware("auth");
Route::get('/dashboard', [\App\Http\Controllers\UserController::class, "index"])->name('dashboard')->middleware("auth");


require __DIR__ . '/auth.php';
