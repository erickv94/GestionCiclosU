<?php

/**
 * Rutas modulo docentes
 */
  Route::get('docentes', 'DocenteController@index')->name('docentes.index')->middleware('permiso:docentes.index');
  Route::get('docentes/{id}', 'DocenteController@show')->name('docentes.show')->middleware('permiso:docentes.show');
  Route::get('docentes/create', 'DocenteController@create')->name('docentes.create')->middleware('permiso:docentes.create');
  Route::post('docentes/store', 'DocenteController@store')->name('docentes.store')->middleware('permiso:docentes.create');
  Route::get('docentes/{id}/edit', 'DocenteController@edit')->name('docentes.edit')->middleware('permiso:docentes.edit');
  Route::put('docentes/{id}/update', 'DocenteController@update')->name('docentes.update')->middleware('permiso:docentes.edit');
  Route::put('docentes/{id}/inhabilitar', 'DocenteController@inhabilitar')->name('docentes.inhabilitar')->middleware('permiso:docentes.inhabilitar');
 