<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\GuestSoalController;
use App\Http\Controllers\GuestMateriIndexController;
use App\Http\Controllers\GuestSubMateriShowController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PilihanJawabanController;
use App\Http\Controllers\PlayQuizController;
use App\Http\Controllers\StartQuizController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\TandaiJawabanBenarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect("/", "guest/materi");

Route::group(["prefix" => "guest/", "as" => "guest."], function () {
    Route::get('materi', class_basename(GuestMateriIndexController::class))->name("materi.index");
    Route::get('sub_materi/{sub_materi}', class_basename(GuestSubMateriShowController::class))->name("sub_materi.show");
    Route::get('soal/{soal}', class_basename(GuestSoalController::class))->name("soal.show");
    Route::get('quiz/{materi}/start', class_basename(StartQuizController::class))->name("quiz.start");
    Route::get('quiz/play', class_basename(PlayQuizController::class))->name("quiz.play");
});

Route::resource("materi", class_basename(MateriController::class));
Route::resource("materi.sub_materi", class_basename(SubMateriController::class))->shallow();
Route::resource("materi.soal", class_basename(SoalController::class))->shallow();
Route::resource("soal.pilihan_jawaban", class_basename(PilihanJawabanController::class))->shallow();
Route::put("/pilihan_jawaban/{pilihan_jawaban}/tandai_jawaban_benar", class_basename(TandaiJawabanBenarController::class))
    ->name("pilihan_jawaban.tandai_jawaban_benar");
