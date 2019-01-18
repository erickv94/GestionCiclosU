<?php

/**
 * Rutas modulo docentes
 */
Route::group(['prefix' => 'docentes'], function () {

    Route::get('/', 'DocenteController@index')->name('docentes.index')->middleware('permiso:docentes.index');
    Route::get('/{id}', 'DocenteController@show')->name('docentes.show')->middleware('permiso:docentes.show')->where('id', '[0-9]+');;
    Route::post('/store', 'DocenteController@store')->name('docentes.store')->middleware('permiso:docentes.create');
    Route::get('/create', 'DocenteController@create')->name('docentes.create')->middleware('permiso:docentes.create');    
    Route::get('/{id}/edit', 'DocenteController@edit')->name('docentes.edit')->middleware('permiso:docentes.edit');
    Route::put('/{id}/update', 'DocenteController@update')->name('docentes.update')->middleware('permiso:docentes.edit');
    Route::patch('/{id}/inhabilitar', 'DocenteController@inhabilitar')->name('docentes.inhabilitar')->middleware('permiso:docentes.inhabilitar');
    Route::delete('/destroy/{id}', 'DocenteController@destroy')->name('docentes.destroy')->middleware('permiso:docentes.inhabilitar');

});