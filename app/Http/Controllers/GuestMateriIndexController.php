<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Soal;
use App\SubMateri;
use Illuminate\Http\Request;

class GuestMateriIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $materis = Materi::query()
            ->orderBy("urutan")
            ->orderBy("id")
            ->get();

        return response()
            ->view("guest.materi.index", ['materis' => $materis]);
    }
}
