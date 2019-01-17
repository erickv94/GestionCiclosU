<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Docente;
use Illuminate\Support\Facades\DB;

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


}
