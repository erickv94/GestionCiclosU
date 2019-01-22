<?php

Route::group(['prefix' => 'planificacion'], function () {
    Route::get('/','PlanificacionController@index')->name('planificaciones.index')->
    middleware(['permiso:planificacion.index','planTerminado']);
    Route::get('/{id}','PlanificacionController@show')->name('planificaciones.show')->where('id', '[0-9]+')->
    middleware('permiso:planificacion.show');
    Route::get('/create','PlanificacionController@create')->name('planificaciones.create')->
    middleware('permiso:planificacion.create')->middleware('periodoActivo');
    Route::post('/store','PlanificacionController@store')->name('planificaciones.store')->
    middleware('permiso:planificacion.create')->middleware('periodoActivo');
    Route::get('/{id}/editar','PlanificacionController@edit')->name('planificaciones.edit')->
    middleware('permiso:planificacion.edit');
    Route::put('/{id}/update','PlanificacionController@update')->name('planificaciones.update')->
    middleware('permiso:planificacion.edit');
    Route::get("/{id}/horario/{horario}","PlanificacionController@mostrarHorarios")->name('planificaciones.mostrar.horario')->
    middleware('permiso:planificacion.horarios');
    Route::put('/{id}/finalizar','PlanificacionController@finalizar')->name('planificaciones.finalizar')
    ->middleware('permiso:planificacion.finalizar');
    Route::delete('/{id}/destroy','PlanificacionController@destroy')->name('planificaciones.destroy')->
    middleware('permiso:planificacion.delete');
});