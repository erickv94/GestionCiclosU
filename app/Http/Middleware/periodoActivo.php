<?php

namespace App\Http\Middleware;

use Closure;
use App\Planificacion;

class periodoActivo
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
        //evitan crear planificaciones cuando estan activas
        $planificacionesActiva=Planificacion::where('estado','activo')->count();
        if($planificacionesActiva>0)
        {
            return back()->with('error','No se puede crear planificación hasta que finalice el proceso');

        }
        return $next($request);
    }
}
