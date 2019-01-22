<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\AsistenteRequest;
use App\Http\Requests\AsistenteRequestUpdate;
use App\Events\CreateUser;

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

    public function store(AsistenteRequest $request){

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->sexo=$request->sexo;
        $user->codigoVerificacion=str_random(25);
        $user->save();
        //se asigna el rol docente
        $user->assignRole(4);

        event(new CreateUser($user));

        return back()->with('mensaje','Asistente almacenado correctamente, se envio email de validacion');
        }

        public function edit($id){
                $asistente= User::asistentes()->findOrFail($id);
                return view('asistentes.edit',compact('asistente'));
        }

        public function update(AsistenteRequestUpdate $request, $id){
            $asistente=User::asistentes()->findOrFail($id);
            $asistente->name=$request->name;
            $asistente->sexo=$request->sexo;

            $emailViejo=$asistente->email;
            //actualizacon de codigo de verificacion
            if($asistente->email!==$request->email)
                $asistente->codigoVerificacion=str_random(25);
            
            $asistente->email=$request->email;
            $asistente->update();

            //enviar codigo de verificacion a nuevo email
            if($emailViejo!==$request->email)
            {
                event(new CreateUser($asistente));
                $addMessage=' se envio codigo de verificación al email actualizado';
            }
            
            return back()->with('mensaje','Asistente '
            .$asistente->name.
            ' ha sido actualizado con exito'
            .($addMessage??''));
            
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
    
