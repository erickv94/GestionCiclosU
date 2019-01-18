<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class verificacionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
       $user= User::where('email',$request->email)->first();
      if($user)
      {  
        if($user->esVerificado){
            if($user->habilitado)
                return $next($request);
            else 
                return back()->with('mensaje','Su usuario ha sido inhabilitado del sistema');
        }
        else
        {

        return redirect()->route('login')->with('mensaje','Necesita Validar email, para autenticarse');
        }

      }
      else
      {
        return $next($request);
      }
   }
}
