<?php

use App\Http\Controllers\EspeciesController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


Route::resource('usuarios',UsuariosController::class);
Route::resource('eventos',EventosController::class);
Route::resource('especies',EspeciesController::class);