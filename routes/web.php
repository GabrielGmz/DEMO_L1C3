<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\ReservaController;

// Vista principal de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard por rol
Route::get('/dashboard', function () {
    $user = session('user');

    if (!$user) return redirect()->route('login');

    if ($user->rol === 'propietario') {
        return view('propietario.dashboard', compact('user'));
    } elseif ($user->rol === 'cliente') {
        return view('cliente.dashboard', compact('user'));
    }

    return redirect()->route('home'); // Por si acaso el rol es desconocido
})->name('dashboard');

// Propiedades
Route::get('/propiedades', [PropiedadController::class, 'index'])->name('propiedades.index');
Route::get('/propiedades/crear', [PropiedadController::class, 'create'])->name('propiedades.create');
Route::post('/propiedades', [PropiedadController::class, 'store'])->name('propiedades.store');

// Reservas
Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('/reservar/{id}', [ReservaController::class, 'create'])->name('reservas.create');
Route::post('/reservar/{id}', [ReservaController::class, 'store'])->name('reservas.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout.submit');
