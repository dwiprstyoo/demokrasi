<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\GenerateController;

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

Route::get('/', function() {
    return view ('auth.login');
});


Route::resource('post', PostController::class)->middleware('user');
Route::resource('validasi', ValidasiController::class)->middleware('is_admin');
Route::resource('generate', GenerateController::class)->middleware('is_petugas');

Auth::routes();

// Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
// Route::get('validasi', [App\Http\Controllers\ValidasiController::class, 'index'])->name('validasi')->middleware('is_admin');
// Route::get('generate', [App\Http\Controllers\GenerateController::class, 'index'])->name('generate')->middleware('is_petugas');