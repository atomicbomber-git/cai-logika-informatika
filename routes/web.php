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

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\BelajarMateriController;
use App\Http\Controllers\FinishedQuizController;
use App\Http\Controllers\GuestMateriIndexController;
use App\Http\Controllers\GuestSoalShowController;
use App\Http\Controllers\GuestSubMateriShowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LatihanSoalController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PilihanJawabanController;
use App\Http\Controllers\PlayQuizController;
use App\Http\Controllers\RingkasanController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\StartQuizController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\TandaiJawabanBenarController;
use App\Http\Controllers\VerifyQuizController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    "register" => false,
    "reset" => false,
    "confirm" => false,
    "verify" => false,
]);

Route::redirect("/", "/guest/home");

Route::group(["prefix" => "guest/", "as" => "guest."], function () {
    Route::get('home', class_basename(HomeController::class))->name('home');
    Route::get('bantuan', class_basename(BantuanController::class))->name('bantuan');
    Route::get('materi', class_basename(GuestMateriIndexController::class))->name("materi.index");
    Route::get('materi/{materi}/belajar', class_basename(BelajarMateriController::class))->name('belajar_materi');
    Route::get('materi/{materi}/latihan_soal', class_basename(LatihanSoalController::class))->name('latihan_soal');
    Route::get('sub_materi/{sub_materi}', class_basename(GuestSubMateriShowController::class))->name("sub_materi.show");
    Route::get('soal/{soal}', class_basename(GuestSoalShowController::class))->name("soal.show");
    Route::get('quiz/{materi}/start', class_basename(StartQuizController::class))->name("quiz.start");
    Route::get('quiz/play', class_basename(PlayQuizController::class))->name("quiz.play");
    Route::post('quiz/verify', class_basename(VerifyQuizController::class))->name("quiz.verify");
    Route::get('quiz/finished', class_basename(FinishedQuizController::class))->name("quiz.finished");
});

Route::resource("informasi", class_basename(InformasiController::class))
    ->only(["edit", "update", "show"]);

Route::get("ringkasan/edit", [RingkasanController::class, "edit"])->name("ringkasan.edit");
Route::put("ringkasan", [RingkasanController::class, "update"])->name("ringkasan.update");
Route::get("ringkasan", [RingkasanController::class, "show"])->name("ringkasan.show");

Route::resource("materi", class_basename(MateriController::class));
Route::resource("materi.sub_materi", class_basename(SubMateriController::class))->shallow();
Route::resource("materi.soal", class_basename(SoalController::class))->shallow();
Route::resource("soal.pilihan_jawaban", class_basename(PilihanJawabanController::class))->shallow();
Route::put("/pilihan_jawaban/{pilihan_jawaban}/tandai_jawaban_benar", class_basename(TandaiJawabanBenarController::class))
    ->name("pilihan_jawaban.tandai_jawaban_benar");
