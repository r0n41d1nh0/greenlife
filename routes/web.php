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
Route::post('/productos/borrar', 'App\Http\Controllers\ProductosController@borrar')->name('productos.borrar');

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
Route::get('/ingresos/editar-detalle/{id_detalle}', 'App\Http\Controllers\IngresosController@editar_detalle')->name('ingresos.detalle.editar');
Route::post('/ingresos/actualizar-detalle', 'App\Http\Controllers\IngresosController@actualizar_detalle')->name('ingresos.detalle.actualizar');

//Inventario
Route::get('/inventario', 'App\Http\Controllers\InventarioController@lista')->name('inventario.lista');

//Salidas
Route::get('/salidas', 'App\Http\Controllers\SalidasController@lista')->name('salidas.lista');
Route::get('/salidas/nuevo', 'App\Http\Controllers\SalidasController@nuevo')->name('salidas.nuevo');
Route::post('/salidas/nuevo', 'App\Http\Controllers\SalidasController@registrar')->name('salidas.registrar');
Route::get('/salidas/{id}/editar', 'App\Http\Controllers\SalidasController@editar')->name('salidas.editar');
Route::post('/salidas/actualizar', 'App\Http\Controllers\SalidasController@actualizar')->name('salidas.actualizar');
Route::post('/salidas/confirmar', 'App\Http\Controllers\SalidasController@confirmar')->name('salidas.confirmar');
Route::post('/salidas/borrar', 'App\Http\Controllers\SalidasController@borrar')->name('salidas.borrar');
// Salidas - Detalle
Route::get('/salidas/{id}/detalle', 'App\Http\Controllers\SalidasController@lista_detalle')->name('salidas.detalle.lista');
Route::post('/salidas/nuevo-detalle', 'App\Http\Controllers\SalidasController@registrar_detalle')->name('salidas.detalle.registrar');
Route::post('/salidas/borrar-detalle', 'App\Http\Controllers\SalidasController@borrar_detalle')->name('salidas.detalle.borrar');
Route::get('/salidas/detalle/{id}/editar', 'App\Http\Controllers\SalidasController@editar_detalle')->name('salidas.detalle.editar');
Route::post('/salidas/actualizar-detalle', 'App\Http\Controllers\SalidasController@actualizar_detalle')->name('salidas.detalle.actualizar');
