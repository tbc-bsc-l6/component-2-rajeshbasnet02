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
                $category_id = Category::where("product_category", "=" ,"book")->first()->id;
                $books = Product::where("category_id", $category_id)->latest()->paginate(12);
                return view("book", compact("books"));

            case "cds" :
                $category_id = Category::where("product_category", "=" ,"cd")->first()->id;
                $cds = Product::where("category_id", $category_id)->latest()->paginate(12);
                return view("cd", compact("cds"));

            case "games" :
                $category_id = Category::where("product_category", "=" ,"game")->first()->id;
                $games = Product::where("category_id", $category_id)->latest()->paginate(12);
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
            "product__price" => "required|integer",
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($category, $id)
    {
        $products = Product::with("user", "comment")->where("id", $id)->get();

        return view("individualproduct", compact("products", "category"));
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
            "product__price" => "required|integer",
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
        $products = Product::orderBy($sortBy, $sortWith)->where("category_id", "=", $category_id);


        if($request->product) {
            $products = $products
                ->where("product_title", "like", "%" . $request->product . "%")->paginate(12)->appends(request()->query())
            ;
        }else {
            $products = $products->paginate(12)->appends(request()->query());
        }


        return view($category, [
            "$category" . "s" => $products
        ]);

    }
}
