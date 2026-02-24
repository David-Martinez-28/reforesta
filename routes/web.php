<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\EspeciesController;
use Illuminate\Support\Facades\Route;

// 1. La página de inicio (Home) que muestra la lista de usuarios
Route::get('/', [EventosController::class, 'index'])->name('home');

// 2. Controladores de Recursos (CRUD completo para todos)
Route::resource('usuarios', UsuariosController::class);
Route::resource('eventos', EventosController::class);
Route::resource('especies', EspeciesController::class);

// 3. Rutas de Login/Logout (aunque sean públicas por ahora)
Route::get('login', [UsuariosController::class, 'loginForm'])->name('login');
Route::post('login', [UsuariosController::class, 'login']);
Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');

Route::patch('unirse', [UsuariosController::class, 'unirse'])->name('usuarios.unirse');
Route::patch('desunirse', [UsuariosController::class, 'desunirse'])->name('usuarios.desunirse');
