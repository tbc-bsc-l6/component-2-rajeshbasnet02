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
        if(auth()->user()?->can("superadmin")) {
            $users = User::where('role', "!=", "admin")->paginate(12);
            return view('/dashboard', compact('users'));
        }

        if(auth()->user()?->can('cdadmin')) {
            $category_id = Category::where("product_category", "cd")->first()->id;
            $userProd = Product::with("category", "user")->where("category_id", $category_id)->paginate(8);
            return view('dashboard', compact("userProd"));

        }else if (auth()->user()?->can('gameadmin')) {
            $category_id = Category::where("product_category", "game")->first()->id;
            $userProd = Product::with("category", "user")->where("category_id", $category_id)->latest()->paginate(8);
            return view('dashboard', compact("userProd"));

        }else if (auth()->user()?->can('bookadmin')) {
            $category_id = Category::where("product_category", "book")->first()->id;
            $userProd = Product::with("category", "user")->where("category_id", $category_id)->latest()->paginate(8);
            return view('dashboard', compact("userProd"));

        }else {
            $user_id = Auth::user()->id;
            $userProd = Product::with("category", "user")->where("user_id", "=", $user_id)->latest()->paginate(8);
            return view('dashboard', compact("userProd"));
        }

    }


    public function display() {
        \Illuminate\Support\Facades\Gate::authorize("superadmin");
        $users = User::where("role", "admin")->latest()->paginate(10);
        return view("displayadmins", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
