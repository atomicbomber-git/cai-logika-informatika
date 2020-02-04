<?php

namespace App\Http\Controllers;

use App\Materi;
use App\SubMateri;
use Illuminate\Http\Request;

class SubMateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function index(Materi $materi)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function create(Materi $materi)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Materi $materi)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materi  $materi
     * @param  \App\SubMateri  $subMateri
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi, SubMateri $subMateri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @param  \App\SubMateri  $subMateri
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi, SubMateri $subMateri)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @param  \App\SubMateri  $subMateri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi, SubMateri $subMateri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materi  $materi
     * @param  \App\SubMateri  $subMateri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi, SubMateri $subMateri)
    {
        //
    }
}
