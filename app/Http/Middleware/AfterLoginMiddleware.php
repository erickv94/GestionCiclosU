<?php

namespace App\Http\Middleware;

use Closure;

class AfterLoginMiddleware
{
    /**
     * Acepta el acceso a '/' si no esta autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check())
            return redirect('/inicio');
        
        return $next($request);

    }
}
