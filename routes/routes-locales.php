<?php

/**
 * Rutas modulo locales
 */

Route::get('locales','LocalController@index')->name('locales.index')->middleware('permiso:locales.index');
