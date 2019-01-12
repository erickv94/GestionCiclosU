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

//raiz de la app
Route::get('/', function () {
    return view('login');
})->middleware('afterLogin');

/**
 * Rutas para logica de autenticacion 
 */

//colocar true en caso de activación de registros de usuario
Auth::routes(['register'=>false,'reset'=>false]);

Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//envia al dashboard
Route::get('/inicio', 'InicioController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('docentes', 'DocenteController@index')->name('docentes.index')->middleware('permiso:docentes.index');
});