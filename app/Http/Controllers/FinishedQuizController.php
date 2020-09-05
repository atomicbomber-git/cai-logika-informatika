<?php

namespace App\Http\Controllers;

use App\Materi;
use App\QuizEngine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FinishedQuizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $currentMateri = QuizEngine::getAttribute(QuizEngine::MATERI_KEY);

        $nextMateri = Materi::query()
            ->where("urutan", ">", $currentMateri->urutan)
            ->orderBy('urutan')
            ->first();

        $quizData = QuizEngine::getAllData();
        $correctPercentage = $quizData["total_correct"] / count($quizData["soals"]) * 100;

        return response()->view("guest.quiz.finished", [
            "quiz_data" => $quizData,
            "correct_percentage" => $correctPercentage,
            "next_materi" => $nextMateri,
        ]);
    }
}
