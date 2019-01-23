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
    
    
    Route::put('/{id}/finalizar','PlanificacionController@finalizar')->name('planificaciones.finalizar')
    ->middleware('permiso:planificacion.finalizar');
    
    Route::delete('/{id}/destroy','PlanificacionController@destroy')->name('planificaciones.destroy')->
    middleware('permiso:planificacion.delete');
});


Route::group(['prefix' => 'horarios'], function () {
    Route::get('/','HorarioController@index')->name('horarios.index')->middleware('permiso:horarios.index');
    
    Route::get('/{id}/plan/{planificacion}/edit','HorarioController@edit')->name('horarios.edit')->middleware('permiso:horarios.edit');
    
    Route::get('/{id}/plan/{planificacion}/show','HorarioController@show')->name('horarios.show')->middleware('permiso:horarios.show');
    
    Route::put('/{id}/plan/{planificacion}/store','HorarioController@store')->name('horarios.store')->middleware('permiso:horarios.store');
});