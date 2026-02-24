<?php

use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


// Rutas públicas
Route::get('login', [UsuariosController::class, 'loginForm'])->name('login');
Route::post('login', [UsuariosController::class, 'login']);
Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');
Route::patch('unirse', [UsuariosController::class, 'unirse'])->name('usuarios.unirse');

// Rutas protegidas (Solo usuarios logueados)
Route::middleware(['auth'])->group(function () {
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('eventos', EventosController::class);
    Route::resource('especies', EspeciesController::class);
});
