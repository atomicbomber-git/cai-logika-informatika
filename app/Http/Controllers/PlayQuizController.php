<?php

namespace App\Http\Controllers;

use App\QuizEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlayQuizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (!QuizEngine::dataIsValid()) {
            return redirect()->route("guest.materi.index");
        }

        if (QuizEngine::isFinished()) {
            return redirect()
                ->route("guest.quiz.finished");
        }

        $quiz_data = Session::get("current_quiz");
        $soal = $quiz_data["soals"][$quiz_data["current_soal_index"]] ?? null;
        if (null !== $soal) {
            $soal->load("pilihan_jawaban");
        }

        return response()->view("guest.quiz.play", [
            "quiz_data" => $quiz_data,
            "soal" => $soal,
        ]);
    }
}
