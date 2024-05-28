<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropinasController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/propinas', [PropinasController::class, 'index'])->name('propinas');

Route::post('/propinas/calcular', [PropinasController::class, 'calcular'])->name('propinas.calcular');
