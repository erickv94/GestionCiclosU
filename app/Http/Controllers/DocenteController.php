<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Docente;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Presets\React;
use App\Http\Requests\DocenteRequest;

class DocenteController extends Controller
{
    public function index(Request $request){

        $name=$request->name;
        $email=$request->email;
        $coordinador=$request->coordinador;
        
         $docentes= Docente::with(['user'])
        ->name($name)
        ->email($email)
        ->esCoordinador($coordinador)
        ->paginate(10);

        
    return view('docentes.index',compact(['docentes']));
    }

    public function show($id){
        $docente=Docente::findOrFail($id);
        

        return view('docentes.show',compact('docente'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(DocenteRequest $request){

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->sexo=$request->sexo;
        $user->codigoVerificacion=str_random(25);
        $user->save();

        $docente=new Docente();
        $docente->gradoAcademico=$request->gradoAcademico;
        $docente->user()->associate($user);
        $docente->save();

        return back()->with('mensaje','docente almacenado correctamente');
    }
}
