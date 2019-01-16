<?php
/**
 * Rutas modulo materias
 */
    Route::get('materias','MateriaController@index')->name('materias.index')->middleware('permiso:materias.index');
