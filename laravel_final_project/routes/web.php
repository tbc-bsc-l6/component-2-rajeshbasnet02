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
})->name("newsletter");

//Homepage
Route::get('/', function () {
    return view('welcome');
})->name("homepage");

Route::get("/products/{category}", [\App\Http\Controllers\ProductController::class, "index"])->where('slug', 'books|cds|games')->name("displayproducts");
Route::get("/products/{category}/{id}", [\App\Http\Controllers\ProductController::class, "show"])->where("category", "books|cds|games")->name("individualproduct");
Route::get("/products/{category}/search", [\App\Http\Controllers\ProductController::class, "search"])->where("category", "book|cd|game")->name("searchproducts");


Route::middleware(["user.access", "auth"])->group(function () {

    Route::get("/products/add", [\App\Http\Controllers\ProductController::class, "create"])->name("addproductspage");
    Route::post("/products/add", [\App\Http\Controllers\ProductController::class, "store"])->name("addproducts");

    Route::get("/products/{id}/update", [\App\Http\Controllers\ProductController::class, "edit"])->name("updateproductspage");
    Route::put("/products/{id}/update", [\App\Http\Controllers\ProductController::class, "update"])->name("updateproducts");

    Route::delete("/products/{product}/delete", [\App\Http\Controllers\ProductController::class, "destroy"])->name("deleteproducts");
});

Route::middleware("auth")->group(function () {

    Route::post("/products/comments/add", [\App\Http\Controllers\CommentController::class, 'store'])->name("addcomments");
    Route::delete("/products/comments/{comment}/delete", [\App\Http\Controllers\CommentController::class, 'destroy'])->name("deletecomments");

    Route::get('/dashboard', [\App\Http\Controllers\UserController::class, "index"])->name('dashboard');
    Route::get("/dashboard/admin", [\App\Http\Controllers\UserController::class, "display"])->name("displayadmins");
});

require __DIR__ . '/auth.php';
