<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\PropinasController;
use App\Http\Controllers\contrasenasController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\CronometroController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// tareas punto 1

Route::get('/tareas', [TareasController::class, 'index'])->name('tareas');

Route::post('/tareas', [TareasController::class, 'store'])->name('tareas.store');

Route::delete('/tareas/{id}', [TareasController::class, 'destroy'])->name('tareas.destroy');

Route::get('/tareas/{id}/edit', [TareasController::class, 'edit'])->name('tareas.edit');

Route::put('/tareas/{id}', [TareasController::class, 'update'])->name('tareas.update');

Route::get('/tareas/create', [TareasController::class, 'create'])->name('tareas.create');

// propinas punto 2
Route::get('/propinas', [PropinasController::class, 'index'])->name('propinas');

Route::post('/propinas/calcular', [PropinasController::class, 'calcular'])->name('propinas.calcular');

// contraseñas punto 3

Route::get('/contrasenas', [contrasenasController::class, 'index'])->name('contrasenas');

Route::post('/contrasenas/calcular', [contrasenasController::class, 'calcular'])->name('contrasenas.calcular');

// notas punto 6

Route::get('/notas', [NotasController::class, 'index'])->name('notas');

Route::post('/notas', [NotasController::class, 'store'])->name('notas.store');

Route::delete('/notas/{id}', [NotasController::class, 'destroy'])->name('notas.destroy');

Route::get('/notas/{id}/edit', [NotasController::class, 'edit'])->name('notas.edit');

Route::put('/notas/{id}', [NotasController::class, 'update'])->name('notas.update');

Route::get('/notas/create', [NotasController::class, 'create'])->name('notas.create');


// punto 11 cronometro

Route::get('/cronometro', [CronometroController::class, 'index'])->name('cronometro');
