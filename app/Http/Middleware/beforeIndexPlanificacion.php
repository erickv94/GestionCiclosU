<?php

namespace App\Http\Middleware;

use Closure;
use App\Planificacion;

class beforeIndexPlanificacion
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
        $planificacionHoy=Planificacion::where('fechaFin','<',now())
        ->where('estado','activo')->get()->first();
        if($planificacionHoy)
        {
            $planificacionHoy->estado='tiempo';
            $planificacionHoy->update();
        }


        return $next($request);
    }
}
