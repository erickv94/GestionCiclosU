<?php

Route::group(['prefix' => 'planificacion'], function () {
    Route::get('/','PlanificacionController@index')->name('planificaciones.index');
    Route::get('/{id}','PlanificacionController@show')->name('planificaciones.show')->where('id', '[0-9]+');
    Route::get('/create','PlanificacionController@create')->name('planificaciones.create');
    Route::post('/store','PlanificacionController@store')->name('planificaciones.store');
    Route::get('/{id}/editar','PlanificacionController@edit')->name('planificaciones.edit');
    Route::put('/{id}/update','PlanificacionController@update')->name('planificaciones.update');
    Route::get("/{id}/horario/{horario}","PlanificacionController@mostrarHorario")->name('planificaciones.mostrar.horario');
    Route::delete('/{id}/destroy','PlanificacionController@destroy')->name('planificaciones.destroy');
});