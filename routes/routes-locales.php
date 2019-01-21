<?php

/**
 * Rutas modulo locales
 */

Route::group(['prefix' => 'locales'], function () {

    Route::get('/', 'LocalController@index')->name('locales.index')->middleware('permiso:locales.index');
    Route::get('/{id}', 'LocalController@show')->name('locales.show')->middleware('permiso:locales.show')->where('id', '[0-9]+');
    Route::post('/store', 'LocalController@store')->name('locales.store')->middleware('permiso:locales.create');
    Route::get('/create', 'LocalController@create')->name('locales.create')->middleware('permiso:locales.create');    
    Route::get('/{id}/edit', 'LocalController@edit')->name('locales.edit')->middleware('permiso:locales.edit');
    Route::put('/{id}/update', 'LocalController@update')->name('locales.update')->middleware('permiso:locales.edit');
    Route::patch('/{id}/inhabilitar', 'LocalController@inhabilitar')->name('locales.inhabilitar')->middleware('permiso:locales.inhabilitar');
    Route::delete('/destroy/{id}', 'LocalController@destroy')->name('locales.destroy')->middleware('permiso:locales.inhabilitar');

});