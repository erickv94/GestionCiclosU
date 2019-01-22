<?php
/**
 * Rutas modulo asistentes
 */

Route::group(['prefix' => 'asistentes'], function () {

    Route::get('/', 'AsistenteController@index')->name('asistentes.index')->middleware('permiso:asistentes.index');
    Route::get('/{id}', 'AsistenteController@show')->name('asistentes.show')->middleware('permiso:asistentes.show')->where('id', '[0-9]+');;
    Route::post('/store', 'AsistenteController@store')->name('asistentes.store')->middleware('permiso:asistentes.create');
    Route::get('/create', 'AsistenteController@create')->name('asistentes.create')->middleware('permiso:asistentes.create');    
    Route::get('/{id}/edit', 'AsistenteController@edit')->name('asistentes.edit')->middleware('permiso:asistentes.edit');
    Route::put('/{id}/update', 'AsistenteController@update')->name('asistentes.update')->middleware('permiso:asistentes.edit');
    Route::patch('/{id}/inhabilitar', 'AsistenteController@inhabilitar')->name('asistentes.inhabilitar')->middleware('permiso:asistentes.inhabilitar');
    Route::delete('/destroy/{id}', 'AsistenteController@destroy')->name('asistentes.destroy')->middleware('permiso:asistentes.delete');

});