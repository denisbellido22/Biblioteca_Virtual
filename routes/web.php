<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\TraductorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de la Biblioteca Virtual
|--------------------------------------------------------------------------
|
| La página principal muestra el total de registros de cada módulo.
| Cada módulo usa Route::resource() y se le cambia el nombre del parámetro
| para que el route model binding busque por su llave primaria real
| (ID_autores, ID_editores, ID_traductores, ID_libro).
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('autores', AutorController::class)
    ->except(['show'])
    ->parameters(['autores' => 'autor']);

Route::resource('editores', EditorController::class)
    ->except(['show'])
    ->parameters(['editores' => 'editor']);

Route::resource('traductores', TraductorController::class)
    ->except(['show'])
    ->parameters(['traductores' => 'traductor']);

Route::resource('libros', LibroController::class)
    ->except(['show'])
    ->parameters(['libros' => 'libro']);
