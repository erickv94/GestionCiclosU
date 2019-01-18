<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    public $table='locales';
    
    protected $fillable = [
        'nombre', 'codigo', 'tipo',
    ];
    //relaciones con otras entidades

    //scopes de filtrado
    public function scopeNombre($query,$nombre){
        if($nombre)
            return $query->where('nombre','LIKE',"%$nombre%");

    }
    public function scopeCodigo($query,$codigo){
        if($codigo)
            return $query->where('codigo','LIKE',"%$codigo%");

    }
}
