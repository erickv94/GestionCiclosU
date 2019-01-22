<?php
/**
 * Rutas modulo materias
 */
Route::group(['prefix' => 'materias'], function () {

   Route::get('/', 'MateriaController@index')->name('materias.index')->middleware('permiso:materias.index');
   Route::get('/{id}', 'MateriaController@show')->name('materias.show')->middleware('permiso:materias.show')->where('id', '[0-9]+');;
   Route::post('/store', 'MateriaController@store')->name('materias.store')->middleware('permiso:materias.create');
   Route::get('/create', 'MateriaController@create')->name('materias.create')->middleware('permiso:materias.create');    
   Route::get('/{id}/edit', 'MateriaController@edit')->name('materias.edit')->middleware('permiso:materias.edit');
   Route::put('/{id}/update', 'MateriaController@update')->name('materias.update')->middleware('permiso:materias.edit');
   Route::patch('/{id}/inhabilitar', 'MateriaController@inhabilitar')->name('materias.inhabilitar')->middleware('permiso:materias.inhabilitar');
   Route::delete('/destroy/{id}', 'MateriaController@destroy')->name('materias.destroy')->middleware('permiso:materias.delete');

});