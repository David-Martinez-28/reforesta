<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\EspeciesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventosController::class, 'index'])->name('home');

Route::resource('usuarios', UsuariosController::class);
Route::resource('eventos', EventosController::class);
Route::resource('especies', EspeciesController::class);

Route::get('login', [UsuariosController::class, 'loginForm'])->name('login');
Route::post('login', [UsuariosController::class, 'login']);
Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');

Route::patch('unirse', [UsuariosController::class, 'unirse'])->name('usuarios.unirse');
Route::patch('desunirse', [UsuariosController::class, 'desunirse'])->name('usuarios.desunirse');
