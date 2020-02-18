<?php

namespace App\Http\Controllers;

use App\Soal;
use Illuminate\Http\Request;

class GuestContohSoalShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Soal $soal)
    {
        dd($soal);
    }
}
