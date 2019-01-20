<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AsistenteController extends Controller
{   
    public function index(Request $request){

        $name=$request->name;
        $email=$request->email;
        // query scope relacional con where has
        $asistentes= User::asistentes()->name($name)->email($email)->paginate(10);

    return view('asistentes.index',compact('asistentes'));
    }

    public function show($id){
        $asistente=User::asistentes()->findOrFail($id);
        
        return view('asistentes.show',compact('asistente'));
    }

    public function create()
    {

        return view('asistentes.create');
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
            $docente= Docente::findOrFail($id);
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
        $asistente=User::asistentes()->findOrFail($id);
        //si el usuarios esta habilitado se inhabilita
        if($asistente->habilitado)
        {
            $asistente->habilitado=false;
            $asistente->update();
            return back()->with('warning','Asistente '.$asistente->name .' ha sido inhabilitado');

        }
                //si el usuarios esta inhabilitado se habilita
        else
        {  
            $asistente->habilitado=true;
            $asistente->update();
            return back()->with('mensaje','Asistente '.$asistente->name.' ha sido habilitado');

        }
    }

    public function destroy($id)
    {
        $user=User::asistentes()->findOrFail($id);
        $user->delete();
        return back()->with('mensaje','Asistente '.$user->name.' fue eliminado con exito');
    }
}
    
