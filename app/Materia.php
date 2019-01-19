<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable=['nombre','codigo','descripcion'];
    
    //relaciones
    
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
}
