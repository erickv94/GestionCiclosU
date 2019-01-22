<?php

Route::group(['prefix' => 'planificacion'], function () {
    Route::get('/','PlanificacionController@index')->name('planificaciones.index')->
    middleware('permiso:planificacion.index');
    Route::get('/{id}','PlanificacionController@show')->name('planificaciones.show')->where('id', '[0-9]+')->
    middleware('permiso:planificacion.show');
    Route::get('/create','PlanificacionController@create')->name('planificaciones.create')->
    middleware('permiso:planificacion.create');
    Route::post('/store','PlanificacionController@store')->name('planificaciones.store')->
    middleware('permiso:planificacion.create');
    Route::get('/{id}/editar','PlanificacionController@edit')->name('planificaciones.edit')->
    middleware('permiso:planificacion.edit');
    Route::put('/{id}/update','PlanificacionController@update')->name('planificaciones.update')->
    middleware('permiso:planificacion.edit');
    Route::get("/{id}/horario/{horario}","PlanificacionController@mostrarHorario")->name('planificaciones.mostrar.horario')->
    middleware('permiso:planificacion.horarios');
    Route::delete('/{id}/destroy','PlanificacionController@destroy')->name('planificaciones.destroy')->
    middleware('permiso:planificacion.delete');
});