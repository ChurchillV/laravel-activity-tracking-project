<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout/', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function() {
    Route::get('/register/', 'showRegister')->name('show.register');
    Route::get('/login/', 'showLogin')->name('show.login');
    Route::post('/register/', 'register')->name('register');
    Route::post('/login/', 'login')->name('login');
});

Route::middleware('auth')->controller(LogController::class)->group(function() {
    Route::get('/logs/', 'index')->name('logs.index');
    Route::get('/logs/create', 'create')->name('logs.create');
    Route::get('/logs/{log}', 'show')->name('logs.show');
    Route::post('/logs/store', 'store')->name('logs.store');
    Route::delete('/logs/{log}', 'destroy')->name('logs.destroy');
});
