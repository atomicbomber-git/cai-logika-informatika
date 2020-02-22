<?php

namespace App\Http\Controllers;

use App\SubMateri;
use Illuminate\Http\Request;

class GuestSubMateriShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, SubMateri $sub_materi)
    {
        $next_sub_materi = SubMateri::query()
            ->where("materi_id", $sub_materi->materi_id)
            ->where("urutan", ">", $sub_materi->urutan)
            ->orderBy("urutan")
            ->first();

        $prev_sub_materi = SubMateri::query()
            ->where("materi_id", $sub_materi->materi_id)
            ->where("urutan", "<", $sub_materi->urutan)
            ->orderByDesc("urutan")
            ->first();

        return response()->view("guest.sub_materi.show", ['next_sub_materi' => $next_sub_materi, 'prev_sub_materi' => $prev_sub_materi, 'sub_materi' => $sub_materi]);
    }
}
