<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use Illuminate\Http\Request;

class BelajarMateriController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request, Materi $materi)
    {
        if ($materi->first_sub_materi === null) {
            return redirect()
                ->route("guest.materi.index")
                ->with("messages", [
                [
                    "state" => MessageState::STATE_WARNING,
                    "content" => "Materi \"{$materi->judul}\" tidak mengandung sub materi sama sekali."
                ]
            ]);
        }

        return redirect()
            ->route("guest.sub_materi.show", $materi->first_sub_materi);
    }
}
