<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbTestDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbArticleController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'homeindex'])->name('home');

Route::get('/testdata', [AbTestDataController::class, 'testindex'])->name('testdata');
Route::get('/articles', [AbArticleController::class, 'articles'])->name('articles');

Route::get('/login', function () {
    return view('anmeldeseite'); // Anmeldeseite anzeigen
})->name('login');

// Route für die Registrierungsseite
Route::get('/register', function () {
    return view('registriereseite'); // Registrierungsseite anzeigen
})->name('register');

// Route für das Einloggen
Route::post('/login', [AuthController::class, 'login']); // Login mit POST an AuthController

// Route für das Registrieren eines neuen Benutzers
Route::post('/register', [AuthController::class, 'register']); // Registrierung mit POST an AuthController

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
