<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function index(Materi $materi)
    {
        dd($materi->toArray());
        return view("materi.soal.index");
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
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi, Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materi  $materi
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi, Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materi  $materi
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi, Soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materi  $materi
     * @param  \App\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi, Soal $soal)
    {
        //
    }
}
