<?php


namespace App;


use Illuminate\Support\Facades\Session;

class QuizEngine
{
    const QUIZ_DATA_KEY = 'current_quiz';
    const MATERI_KEY = "materi";
    const SOALS_KEY = "soals";
    const CURRENT_SOAL_INDEX_KEY = "current_soal_index";
    const TOTAL_CORRECT_KEY = "total_correct";

    public static function getAllData()
    {
        return session(self::QUIZ_DATA_KEY);
    }

    public static function clear()
    {
        session()->remove(self::QUIZ_DATA_KEY);
    }

    public static function init(Materi $materi)
    {
        Session::remove(self::QUIZ_DATA_KEY);
        Session::put(self::QUIZ_DATA_KEY . '.' . self::MATERI_KEY, $materi);
        Session::put(self::QUIZ_DATA_KEY . '.' . self::SOALS_KEY, $materi->soal()->get()->shuffle());
        Session::put(self::QUIZ_DATA_KEY . '.' . self::CURRENT_SOAL_INDEX_KEY, 0);
        Session::put(self::QUIZ_DATA_KEY . '.' . self::TOTAL_CORRECT_KEY, 0);
    }

    public static function dataIsValid()
    {
        return
            null !== Session::get(self::QUIZ_DATA_KEY . '.' . self::MATERI_KEY) &&
            null !== Session::get(self::QUIZ_DATA_KEY . '.' . self::SOALS_KEY) &&
            null !== Session::get(self::QUIZ_DATA_KEY . '.' . self::CURRENT_SOAL_INDEX_KEY) &&
            null !== Session::get(self::QUIZ_DATA_KEY . '.' . self::TOTAL_CORRECT_KEY);
    }

    public static function incrementTotalCorrect()
    {
        Session::put(
            self::QUIZ_DATA_KEY . '.' . self::TOTAL_CORRECT_KEY,
            Session::get(self::QUIZ_DATA_KEY . '.' . self::TOTAL_CORRECT_KEY) + 1
        );
    }

    public static function getAttribute(string $key)
    {
        return Session::get(self::QUIZ_DATA_KEY . "." . $key);
    }

    public static function isFinished(): bool
    {
        return
            self::getAttribute(self::CURRENT_SOAL_INDEX_KEY) >
            self::getAttribute(self::SOALS_KEY)->count() - 1;
    }

    public static function advanceCurrentSoal()
    {
        Session::put(
            self::QUIZ_DATA_KEY . '.' . self::CURRENT_SOAL_INDEX_KEY,
            Session::get(self::QUIZ_DATA_KEY . '.' . self::CURRENT_SOAL_INDEX_KEY) + 1
        );
    }
}
