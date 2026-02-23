<?php

use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


Route::resource('usuarios',UsuariosController::class);
Route::resource('eventos',EventosController::class);
Route::resource('especies',EspeciesController::class);
Route::get('login', [UsuariosController::class, 'loginForm'])->name('login');
Route::post('login', [UsuariosController::class, 'login']);
Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');

