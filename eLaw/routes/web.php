<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/test','app');

Route::view('/home','home');

Route::view('/profile','profile');

Route::view('/register','registerlawyer');

Route::view('/regclient','registerclient');

Route::view('/role','role');

Route::get('/registerLawyer',[LawyerController::class,'registerLawyer'])->name('register');
Route::post('/registerLawyer',[LawyerController::class,'registerLawyer'])->name('registerLawyer');

Route::view('/clientinfo','clientinfo');