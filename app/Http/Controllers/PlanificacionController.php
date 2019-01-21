<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planificacion;
use App\Http\Requests\PlanificacionRequest;
use App\Horario;

class PlanificacionController extends Controller
{
    public function index(){
        $planificaciones=Planificacion::paginate(10);
        return view('planificaciones.index',compact('planificaciones'));
    
    }
    
    public function create(){
        return view('planificaciones.create');
    }
    public function store(PlanificacionRequest $request){
        $planificacion=Planificacion::create($request->all());
        $planificacion->horarios()->saveMany([
            new Horario([
                'referido'=>'Horario de primer año -'.($request->ciclo==1?'Ciclo I':'Ciclo II'),
                'nivel'=>1,
                'descripcion'=>'Horario de planificación de primer año'
            ]),     
           new Horario([
                'referido'=>'Horario de segundo año -'.($request->ciclo==1?'Ciclo I':'Ciclo II'),
                'nivel'=>2,
                'descripcion'=>'Horario de planificación de segundo año'
            ]),
            new Horario([
                'referido'=>'Horario de tercer año -'.($request->ciclo==1?'Ciclo I':'Ciclo II'),
                'nivel'=>3,
                'descripcion'=>'Horario de planificación de tercer año'
            ]),
            new Horario([
                'referido'=>'Horario de cuarto año -'.($request->ciclo==1?'Ciclo I':'Ciclo II'),
                'nivel'=>4,
                'descripcion'=>'Horario de planificación de cuarto año'
            ]),
            new Horario([
                'referido'=>'Horario de quinto año -'.($request->ciclo==1?'Ciclo I':'Ciclo II'),
                'nivel'=>5,
                'descripcion'=>'Horario de planificación de quinto año'
            ]),
        ]);
        return back()->with('mensaje','La planificacion fue creada con exito, no se podra agregar otra hasta que esta finalice, se puede editar y eliminar en casos extras');
    }
}
