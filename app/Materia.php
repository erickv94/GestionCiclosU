<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable=['nombre','codigo','descripcion','ciclo','nivel'];
    
    //relaciones
    public function docentes(){
        return $this->belongsToMany('App\Docente','docentes_materias');
    }
    public function grupos(){
        return $this->hasMany('App\Grupo');
    }
    public function cupos(){
        return $this->hasMany('App\Cupo');
    }
    //scoopes
    public function scopeNombre($query,$nombre)
    {
        if($nombre)
            return $query->where('nombre','LIKE',"%$nombre%");
    }
    public function scopeCodigo($query,$codigo)
    {
        if($codigo)
            return $query->where('codigo','LIKE',"%$codigo%");
    }

    public function scopeCiclo($query,$ciclo)
    {
        if($ciclo)
            return $query->where('ciclo',$ciclo);
    
    }

    public function scopeNivel($query,$nivel)
    {
        if($nivel)
            return $query->where('nivel',$nivel);
    
    }
}
