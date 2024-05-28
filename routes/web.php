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

// notas punto 4

Route::get('/notas', [App\Http\Controllers\NotasController::class, 'index'])->name('notas');

Route::post('/notas', [App\Http\Controllers\NotasController::class, 'store'])->name('notas.store');

Route::delete('/notas/{id}', [App\Http\Controllers\NotasController::class, 'destroy'])->name('notas.destroy');

Route::get('/notas/{id}/edit', [App\Http\Controllers\NotasController::class, 'edit'])->name('notas.edit');

Route::put('/notas/{id}', [App\Http\Controllers\NotasController::class, 'update'])->name('notas.update');

Route::get('/notas/create', [App\Http\Controllers\NotasController::class, 'create'])->name('notas.create');

// reservas punto 5

