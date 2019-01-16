<?php
/**
 * Rutas modulo asistentes
 */

Route::get('asistentes','AsistenteController@index')->name('asistentes.index')->middleware('permiso:asistentes.index');
