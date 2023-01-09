<?php

use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SkemaController;
use Illuminate\Support\Facades\Route;

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

Route::resource('/', PesertaController::class);
Route::resource('sertifikasi', SkemaController::class);

Route::get('peserta/edit/{id}', [PesertaController::class, 'edit']);
Route::put('peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta.update');
Route::delete('peserta/delete/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy');
