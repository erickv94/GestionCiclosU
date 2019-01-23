<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planificacion;
use App\Http\Requests\PlanificacionRequest;
use App\Horario;

class PlanificacionController extends Controller
{
    public function index(Request $request){
        $planificaciones=Planificacion::fechaInicio($request->fechaInicio)
        ->fechaFin($request->fechaFin)->paginate(10);

        return view('planificaciones.index',compact('planificaciones'));
    }
    
    public function create(){
        return view('planificaciones.create');
    }

    public function show($id){

        $planificacion=Planificacion::findOrFail($id);

        return view('planificaciones.show',compact('planificacion'));
    }

    public function store(PlanificacionRequest $request){
        $planificacion=Planificacion::create($request->all());
        //crea todo los horarios necesarios   
        $planificacion->horarios()->saveMany([
            new Horario([
                'referido'=>'Primer año -'.($request->ciclo==1?'ciclo I':'ciclo II'),
                'nivel'=>1,
                'descripcion'=>'Horario de planificación de primer año facultad de Quimica y Farmacia'
            ]),     
           new Horario([
                'referido'=>'Segundo año -'.($request->ciclo==1?'ciclo I':'ciclo II'),
                'nivel'=>2,
                'descripcion'=>'Horario de planificación de segundo año facultad de Quimica y Farmacia'
            ]),
            new Horario([
                'referido'=>'Tercer año -'.($request->ciclo==1?'ciclo I':'ciclo II'),
                'nivel'=>3,
                'descripcion'=>'Horario de planificación de tercer año facultad de Quimica y Farmacia'
            ]),
            new Horario([
                'referido'=>'Cuarto año -'.($request->ciclo==1?'ciclo I':'ciclo II'),
                'nivel'=>4,
                'descripcion'=>'Horario de planificación de cuarto año facultad de Quimica y Farmacia'
            ]),
            new Horario([
                'referido'=>'Quinto año -'.($request->ciclo==1?'ciclo I':'ciclo II'),
                'nivel'=>5,
                'descripcion'=>'Horario de planificación de quinto año facultad de Quimica y Farmacia'
            ]),
        ]);
        return redirect()->route('planificaciones.index')->with('mensaje','La planificacion fue creada con exito, no se podra agregar otra hasta que esta finalice, se puede editar y eliminar en casos extras');
    }

    public function edit($id)
    {
        $planificacion=Planificacion::findOrFail($id);
        return view('planificaciones.edit',compact('planificacion'));
    }

    public function update(Request $request,$id)
    {
        $planificacion=Planificacion::findOrFail($id);
        $planificacion->fechaInicio=$request->fechaInicio;
        $planificacion->fechaFin=$request->fechaFin;
        $planificacion->ciclo=$request->ciclo;
        $planificacion->descripcion=$request->descripcion;
        $planificacion->update();

        return redirect()->route('planificaciones.index')->with('mensaje','La planificacion fue actualizada con exito');
        
    }

    public function destroy($id)
    {
        $planificacion=Planificacion::findOrFail($id);
        $planificacion->delete();
        return back()->with('mensaje','La planificación se ha borrado con exito');
    }

    public function mostrarHorarios()
    {

    }

    public function finalizar($id){
        $planificacion=Planificacion::findOrFail($id);
        
           if( $planificacion->estado=='activo' )
           {
            $planificacion->estado='finalizado';


            $planificacion->update();

            return back()->with('mensaje','Se actualizo el estado a terminado');
           }

    }

}
