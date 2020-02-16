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

use App\Http\Controllers\GuestMateriIndexController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PilihanJawabanController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\SubMateriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::redirect("/", "guest/materi");

Route::group(["prefix" => "guest/", "as" => "guest."], function () {
    Route::get('materi', class_basename(GuestMateriIndexController::class))->name("materi.index");
});

Route::resource("materi", class_basename(MateriController::class));
Route::resource("materi.sub_materi", class_basename(SubMateriController::class))->shallow();
Route::resource("materi.soal", class_basename(SoalController::class))->shallow();
Route::resource("soal.pilihan_jawaban", class_basename(PilihanJawabanController::class))->shallow();
