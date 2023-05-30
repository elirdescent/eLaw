<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientDetailsController;
use App\Http\Controllers\ClientPostController;
use App\Http\Controllers\LawCaseController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LawyerDetailsController;
use App\Http\Controllers\LawyerInfoController;
use App\Http\Controllers\LegalCaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TaskController;
use App\Models\ClientDetails;
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
})->name('home');

Route::view('/test','app');

Route::view('/home','home')->name('homepage');

Route::view('/profile','profile');

Route::view('/loginrole','loginrole');

Route::view('/regLawyer','registerlawyer');

Route::view('/regClient','registerclient');

Route::view('/roles','roles');
Route::view('/role','role');


Route::get('/loginclient',[ClientController::class,'login'])->name('clientlogin');
Route::post('/loginclient',[ClientController::class,'loginClient'])->name('logclient');


Route::get('/loginlawyer',[LawyerController::class,'login'])->middleware('alreadyLoggedIn');



Route::get('/registerLawyer',[LawyerController::class,'registerLawyer'])->name('register');
Route::post('/registerLawyer',[LawyerController::class,'registerLawyer'])->name('registerLawyer');

Route::get('/registerClient',[ClientController::class,'registerClient'])->name('regclient');
Route::post('/registerClient',[ClientController::class,'registerClient'])->name('registerClient');





Route::get('/lawyerprofile',[LawyerController::class,'lawyerProfile'])->middleware('isLoggedIn');

Route::post('/loginlawyer',[LawyerController::class,'loginLawyer'])->name('loglawyer');

Route::get('/logout',[ClientController::class,'logout']);

Route::view('/linfo','lawyerinfo');


Route::post('/dash',[LawCaseController::class,'addCase'])->name('saveCase');
Route::get('/dash', [LawCaseController::class, 'show'])->middleware(['isLoggedIn','alreadyLoggedIn'])->name('lawyercases');

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

Route::view('/modal','modal');



Route::put('updateCase/{id}',[LawCaseController::class,'update']);

Route::put('updateLawyerProfile',[LawyerDetailsController::class,'update']);

Route::put('updatetask/{id}',[TaskController::class,'update']);

Route::view('/adl','adminlawyers');

Route::get('deletetask/{id}',[TaskController::class,'delete']);


Route::view('clist','clientlist');

Route::get('/review',[ReviewController::class,'show'])->name('reviews');
Route::post('/review',[ReviewController::class,'store'])->name('addreview');

Route::view('/upc','updateclient');

Route::get('/clientprofile',[ClientDetailsController::class,'show'])->name('clientprofile');


Route::view('/clientup','updateclient')->name('clientup');

Route::get('/clientCreate',[ClientDetailsController::class,'createProfile'])->name('createClient');
Route::post('/clientCreate',[ClientDetailsController::class,'createProfile'])->name('postClient');

Route::put('updateClientProfile',[ClientDetailsController::class,'update']);

Route::post('postReport',[ReportController::class,'store'])->name('reportpost');

Route::get('/lawyersearch',[LawyerDetailsController::class,'showAll'])->name('lawyersearch');

Route::get('/lawsearchresult',[LawyerDetailsController::class,'search']);

Route::get('/lawsearchlocation',[LawyerDetailsController::class,'sortByLocation']);



Route::get('clientposts',[ClientPostController::class,'show'])->name('clposts');
Route::post('clientposts',[ClientPostController::class,'addPost'])->name('createPost');

Route::get('deletePost/{id}',[ClientPostController::class,'delete']);

Route::get('viewclientposts',[ClientPostController::class,'showAll'])->name('clientposts');

Route::get('/postsearchcategory',[ClientPostController::class,'sortByCategory']);

Route::get('deletereview/{id}',[ReviewController::class,'delete']);

Route::view('adminlogin','adminlogin');

Route::get('adminlawyer',[LawyerController::class,'getAll'])->name('adminlawyer');

Route::get('adminclient',[ClientController::class,'getAll'])->name('adminclient');

Route::get('deleteclient/{id}',[ClientController::class,'delete']);

Route::get('deletelawyer/{id}',[LawyerController::class,'delete']);

Route::get('adminlogin',[AdminController::class,'login'])->name('adminlogin');
Route::post('adminlogin',[AdminController::class,'loginAdmin'])->name('logadmin');

Route::get('clist',[ClientDetailsController::class,'viewUsers'])->name('viewclients');

Route::get('reportlist',[ReportController::class,'showAll'])->name('reports');



