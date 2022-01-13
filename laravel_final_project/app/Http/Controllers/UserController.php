<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if (auth()->user()?->can("superadmin")) {
            $users = User::where('role', "!=", "admin")->paginate(9);
            return view('/dashboard', compact('users'));

        } else if (auth()->user()?->can('cdadmin')) {
            $category_id = Category::where("product_category", "cd")->first()->id;
            $userProd = Product::with("category", "user")->where("category_id", $category_id)->paginate(8);
            return view('dashboard', compact("userProd"));

        } else if (auth()->user()?->can('gameadmin')) {
            $category_id = Category::where("product_category", "game")->first()->id;
            $userProd = Product::with("category", "user")->where("category_id", $category_id)->latest()->paginate(8);
            return view('dashboard', compact("userProd"));

        } else if (auth()->user()?->can('bookadmin')) {
            $category_id = Category::where("product_category", "book")->first()->id;
            $userProd = Product::with("category", "user")->where("category_id", $category_id)->latest()->paginate(8);
            return view('dashboard', compact("userProd"));

        } else {
            $user_id = Auth::user()->id;
            $userProd = Product::with("category", "user")->where("user_id", "=", $user_id)->latest()->paginate(8);
            return view('dashboard', compact("userProd"));
        }

    }


    public function search(Request $request)
    {

        if (auth()->user()?->can("superadmin")) {
            $users = User::where('firstname', "like", "%$request->search%")
                ->orWhere("lastname",  "like", "%$request->search%")->paginate(9)->appends(request()->query());
            return view('/dashboard', compact('users'));

        } else if (auth()->user()?->can('cdadmin')) {
            $userProd = $this->returnProductsBasedOnParams($request->search, "cd");
            return view('dashboard', compact("userProd"));

        } else if (auth()->user()?->can('gameadmin')) {
            $userProd = $this->returnProductsBasedOnParams($request->search, "game");
            return view('dashboard', compact("userProd"));

        } else if (auth()->user()?->can('bookadmin')) {
            $userProd = $this->returnProductsBasedOnParams($request->search, "book");
            return view('dashboard', compact("userProd"));

        } else {
            $user_id = Auth::user()->id;
            $userProd = Product::with("category", "user")->where("user_id", "=", $user_id);
            $userProd = $userProd->where("product_title", "like", "%$request->search%")
                ->orWhere("product_author",  "like", "%$request->search%")
                ->latest()->paginate(8)->appends(request()->query());
            return view('dashboard', compact("userProd"));
        }
    }

    function returnProductsBasedOnParams($search, $category): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $category_id = Category::where("product_category", $category)->first()->id;
        $userProd = Product::with("category", "user")->where("category_id", $category_id);
        return $userProd->where("product_title", "like", "%$search%")
            ->orWhere("product_author", "like", "%$search%")
            ->paginate(8)->appends(request()->query());
    }


    /**
     * Display a list of admins.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function display()
    {
        \Illuminate\Support\Facades\Gate::authorize("superadmin");
        $users = User::where("role", "admin")->where("specific_role", "!=", "superadmin")->latest()->paginate(10);
        return view("displayadmins", compact("users"));
    }

}
