<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupo extends Model
{
    //relaciones
    public function materia(){
        return $this->belongsTo('App/Materia');
    }
    public function local(){
        return $this->belongsTo('App/Local');
    }
    public function horario(){
        return $this->belongsTo('App/Horario');
    }
}
