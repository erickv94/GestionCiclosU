<?php

/**
 * Rutas modulo docentes
 */
  Route::get('docentes', 'DocenteController@index')->name('docentes.index')->middleware('permiso:docentes.index');
  