<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planificacion;
use Illuminate\Support\Collection;
use App\Horario;
use App\Materia;
use App\Local;

class HorarioController extends Controller
{
    public function index(){
        //cantidad de planificaciones activas
        $planificacionActivas=Planificacion::where('estado','activo')->count();
        //si no tiene planificaciones activas retorna atras con mensaje
        if($planificacionActivas<=0)
        {
            return back()->with('mensaje','No hay una planificación activa');
        }
        $planificacion=Planificacion::where('estado','activo')->first();

        return view('horarios.index',compact('planificacion'));
    }   

    public function show($id,$planificacion){

        $planificacion=Planificacion::where('estado','activo')->where('id',$planificacion)->firstOrFail();
        $horario=Horario::findOrFail($id);
        

        $dias=$this->getDays();
        $horas=$this->getHours();
      
        return view('horarios.show',compact('horas','dias'));
    }

    public function edit($id,$planificacion){
      
 
        $planificacion=Planificacion::where('estado','activo')->where('id',$planificacion)->firstOrFail();
        $horario=Horario::findOrFail($id);
        
        $ciclo= $planificacion->ciclo;
        $ciclo=($ciclo==2?'Par':'Impar');

        $materias=Materia::where('nivel',$horario->nivel)
        ->where('ciclo',$ciclo)
        ->orWhere('ciclo','Ambos')->get();

        $locales=Local::where('habilitado',true)->get();


        $dias=$this->getDays();
        $horas=$this->getHours();
        
      
      
        return view('horarios.edit',compact('dias','horas','materias','horario','locales'));
    }   

    public function store($id,$planificacion){


    }
    public function getHours(){
        return [
            0=>  ['codigo'=>'7-8','value'=>'07:00 AM - 8:00 AM','inicio'=>'7','fin'=>'8'],
            2=> ['codigo'=>'8-9','value'=>'08:00 AM- 9:00 AM','inicio'=>'8','fin'=>'9'],
            3=> ['codigo'=>'9-10','value'=>'09:00 AM - 10:00 AM','inicio'=>'9','fin'=>'10'],
            4=> ['codigo'=>'10-11','value'=>'10:00 AM - 11:00 AM','inicio'=>'10','fin'=>'11'],
            5=> ['codigo'=>'11-12','value'=>'11:00 AM - 12:00 MD','inicio'=>'11','fin'=>'12'],
            6=> ['codigo'=>'12-13','value'=>'12:00 MD- 01:00 PM','inicio'=>'12','fin'=>'13'],
            7=> ['codigo'=>'13-14','value'=>'01:00 PM - 02:00 PM ','inicio'=>'13','fin'=>'14'],
            8=> ['codigo'=>'14-15','value'=>'02:00 PM - 03:00 PM ','inicio'=>'14','fin'=>'15'],
            9=>['codigo'=>'15-16','value'=>'03:00 PM - 04:00 PM','inicio'=>'','fin'=>'16'],
           10=>['codigo'=>'16-17','value'=>'04:00 PM -05:00 PM','inicio'=>'','fin'=>'17'],
           11=>['codigo'=>'17-18','value'=>'05:00 PM - 06:00 PM','inicio'=>'','fin'=>'18'],
           12=>['codigo'=>'18-19','value'=>'06:00 PM -07:00 PM','inicio'=>'','fin'=>'19'],
          ];
    }

public function getDays()
{
   return [0=>['codigo'=>'lun','dia'=>'Lunes'],
            1=>['codigo'=>'mar','dia'=>'Martes'],
            2=>['codigo'=>'mie','dia'=>'Miercoles'],
            3=>['codigo'=>'jue','dia'=>'Jueves'],
            4=>['codigo'=>'vie','dia'=>'Viernes'],
            5=>['codigo'=>'sab','dia'=>'Sabado']
        ];  
}


}
