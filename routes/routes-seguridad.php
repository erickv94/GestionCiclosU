<?php

/**
 * Rutas modulo seguridad y extras de recuperacion de cuentas
 */


//colocar true en caso de activación de registros de usuario
Auth::routes(['register'=>false,'reset'=>false]);
//sobreescritura metodos de reset email password
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
