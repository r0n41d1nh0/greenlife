<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'App\Http\Controllers\PaginasController@home')->name('inicio');

//Productos
Route::get('/productos', 'App\Http\Controllers\ProductosController@lista')->name('productos.lista');
Route::get('/productos/nuevo', 'App\Http\Controllers\ProductosController@nuevo')->name('productos.nuevo');
Route::post('/productos/nuevo', 'App\Http\Controllers\ProductosController@registrar')->name('productos.registrar');
Route::get('/productos/{id}/editar', 'App\Http\Controllers\ProductosController@editar')->name('productos.editar');
Route::post('/productos/actualizar', 'App\Http\Controllers\ProductosController@actualizar')->name('productos.actualizar');