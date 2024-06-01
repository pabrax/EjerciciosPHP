<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\PropinasController;
use App\Http\Controllers\contrasenasController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\CronometroController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\HabitacionesController;


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

// gastos punto 4

Route::get('/gastos', [ExpenseController::class, 'index'])->name('expenses');
Route::post('/gastos', [ExpenseController::class, 'store'])->name('expenses.store');
Route::delete('/gastos/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
Route::get('/gastos/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::put('/gastos/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::get('/gastos/create', [ExpenseController::class, 'create'])->name('expenses.create');

// reservas punto 5

Route::get('/reservas', [ReservasController::class, 'index'])->name('reservas');
Route::post('/reservas', [ReservasController::class, 'store'])->name('reservas.store');
Route::delete('/reservas/{id}', [ReservasController::class, 'destroy'])->name('reservas.destroy');

Route::get('/reservas/create/{habitacion_id}', [ReservasController::class, 'create'])->name('reservas.create');
Route::get('/reservas/{id}/edit', [ReservasController::class, 'edit'])->name('reservas.edit');

// habitaciones

Route::get('reservas/habitaciones', [HabitacionesController::class, 'index'])->name('habitaciones');
Route::post('reservas/habitaciones', [HabitacionesController::class, 'store'])->name('habitaciones.store');
Route::delete('reservas/habitaciones/{id}', [HabitacionesController::class, 'destroy'])->name('habitaciones.destroy');
Route::put('reservas/habitaciones/{id}', [HabitacionesController::class, 'update'])->name('habitaciones.update');

Route::get('reservas/habitaciones/{id}/edit', [HabitacionesController::class, 'edit'])->name('habitaciones.edit');
Route::get('reservas/habitaciones/create', [HabitacionesController::class, 'create'])->name('habitaciones.create');

// notas punto 6

Route::get('/notas', [NotasController::class, 'index'])->name('notas');
Route::post('/notas', [NotasController::class, 'store'])->name('notas.store');
Route::delete('/notas/{id}', [NotasController::class, 'destroy'])->name('notas.destroy');
Route::get('/notas/{id}/edit', [NotasController::class, 'edit'])->name('notas.edit');
Route::put('/notas/{id}', [NotasController::class, 'update'])->name('notas.update');
Route::get('/notas/create', [NotasController::class, 'create'])->name('notas.create');

// punto 11 cronometro

Route::get('/cronometro', [CronometroController::class, 'index'])->name('cronometro');
