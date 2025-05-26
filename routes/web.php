<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.submit');

Route::get('/propiedades', [PropiedadController::class, 'index'])->name('propiedades.index');
Route::get('/propiedades/crear', [PropiedadController::class, 'create'])->name('propiedades.create');
Route::post('/propiedades', [PropiedadController::class, 'store'])->name('propiedades.store');
Route::delete('/propiedades/{id}', [PropiedadController::class, 'destroy'])->name('propiedades.destroy');

Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('/reservar/{id}', [ReservaController::class, 'create'])->name('reservas.create');
Route::post('/reservar/{id}', [ReservaController::class, 'store'])->name('reservas.store');

Route::get('/reservas/{id}/editar', [ReservaController::class, 'edit'])->name('reservas.edit');
Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
Route::get('/reservas/propietarios', [ReservaController::class, 'propietarioReservas'])->name('reservas.propietarios');

Route::post('/reservas/{id}/aceptar', [ReservaController::class, 'aceptar'])->name('reservas.aceptar');
Route::post('/reservas/{id}/rechazar', [ReservaController::class, 'rechazar'])->name('reservas.rechazar');

