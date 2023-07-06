<?php

use App\Http\Controllers\PartiteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Logout;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup']);

Route::get('/logout', [Logout::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'showHome'])->middleware('auth_session');
Route::get('/partite', [PartiteController::class, 'showPartite'])->middleware('auth_session');
Route::get('/profilo', [ProfileController::class, 'showProfile'])->middleware('auth_session');

Route::post('/cercastadio', [HomeController::class, 'cercaStadio'])->name('cerca_stadio');
Route::get('/cercalikestadio', [HomeController::class, 'cercaLikeStadio'])->name('cerca_like_stadio');

Route::post('/cercagiocatore', [HomeController::class, 'cercaGiocatore'])->name('cerca_giocatore');
Route::get('/cercalike', [HomeController::class, 'cercaLike'])->name('cerca_like_cerca_giocatore');

Route::get('/aggiungilikestadio', [HomeController::class, 'aggiungiLikeStadio']);
Route::get('/rimuovilikestadio', [HomeController::class, 'rimuoviLikeStadio']);

Route::get('/aggiungilike', [HomeController::class, 'aggiungiLike']);
Route::get('/rimuovilike', [HomeController::class, 'rimuoviLike']);