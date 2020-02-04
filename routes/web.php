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

use App\Http\Controllers\MateriController;
use App\Http\Controllers\PermasalahanController;
use App\Http\Controllers\SubMateriController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource("permasalahan", class_basename(PermasalahanController::class));
Route::resource("materi", class_basename(MateriController::class));
Route::resource("materi.sub_materi", class_basename(SubMateriController::class));

Route::get('/home', 'HomeController@index')->name('home');
