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
        //de entrada relaciona si posee alguna disponiblidad la materia para ser coordinada
        $bandera=false;
        if($request->materia&&($request->delegar==false))
        {
            $materiaDisponible=Materia::find($request->materia);   
            if($materiaDisponible->docente_id)
            {
                $nombreCoordinador=$materiaDisponible->docente->user->name;
            
                return back()->with('error','La materia a coordinar, ya dispone de coordinador, 
                por lo tanto no se guardo el docente en el sistema')
                ->with('mensaje','Puede asignar al docente con la coordinación,
                 eliminando la cordinación del docente '.$nombreCoordinador)
                ->withInput($request->toArray())
                ->with('activate',true);
           
            }
            else
                $bandera=true;
            
            }

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->sexo=$request->sexo;
        $user->codigoVerificacion=str_random(25);
        $user->save();
        //se asigna el rol docente
        $user->assignRole(2);
        //se crea instancia docente
        $docente=new Docente();
        $docente->gradoAcademico=$request->gradoAcademico??'Docente';
        //asociacion de belongs to user
        $docente->user()->associate($user);
        $docente->save();
        //hace append de materias
        $docente->materias()->sync($request->materias);
        
        
        if($request->delegar||$bandera)
        {
            $materia=Materia::find($request->materia);
                //si posee un id la materia a coordinar lo escribe como coordinacion false
                if($materia->docente_id)
                {
                    $materia->docente->esCoordinador=false;
                    $materia->push();
                }

            $materia->docente()->associate($docente);
            $docente->esCoordinador=true;
            $docente->user->syncRoles([3]);
            $docente->update();
            $materia->update();

            $addMensaje=$request->delegar?' Se asigno cordinacion de la materia '.$materia->nombre:'';
    
        }


//        event(new CreateUser($user));

        return back()->with('mensaje','docente almacenado correctamente, se envio email de validacion'.($addMensaje??''));
    }

    public function edit($id){
            $docente= Docente::with('materias')->findOrFail($id);
            $materias= Materia::orderBy('nivel','ASC')->get();

            return view('docentes.edit',compact('docente','materias'));
    }

    public function update(DocenteRequestUpdate $request, $id){
        //
        $docente=Docente::findOrFail($id);
        $bandera=false;
        if($request->materia&&($request->delegar==false))
        {
            $materiaDisponible=Materia::find($request->materia);  
            //en caso de que sea la misma 
            if($materiaDisponible->docente_id==$docente->id)
            {
                return back()->with('mensaje','La materia a coordinar, ya es cordinada por este docente')
                ->withInput($request->toArray());
            }

           if($materiaDisponible->docente_id)
            {
                $nombreCoordinador=$materiaDisponible->docente->user->name;
            
                return back()->with('error','La materia a coordinar, ya dispone de coordinador, 
                por lo tanto no se actualizo el docente en el sistema')
                ->with('mensaje','Puede asignar al docente con la coordinación,
                 eliminando la cordinación del docente '.$nombreCoordinador)
                ->withInput($request->toArray())
                ->with('activate',true);
           
            }
            else
                $bandera=true;
            
        }

        $emailViejo;

        $docente->gradoAcademico=$request->gradoAcademico;
        $docente->user->name=$request->name;
        //si se actualiza crea un nuevo codigo de verificacion, si el email es diferente
        $emailViejo=$docente->user->email;  

        if($request->email!==$docente->user->email)
           $docente->user->codigoVerificacion=str_random(25);
          
        
        $docente->user->email=$request->email;
        $docente->user->sexo=$request->sexo;
        $docente->materias()->sync($request->materias);
        $docente->user->push();
       
        //despues de actualizado se ejecuta evento de envio de email        
        if($request->email!==$emailViejo)
        {   $addMessage=', se envio codigo de verificación a nuevo email';
            // event(new CreateUser($docente->user));
        }

        if($request->delegar||$bandera)
        {
            $materia=Materia::find($request->materia);
            //si docente ya cordina una materia le quita el id a su materia
           if ($docente->materia){
               $docente->materia->docente_id=null;
             }

            //si posee un id la materia a coordinar lo escribe como coordinacion false
            if($materia->docente_id)
            {
                $materia->docente->esCoordinador=false;
                $materia->push();
            }

            $docente->user->syncRoles([3]);
            $docente->esCoordinador=true;
            $docente->push();
             
            $materia->docente()->associate($docente);
            $materia->update();

            $addMensajeCoordinacion=$request->delegar?', Se asigno cordinacion de la materia '.$materia->nombre:'';
    
        }

        return back()->with('mensaje','Docente '.$docente->user->name.
        ' ha sido actualizado con exito'.($addMessage??'').($addMensajeCoordinacion??''));
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

        if($docente->materia){
            $addMensaje=', Se elimino la coordinacion relacionada a '.$docente->materia->nombre;
            $docente->materia->docente_id=null;
            $docente->push();

        }
        User::find($user->id)->delete();

        return back()->with('mensaje','Docente '.$user->name.' fue eliminado con exito'.($addMensaje??''));
    }
}
