<?php

namespace App\Http\Controllers;

use App\Http\Constants\MessageState;
use App\Materi;
use App\QuizEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StartQuizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request, Materi $materi)
    {
        if ($materi->quiz_soals()->count() === 0) {
            return redirect()
                ->route("guest.materi.index")
                ->with("messages", [
                    [
                        "state" => MessageState::STATE_WARNING,
                        "content" => "Materi \"{$materi->judul}\" tidak mengandung soal sama sekali."
                    ]
                ]);
        }

        QuizEngine::init($materi);

        return redirect()
            ->route("guest.quiz.play");
    }
}
