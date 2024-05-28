<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PropinasController;
use App\Http\Controllers\contrasenasController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// propinas punto 2
Route::get('/propinas', [PropinasController::class, 'index'])->name('propinas');

Route::post('/propinas/calcular', [PropinasController::class, 'calcular'])->name('propinas.calcular');

// contraseñas punto 3

Route::get('/contrasenas', [App\Http\Controllers\contrasenasController::class, 'index'])->name('contrasenas');
Route::post('/contrasenas/calcular', [App\Http\Controllers\contrasenasController::class, 'calcular'])->name('contrasenas.calcular');
