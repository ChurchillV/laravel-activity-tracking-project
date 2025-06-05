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
    Route::get('/logs/{activity}', 'show')->name('logs.show');
    Route::post('/logs/store', 'store')->name('logs.store');
    Route::post('/logs/{activity}/remarks', 'addRemark')->name('logs.remarks.store');
    Route::put('/logs/{activity}', 'update')->name('logs.update');
    Route::delete('/logs/{activity}', 'destroy')->name('logs.destroy');
});
