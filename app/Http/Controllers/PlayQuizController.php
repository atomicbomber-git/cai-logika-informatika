<?php

namespace App\Http\Controllers;

use App\Quiz;
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
        if (!Quiz::dataIsValid()) {
            return redirect()->route("guest.materi.index");
        }

        $quiz_data = Session::get("current_quiz");
        return response()->view("guest.quiz.play", [
            "quiz_data" => $quiz_data,
        ]);
    }
}
