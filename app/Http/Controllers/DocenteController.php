<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Docente;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Presets\React;
use App\Http\Requests\DocenteRequest;
use App\Events\CreateUser;
use App\Http\Requests\DocenteRequestUpdate;

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
        ->orderBy('created_at','DESC')
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
        $docente->gradoAcademico=$request->gradoAcademico??'Docente';
        $docente->user()->associate($user);
        $docente->save();
        
        event(new CreateUser($user));

        return back()->with('mensaje','docente almacenado correctamente, se envio email de validacion');
    }

    public function edit($id){
            $docente= Docente::findOrFail($id);
            return view('docentes.edit',compact('docente'));
    }

    public function update(DocenteRequestUpdate $request, $id){
        $docente=Docente::findOrFail($id);
        $docente->gradoAcademico=$request->gradoAcademico;
        $docente->user->name=$request->name;
        $docente->user->email=$request->email;
        $docente->user->sexo=$request->sexo;
        $docente->user->push();
        return back()->with('mensaje','Docente '.$docente->user->name.' ha sido actualizado con exito');
    }

    public function inhabilitar($id)
    {
        $docente=Docente::findOrFail($id);
        //si el usuarios esta habilitado se inhabilita
        if($docente->user->habilitado)
        {
            $docente->user->habilitado=false;
            $docente->push();
            return back()->with('warning','Usuario '.$docente->user->name .' ha sido inhabilitado');

        }
                //si el usuarios esta inhabilitado se habilita
        else
        {  
            $docente->user->habilitado=true;
            $docente->push();
            return back()->with('mensaje','Usuario '.$docente->user->name.' ha sido habilitado');

        }
    }

    public function destroy($id)
    {
        $docente=Docente::findOrFail($id);
        $user=$docente->user;
        User::find($user->id)->delete();

        return back()->with('mensaje','Docente '.$user->name.' fue eliminado con exito');
    }
}
