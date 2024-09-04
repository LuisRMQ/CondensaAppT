<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
})->name('home');
Route::middleware('auth')->group(function () {
 

    // Route::get('/phone', [SmsController::class, 'create'])->name('auth.phone');
    // Route::post('/phone', [SmsController::class, 'store'])->name('auth.store');

    // Route::get('/verification', [VeryfiController::class, 'create'])->name('auth.verification');
    // Route::post('/verification', [VeryfiController::class, 'store'])->name('auth.storeve');

    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'create'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});