<?php

namespace App\Http\Controllers;

use App\Permasalahan;
use Illuminate\Http\Request;

class PermasalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $permasalahans = Permasalahan::query()
            ->get();

        return view("permasalahan.index", compact(
            "permasalahans"
        ));
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
     * @param  \App\Permasalahan  $permasalahan
     * @return \Illuminate\Http\Response
     */
    public function show(Permasalahan $permasalahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permasalahan  $permasalahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permasalahan $permasalahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permasalahan  $permasalahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permasalahan $permasalahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permasalahan  $permasalahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permasalahan $permasalahan)
    {
        //
    }
}
