<?php

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

Route::get('/', 'ProductoController@showProductos');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('producto', 'ProductoController@index');
Route::get('producto/crear', 'ProductoController@create');
Route::post('producto', 'ProductoController@store');
Route::get('producto/{id}/edit', 'ProductoController@edit');
Route::put('producto/{id}', 'ProductoController@update');

Route::post('agregar/{id}', 'FacturaController@agregarProducto');
Route::get('mi_factura', 'FacturaController@verFactura');
Route::get('ver_facturas', 'FacturaController@showFacturas');
Route::get('ver_factura/{id}', 'FacturaController@detalleFactura');
Route::post('pagar_factura/{id}', 'FacturaController@pagarFactura');
Route::post('cancelar_factura/{id}', 'FacturaController@cancelarFactura');
