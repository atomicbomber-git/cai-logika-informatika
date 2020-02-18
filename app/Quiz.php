<?php


namespace App;


use Illuminate\Support\Facades\Session;

class Quiz
{
    public static function getData()
    {
        return session('current_quiz');
    }

    public static function clear()
    {
        session()->remove("current_quiz");
    }

    public static function init(Materi $materi)
    {
        Session::remove('current_quiz');
        Session::put('current_quiz.materi', $materi);
        Session::put('current_quiz.soals', $materi->soal()->get()->shuffle());
        Session::put('current_quiz.current_soal_index', 0);
    }

    public static function dataIsValid()
    {
        return
            !(null === Session::get("current_quiz.materi")) &&
            !(null === Session::get("current_quiz.soals")) &&
            !(null === Session::get("current_quiz.current_soal_index"));
    }

    public static function advanceCurrentSoal()
    {
        Session::put(
            'current_quiz.current_soal_index',
            Session::get('current_quiz.current_soal_index') + 1,
        );
    }
}
