<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class VerifyQuizController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws ValidationException
     */
    public function __invoke(Request $request)
    {
        if (!Quiz::dataIsValid()) {
            return response(["status" => "error"]);
        }

        $data = $this->validate($request, [
            "pilihan_jawaban_id" => "required|exists:pilihan_jawaban"
        ]);

        $quiz_data = Session::get("quiz_data");
        $current_soal = $quiz_data["soals"][$quiz_data["current_soal_index"]];

        if (!($current_soal->jawaban_benar_id === $data["pilihan_jawaban_id"])) {
            return response(["status" => "incorrect_answer"]);
        }

        Quiz::advanceCurrentSoal();
        return response(["status" => "correct_answer"]);
    }
}
