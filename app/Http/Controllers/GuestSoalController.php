<?php

namespace App\Http\Controllers;

use App\Soal;
use Illuminate\Http\Request;

class GuestSoalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Soal $soal)
    {
        $next_soal = Soal::query()
            ->where("materi_id", $soal->materi_id)
            ->where("urutan", ">", $soal->urutan)
            ->orderBy("urutan")
            ->first();

        $prev_soal = Soal::query()
            ->where("materi_id", $soal->materi_id)
            ->where("urutan", "<", $soal->urutan)
            ->orderByDesc("urutan")
            ->first();

        return response()->view("guest.soal.show", compact(
            "soal",
            "next_soal",
            "prev_soal",
        ));
    }
}
