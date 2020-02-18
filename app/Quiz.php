<?php


namespace App;


class Quiz
{
    public static function getData()
    {
        return session('current_quiz');
    }

    public static function init($materi)
    {
        session('current_quiz.materi', $materi);
        session('current_quiz.soals', $materi->soal->shuffle());
        session('current_quiz.current_soal_index', 0);
    }

    public static function dataIsValid()
    {
        return
            !empty(session("current_quiz.materi")) &&
            !empty(session("current_quiz.soals")) &&
            !empty(session("current_quiz.current_soal"));
    }
}
