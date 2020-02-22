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
use App\Http\Controllers\FinishedQuizController;
use App\Http\Controllers\GuestSoalController;
use App\Http\Controllers\GuestMateriIndexController;
use App\Http\Controllers\GuestSubMateriShowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PilihanJawabanController;
use App\Http\Controllers\PlayQuizController;
use App\Http\Controllers\StartQuizController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\TandaiJawabanBenarController;
use App\Http\Controllers\VerifyQuizController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

if (App::environment() === "acceptance") {
    Route::group(["prefix" => "__testing__/"], function () {

        Route::get("factory/{model}", function (Request $request, $model) {

            $overrides = $request->all();

            // Special case for user: The password field is hashed
            if ($model === "User") {
                if (isset($overrides["password"])) {
                    $overrides["password"] = Hash::make($overrides["password"]);
                }
            }

            return response()->json(
                factory("App\\{$model}")
                    ->create($overrides)
            );
        });

        Route::get("login", function () {
            $new_user = factory(User::class)->create();
            Auth::login($new_user);
            return response()->json($new_user);
        });
    });
}

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
    Route::get('sub_materi/{sub_materi}', class_basename(GuestSubMateriShowController::class))->name("sub_materi.show");
    Route::get('soal/{soal}', class_basename(GuestSoalController::class))->name("soal.show");
    Route::get('quiz/{materi}/start', class_basename(StartQuizController::class))->name("quiz.start");
    Route::get('quiz/play', class_basename(PlayQuizController::class))->name("quiz.play");
    Route::post('quiz/verify', class_basename(VerifyQuizController::class))->name("quiz.verify");
    Route::get('quiz/finished', class_basename(FinishedQuizController::class))->name("quiz.finished");
});

Route::resource("materi", class_basename(MateriController::class));
Route::resource("materi.sub_materi", class_basename(SubMateriController::class))->shallow();
Route::resource("materi.soal", class_basename(SoalController::class))->shallow();
Route::resource("soal.pilihan_jawaban", class_basename(PilihanJawabanController::class))->shallow();
Route::put("/pilihan_jawaban/{pilihan_jawaban}/tandai_jawaban_benar", class_basename(TandaiJawabanBenarController::class))
    ->name("pilihan_jawaban.tandai_jawaban_benar");
