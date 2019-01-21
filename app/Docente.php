<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //relaciones con otras entidades
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function materia(){
        $this->hasOne('App\Materia');
    }
    public function materias(){
        return $this->belongsToMany('App\Materia','docentes_materias');
    }
    //scropes
public function scopeEsCoordinador($query, $isTrue){

    if($isTrue){
        return $query->where('esCoordinador',true);
    }
}

public function scopeName($query, $name){

    if ($name) {
        return $query->whereHas('user',
            function($user) use($name)
            {
            $user->where('name','LIKE',"%$name%");
            });

            }
        
            }

    public function scopeEmail($query, $email){
        if ($email) {
        return $query->whereHas('user',
            function($user) use($email)
            {
            $user->where('email','LIKE',"%$email%");
            });
            }
        }

        public function scopeMateria($query, $codigo){
            if ($codigo) {
            return $query->whereHas('materias',
                function($materias) use($codigo)
                {
                $materias->where('codigo',$codigo);
                });
                }
            }


}
