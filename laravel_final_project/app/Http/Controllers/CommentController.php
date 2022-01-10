<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            "product__comment" => ['required']
        ]);

        $user_id = auth()->user()->id;
        $product_id = request("product__id");
        $category = request("category");

        $comments = new Comment([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'comments' => request("product__comment"),
            "ratings" => request("rating") ?? 0
        ]);

        $comments->save();

        return redirect("/products/$category/$product_id")->with("comments", "added");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with("delete__comment", "deleted");
    }
}
