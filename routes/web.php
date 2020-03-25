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

use Illuminate\Support\Facades\Route;

Route::get('/', 'InicioController@index');


// Debes colocar la ruta, luego hacia donde voy a 
// invocar y cual es el metodo que voy a llamar 
// Ejemplo:
// ruta: '/user'
// hacia donde voy a invocar: 'UserController'
// metodo a llamar: 'index'

// Route::get('/user', 'UserController@index');

// php artisan optimize
// la optimizacion de rutas solo funciona con las
// rutas directas


// **** Estos son otros ejemplos de rutas ****

Route::get('/permiso', 'PermisoController@index');

Route::get('/permiso2', 'PermisoController@create');

// Si solo quieres retornar una vista, colocar la ruta
// y luego el nombre de la vista 'permiso.blade.php'
Route::view('/permiso3', 'permiso');

// con argumentos {argumento}
Route::get('/permiso4/{nombre?}', 'PermisoController@index');

// Rutas con nombres
Route::get('sistema/admin/usuario/jchr', 'PermisoController@index')->name('permiso5');

// usando expresion regular para validar el contenido
// de la variable $nombre
Route::get('permiso6/{nombre}', function ($nombre) {
    //
    return $nombre;
})->where('nombre', '[A-Za-z]+')->name('permiso');

