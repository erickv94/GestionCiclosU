<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $timestamps=false;
    protected $fillable=['nombre','tipo','materia_id'];
    //relaciones
    public function materia(){
        $this->belongsTo('App\Materia');
    }   
}
