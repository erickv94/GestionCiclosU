<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public $timestamps=false;

    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

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




}
