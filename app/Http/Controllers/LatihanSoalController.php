<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use Illuminate\Http\Request;

class LatihanSoalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request, Materi $materi)
    {
        if (($first_soal = $materi->latihan_soals()->first()) === null) {
            return back()->with("messages", [
                [
                    "state" => MessageState::STATE_WARNING,
                    "content" => "Materi \"{$materi->judul}\" tidak mengandung soal sama sekali."
                ]
            ]);
        }

        return redirect()
            ->route("guest.soal.show", $first_soal);
    }
}
