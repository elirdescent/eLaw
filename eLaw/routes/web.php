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

Route::get('/registerClient',[ClientController::class,'registerClient'])->name('regclient');
Route::post('/registerClient',[ClientController::class,'registerClient'])->name('registerClient');

Route::post('/loginclient',[ClientController::class,'loginClient'])->name('logclient');
Route::get('/userprofile',[ClientController::class,'userProfile'])->middleware('isLoggedIn');

Route::get('/lawyerprofile',[LawyerController::class,'lawyerProfile'])->middleware('isLoggedIn');

Route::get('/logout',[ClientController::class,'logout']);

Route::view('/clientinfo','clientinfo');

Route::post('/dash',[LawCaseController::class,'addCase'])->name('saveCase');
Route::get('/dash', [LawCaseController::class, 'show'])->middleware(['isLoggedIn','alreadyLoggedIn']);
