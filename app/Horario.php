<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{   
    protected $fillable=['nivel','referido','descripcion'];
    //relaciones
    public function planificacion(){
        return $this->belongsTo('App/Planificacion','planificacion_id','id');
    }
    public function cupos(){
        return $this->hasMany('App/Cupo');
    }

}
