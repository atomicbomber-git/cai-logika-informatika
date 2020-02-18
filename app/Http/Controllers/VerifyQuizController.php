<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class VerifyQuizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Quiz::advanceCurrentSoal();
        return redirect()->route("guest.quiz.play");
    }
}
