<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Monolog\Logger;
use function Symfony\Component\String\b;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        switch ($slug) {
            case "books" :
                $books = Category::with("product")->where("product_category", "book")->get();
                return view("book", compact("books"));

            case "cds" :
               $cds = Category::with("product")->where("product_category", "cd")->get();
                return view("cd", compact("cds"));

            case "games" :
               $games = Category::with("product")->where("product_category", "game")->get();
                return view("game", compact("games"));

            default :
                return redirect("/");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("addproduct");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            "product__author" => "required|min:5|max:25",
            "product__title" => "required|min:5|max:30",
            "product__feature" => "required",
            "product__price" => "required",
            "product__desc" => "required|min:10|max:255",
            "product__category" => "required"
        ]);

        $user = Auth::user();

        $category = Category::where("product_category", $result["product__category"])->get()->first();

        $user->product()->create([
            "category_id" => $category->id,
            "product_author" => $result['product__author'],
            "product_title" => $result['product__title'],
            "product_feature" => $result['product__feature'],
            "price" => $result['product__price'],
            "product__description" => $result['product__desc'],
        ]);

        return redirect("/dashboard")->with("add__product", "Product have been added successfully !");

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($category, $id)
    {
        $product = Product::find($id);
        return view("individualproduct", compact("product", "category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view("updateproduct", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = $request->validate([
            "product__author" => "required|min:5|max:25",
            "product__title" => "required|min:5|max:30",
            "product__feature" => "required",
            "product__price" => "required",
            "product__desc" => "required|min:10|max:255",
        ]);

        $product = Product::find($id);

        $product->product_author = $result['product__author'];
        $product->product_title = $result['product__title'];
        $product->product_feature = $result['product__feature'];
        $product->price = $result['product__price'];
        $product->product__description = $result['product__desc'];

        $product->save();

        return redirect("/dashboard")->with("update__product", "Product have been added successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect("/dashboard")->with("delete__product", "Product have been added successfully !");

    }

    public function search(Request $request, $category) {

        $sortWith = "";
        $sortBy = "";

        switch ($request->category) {
            case "asc":
                $sortWith = 'asc';
                $sortBy = "product_title";
                break;

            case "desc":
                $sortWith = 'desc';
                $sortBy = "product_title";
                break;

            case "price__high":
                $sortWith = 'desc';
                $sortBy = "price";
                break;

            case "price__low":
                $sortWith = 'asc';
                $sortBy = "price";
                break;

            default :
                $sortWith = 'asc';
                $sortBy = "product_title";
        }

        $category_id = Category::where("product_category", "=",  $category)->first()->id;
        $products = Product::orderBy($sortBy, $sortWith)->where("category_id", "=", $category_id)->get();

        if($request->search) {
            $products = $products->filter(function ($prod) use ($request) {
                return $prod->product_title == $request->search;
            });
        }

        return view($category, [
            "products" => $products
        ]);

    }
}
