<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación protegidas por el middleware centralizado
Auth::routes(['middleware' => 'role.redirect']);

// Rutas protegidas por roles
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/Admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Superadmin'])->group(function () {
    Route::get('/Superadmin', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');
});

Route::middleware(['auth', 'role:Funcionario'])->group(function () {
    Route::get('/Funcionario', function () {
        return view('funcionario.dashboard');
    })->name('funcionario.dashboard');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
