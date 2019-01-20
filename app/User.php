<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Notificaciones remitidas 
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    /**
     * Relaciones implementadas en el ORM 
     */
    public function Docente()
    {
        return $this->hasOne('App\Docente');
    }

    /**
     * Queries scopes declarados
     */
    public function scopeName($query, $name){
            if ($name) {
                return $query->where('name','LIKE',"%$name%");
            }
    }

    public function scopeEmail($query, $email){
        if ($email) {
            return $query->where('email','LIKE',"%$email%");
        }
    }

    public function scopeAsistentes($query){


            return $query->whereHas('roles',
                function($roles)
                {
                $roles->where('slug','asistente');
                });
    
                
            
    }

}
