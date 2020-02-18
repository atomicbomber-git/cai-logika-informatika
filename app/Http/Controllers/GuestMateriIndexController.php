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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $materis = Materi::query()
            ->addSelect([
                "first_sub_materi_id" =>
                    SubMateri::query()
                        ->select("id")
                        ->whereColumn("sub_materi.materi_id", "=", "materi.id")
                        ->orderBy("urutan")
                        ->limit(1)
            ])
            ->addSelect(["first_soal_id" =>
                Soal::query()
                    ->select("id")
                    ->whereColumn("soal.materi_id", "=", "materi.id")
                    ->orderBy("urutan")
                    ->limit(1)
            ])
            ->get();

        return response()
            ->view("guest.materi.index", compact(
                "materis"
            ));
    }
}
