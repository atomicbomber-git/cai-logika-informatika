<?php

namespace App\Http\Controllers;

use App\Materi;
use App\QuizEngine;
use Illuminate\Http\Request;

class FinishedQuizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $currentMateri = QuizEngine::getAttribute(QuizEngine::MATERI_KEY);

        $nextMateri = Materi::query()
            ->where("urutan", ">=", $currentMateri->urutan)
            ->where("id", "<>", $currentMateri->id)
            ->orderBy('urutan')
            ->orderBy('id')
            ->first();

        return response()->view("guest.quiz.finished", [
            "quiz_data" => QuizEngine::getAllData(),
            "next_materi" => $nextMateri,
        ]);
    }
}
