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

// tareas punto 1

Route::get('/tareas', [App\Http\Controllers\TareasController::class, 'index'])->name('tareas');

Route::post('/tareas', [App\Http\Controllers\TareasController::class, 'store'])->name('tareas.store');

Route::delete('/tareas/{id}', [App\Http\Controllers\TareasController::class, 'destroy'])->name('tareas.destroy');

Route::get('/tareas/{id}/edit', [App\Http\Controllers\TareasController::class, 'edit'])->name('tareas.edit');

Route::put('/tareas/{id}', [App\Http\Controllers\TareasController::class, 'update'])->name('tareas.update');

Route::get('/tareas/create', [App\Http\Controllers\TareasController::class, 'create'])->name('tareas.create');

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
