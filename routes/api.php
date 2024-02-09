<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LibroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AutorController::class)->group(function () {
    Route::get('autor', 'index')->name('autor.index');
    Route::get('autor/{id_autor}', 'show')->name('autor.show');
    Route::post('autor-registro', 'store')->name('autor.store');
    Route::get('autor-eliminar/{id_autor}', 'delete')->name('autor.delete');
    Route::put('autor-edit/{id_autor}','edit')->name('autor.edit');
});

Route::controller(LibroController::class)->group(function () {
    Route::get('libro', 'index')->name('libro.index');
    Route::get('libro/{id_libro}', 'show')->name('libro.show');
    Route::post('libro-registro', 'store')->name('libro.store');
    Route::get('libro-eliminar/{id_libro}', 'delete')->name('libro.delete');
    Route::put('libro-edit/{id_libro}','edit')->name('libro.edit');

    Route::get('libros-vencidos','libros_vencidos');
});

Route::controller(ClienteController::class)->group(function () {
    Route::get('cliente', 'index')->name('cliente.index');
    Route::get('cliente/{id_cliente}', 'show')->name('cliente.show');
    Route::post('cliente-registro', 'store')->name('cliente.store');
    Route::get('cliente-eliminar/{id_cliente}', 'delete')->name('cliente.delete');
    Route::put('cliente-edit/{id_cliente}','edit')->name('cliente.edit');
});