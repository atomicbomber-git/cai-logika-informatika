<?php

namespace App\Http\Controllers;

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
        return response()->view("guest.quiz.finished", [
            "quiz_data" => QuizEngine::getAllData()
        ]);
    }
}
