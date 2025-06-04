<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logs/', [LogController::class, 'index'])->name('logs.index');
Route::get('/logs/create', [LogController::class, 'create'])->name('logs.create');
Route::get('/logs/{log}', [LogController::class, 'show'])->name('logs.show');
Route::post('/logs/store', [LogController::class, 'store'])->name('logs.store');
Route::delete('/logs/{log}', [LogController::class, 'destroy'])->name('logs.destroy');
