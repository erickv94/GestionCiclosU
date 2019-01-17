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
    //db debbuger
/*     DB::listen(function($query){
    //Imprimimos la consulta ejecutada
    echo "<pre> {$query->sql } </pre>";
    }); */

//ruta de test get
Route::get('test', function () {
    return view('materia.index');
});


//raiz de la app
Route::get('/', function () {
    return view('login');
})->middleware('afterLogin');


Route::get('/inicio', 'InicioController@index')->name('home')->middleware('permiso:index');
/**
 * Rutas para logica de autenticacion parametros de usuario
 */
require_once( __DIR__.'/routes-seguridad.php');

//envia al dashboard

Route::group(['middleware' => ['auth']], function () {
    //hacer requires si se incorporan nuevos modulos

    require_once( __DIR__.'/routes-docentes.php');
    require_once( __DIR__.'/routes-locales.php');
    require_once( __DIR__.'/routes-materias.php');
    require_once( __DIR__.'/routes-asistentes.php');
    
    

});