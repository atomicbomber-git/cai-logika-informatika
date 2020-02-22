<?php

namespace App\Http\Controllers;

use App\Materi;
use App\QuizEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StartQuizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request, Materi $materi)
    {
        QuizEngine::init($materi);

        return redirect()
            ->route("guest.quiz.play");
    }
}
