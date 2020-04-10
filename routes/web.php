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

Route::get('/', 'InicioController@index')->name('inicio');

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');


Route::get('admin', 'Admin\AdminController@index')->middleware(['auth', 'superadmin']);

// Esta parte, es la nueva parte del "Menu", permite el cache

/*RUTAS MENU*/
Route::get('admin/menu', 'Admin\MenuController@index')->name('menu');
Route::get('admin/menu/crear', 'Admin\MenuController@crear')->name('crear_menu');
Route::post('admin/menu', 'Admin\MenuController@guardar')->name('guardar_menu');
Route::post('admin/menu/guardar-orden', 'Admin\MenuController@guardarOrden')->name('guardar_orden');

Route::get('admin/menu/{id}/editar', 'Admin\MenuController@editar')->name('editar_menu');
Route::put('admin/menu/{id}', 'Admin\MenuController@actualizar')->name('actualizar_menu');
Route::get('admin/menu/{id}/eliminar', 'Admin\MenuController@eliminar')->name('eliminar_menu');

/*RUTAS ROL*/
Route::get('admin/rol', 'Admin\RolController@index')->name('rol');
Route::get('admin/rol/crear', 'Admin\RolController@crear')->name('crear_rol');
Route::post('admin/rol', 'Admin\RolController@guardar')->name('guardar_rol');

Route::get('admin/rol/{id}/editar', 'Admin\RolController@editar')->name('editar_rol');
Route::put('admin/rol/{id}', 'Admin\RolController@actualizar')->name('actualizar_rol');
Route::delete('admin/rol/{id}', 'Admin\RolController@eliminar')->name('eliminar_rol');

/*RUTAS MENU-ROL*/
Route::get('admin/menu-rol', 'Admin\MenuRolController@index')->name('menu_rol');
Route::post('admin/menu-rol', 'Admin\MenuRolController@guardar')->name('guardar_menu_rol');

// ******************


// Esta forma permite el cacheo:
// Route::get('admin/permiso', 'Admin\PermisoController@index')->name('permiso');

/*RUTAS DE PERMISO*/
// Esta otra forma, es mas facil de hacerlo, pero no permite el cacheo
Route::group(['prefix' => 'admin' , 'namespace' => 'Admin'], function () {
    
    Route::get('permiso', 'PermisoController@index')->name('permiso1');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');

    Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso');
    Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar_permiso');
    Route::put('permiso/{id}', 'PermisoController@actualizar')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');

    /*RUTAS PERMISO_ROL*/
    Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
    Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol');

});

Route::get('libro', 'LibroController@index')->name('libro');
Route::get('libro/crear', 'LibroController@crear')->name('crear_libro');
Route::post('libro', 'LibroController@guardar')->name('guardar_libro');
Route::get('libro/{id}/editar', 'LibroController@editar')->name('editar_libro');
Route::put('libro/{id}', 'LibroController@actualizar')->name('actualizar_libro');
Route::delete('libro/{id}', 'LibroController@eliminar')->name('eliminar_libro');


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

