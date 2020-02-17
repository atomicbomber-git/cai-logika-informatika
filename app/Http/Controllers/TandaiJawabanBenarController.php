<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\PilihanJawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TandaiJawabanBenarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request, PilihanJawaban $pilihan_jawaban)
    {
        $pilihan_jawaban->soal()->update([ "jawaban_benar_id" => $pilihan_jawaban->id ]);

        return redirect()
            ->route("soal.pilihan_jawaban.index", $pilihan_jawaban->soal_id)
            ->with("messages", [
                [
                    "state" => MessageState::STATE_SUCCESS,
                    "content" => __("messages.update.success")
                ]
            ]);
    }
}
