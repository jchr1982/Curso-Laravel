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

use App\Models\Admin\Permiso;
use Illuminate\Support\Facades\Route;


// Esta parte, es la nueva parte del "Menu", permite el cache
Route::get('admin/menu', 'Admin\MenuController@index')->name('menu');
Route::get('admin/menu/crear', 'Admin\MenuController@crear')->name('crear_menu');

Route::post('admin/menu', 'Admin\MenuController@guardar')->name('guardar_menu');

Route::post('admin/menu/guardar-orden', 'Admin\MenuController@guardarOrden')->name('guardar_orden');


// ******************


Route::get('/', 'InicioController@index');


// Esta forma permite el cacheo:
// Route::get('admin/permiso', 'Admin\PermisoController@index')->name('permiso');

// Esta otra forma, es mas facil de hacerlo, pero no permite el cacheo
Route::group(['prefix' => 'admin' , 'namespace' => 'Admin'], function () {
    
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');

});


// ****************************

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

// usando expresiones regulares para validar el contenido
// de la variable $nombre
Route::get('permiso6/{nombre}', function ($nombre) {
    return $nombre;
})->where('nombre', '[A-Za-z]+')->name('permiso');

