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

//Personas
Route::get('/personas', 'App\Http\Controllers\PersonasController@lista')->name('personas.lista');
Route::get('/personas/nuevo', 'App\Http\Controllers\PersonasController@nuevo')->name('personas.nuevo');
Route::post('/personas/nuevo', 'App\Http\Controllers\PersonasController@registrar')->name('personas.registrar');
Route::get('/personas/{id}/editar', 'App\Http\Controllers\PersonasController@editar')->name('personas.editar');
Route::post('/personas/actualizar', 'App\Http\Controllers\PersonasController@actualizar')->name('personas.actualizar');

//Ingresos

Route::get('/ingresos', 'App\Http\Controllers\IngresosController@lista')->name('ingresos.lista');
Route::get('/ingresos/nuevo', 'App\Http\Controllers\IngresosController@nuevo')->name('ingresos.nuevo');
Route::post('/ingresos/nuevo', 'App\Http\Controllers\IngresosController@registrar')->name('ingresos.registrar');
Route::get('/ingresos/{id}/editar', 'App\Http\Controllers\IngresosController@editar')->name('ingresos.editar');
Route::post('/ingresos/actualizar', 'App\Http\Controllers\IngresosController@actualizar')->name('ingresos.actualizar');
// Ingresos - Detalle
Route::get('/ingresos/{id}/detalle', 'App\Http\Controllers\IngresosController@lista_detalle')->name('ingresos.detalle.lista');
Route::post('/ingresos/nuevo-detalle', 'App\Http\Controllers\IngresosController@registrar_detalle')->name('ingresos.detalle.registrar');
Route::post('/ingresos/borrar-detalle', 'App\Http\Controllers\IngresosController@borrar_detalle')->name('ingresos.detalle.borrar');

//Inventario
Route::get('/inventario', 'App\Http\Controllers\InventarioController@lista')->name('inventario.lista');