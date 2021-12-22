<?php

namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class CdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $cds = Cd::all();
        return view("cd", compact('cds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function show(Cd $cd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function edit(Cd $cd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cd $cd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cd $cd)
    {
        //
    }
}
