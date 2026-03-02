<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EmpleadosController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/obtener/empleados', [EmpleadosController::class, 'index']);
    Route::get('/empleados/{empleado}', [EmpleadosController::class, 'show'])->name('empleado.proyeccion');

});

Route::get('/tablero', [EmpleadosController::class, 'tableroEmpleados'])->name('empleados.tablero');

require __DIR__.'/auth.php';
