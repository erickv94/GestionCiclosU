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
use App\Materia;

class DocenteController extends Controller
{
    public function index(Request $request){

        $name=$request->name;
        $email=$request->email;
        $coordinador=$request->coordinador;
        $materia=$request->materia;
        
        $docentes= Docente::with(['user'])
        ->materia($materia)
        ->name($name)
        ->email($email)
        ->esCoordinador($coordinador)
        ->orderBy('created_at','DESC')
        ->paginate(10);

        $materias = Materia::all();

        
    return view('docentes.index',compact(['docentes','materias']));
    }

    public function show($id){
        $docente=Docente::with('materias')->findOrFail($id);
        

        return view('docentes.show',compact('docente'));
    }

    public function create()
    {
        $materias=Materia::orderBy('nivel','ASC')->get();

        return view('docentes.create',compact('materias'));
    }

    public function store(DocenteRequest $request){

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->sexo=$request->sexo;
        $user->codigoVerificacion=str_random(25);
        $user->save();
        //se asigna el rol docente
        $user->assignRole(4);
        //se crea instancia docente
        $docente=new Docente();
        $docente->gradoAcademico=$request->gradoAcademico??'Docente';
        //asociacion de belongs to user
        $docente->user()->associate($user);
        $docente->save();
        //hace append de materias
        $docente->materias()->sync($request->materias);


        event(new CreateUser($user));

        return back()->with('mensaje','docente almacenado correctamente, se envio email de validacion');
    }

    public function edit($id){
            $docente= Docente::with('materias')->findOrFail($id);
            $materias= Materia::orderBy('nivel','ASC')->get();

            return view('docentes.edit',compact('docente','materias'));
    }

    public function update(DocenteRequestUpdate $request, $id){

        $docente=Docente::findOrFail($id);
        $docente->gradoAcademico=$request->gradoAcademico;
        $docente->user->name=$request->name;
        $docente->user->email=$request->email;
        $docente->user->sexo=$request->sexo;
        $docente->materias()->sync($request->materias);
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
