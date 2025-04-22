<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FuncionarioController;
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

    Route::controller(FuncionarioController::class)->group(function () {
        Route::get('/Admin/Funcionario', 'index_funcionario')->name('admin_funcionario.index');
        Route::get('/Admin/Funcionario/create', 'create_funcionario')->name('admin_funcionario.create');
        Route::post('/Admin/Funcionario/store', 'store_funcionario')->name('admin_funcionario.store');
        Route::get('/Admin/Funcionario/edit/{id}', 'edit_funcionario')->name('admin_funcionario.edit');
        Route::post('/Admin/Funcionario/update/{id}', 'update_funcionario')->name('admin_funcionario.update');
        Route::get('/Admin/Funcionario/destroy/{id}', 'destroy_funcionario')->name('admin_funcionario.destroy');

        Route::get('/Admin/Certificado', 'index_certificado')->name('admin_certificado.index');
        Route::get('/Admin/Certificado/create', 'create_certificado')->name('admin_certificado.create');
        Route::get('/Admin/Certificado/store', 'store_certificado')->name('admin_certificado.store');
        Route::get('/Admin/Certificado/edit/{id}', 'edit_certificado')->name('admin_certificado.edit');
        Route::get('/Admin/Certificado/update/{id}', 'update_certificado')->name('admin_certificado.update');
        Route::get('/Admin/Certificado/destroy/{id}', 'destroy_certificado')->name('admin_certificado.destroy');

    });

});

Route::middleware(['auth', 'role:Superadmin'])->group(function () {
    Route::get('/Superadmin', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');

    Route::controller(AdminController::class)->group(function () {
        Route::get('/Superadmin/Admin', 'index')->name('superadmin_admin.index');
        Route::get('/Superadmin/Admin/create', 'create')->name('superadmin_admin.create');
        Route::post('/Superadmin/Admin/store', 'store')->name('superadmin_admin.store');
        Route::get('/Superadmin/Admin/edit/{id}', 'edit')->name('superadmin_admin.edit');
        Route::post('/Superadmin/Admin/update/{id}', 'update')->name('superadmin_admin.update');
        Route::get('/Superadmin/Admin/destroy/{id}', 'destroy')->name('superadmin_admin.destroy');


    });


});

Route::middleware(['auth', 'role:Funcionario'])->group(function () {
    Route::get('/Funcionario', function () {
        return view('funcionario.dashboard');
    })->name('funcionario.dashboard');    
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
