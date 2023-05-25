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


Route::view('/tasks','tasks');

Route::get('deletecase/{id}',[LawCaseController::class,'delete']);

Route::view('/cases','casedetails');

Route::get('view-case/{id}',[LawCaseController::class,'viewCase']);


Route::post('/task',[TaskController::class,'addTask'])->name('saveTask');
Route::get('/tasks',[TaskController::class,'show'])->name("lawyertasks");

Route::view('/reviews','reviews');

Route::view('/rev','review');

Route::view('/lawyerup','updatelawyer')->name('lawyerup');

Route::get('/userprofile',[LawyerDetailsController::class,'show'])->name('userprofile');

Route::get('/lawyerCreate',[LawyerDetailsController::class,'createProfile'])->name('lawProfile');
Route::post('/lawyerCreate',[LawyerDetailsController::class,'createProfile'])->name('lawCreate');

Route::put('updateCase/{id}',[LawCaseController::class,'update']);

Route::put('updateLawyerProfile',[LawyerDetailsController::class,'update']);

Route::put('updatetask/{id}',[TaskController::class,'update']);

Route::get('deletetask/{id}',[TaskController::class,'delete']);