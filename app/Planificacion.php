<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planificacion extends Model
{
    protected $table='planificaciones';
    
    protected $fillable = [
        'fechaInicio', 'fechaFin', 'descripción','ciclo'
    ];

    public function horarios(){
        return $this->hasMany('App\Horario','planificacion_id','id');
    }

    public function scopeFechaInicio($query,$fecha){
        if($fecha)
            return $query->where('fechaInicio','>=',$fecha);
        
    }
    public function scopeFechaFin($query,$fecha){
        if($fecha)
            return $query->where('fechaFin','<=',$fecha);
        
    }
}
