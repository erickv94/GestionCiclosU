<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use Carbon\Carbon;
use App\User;
use App\Materia;
use App\Local;
use Illuminate\Support\Facades\Hash;

class InicioController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('verificar','createPassword');
    }

    //vista principal index de dashboard
    public function index()
    {
        $docentes=Docente::/* where('esCoordinador',1)-> */count();
        $asistentes=User::asistentes()->count();
        $materias=Materia::count();
        $locales=Local::count();

        return view('home',compact(['docentes','materias','locales','asistentes']));
    }


    public function verificar($codigo)
    {
        $user=User::where('codigoVerificacion',$codigo)->firstOrFail();
        
        if($user)
        {
            if($user->esVerificado)
                return redirect()->route('home')->with('mensaje','Parece que tu cuenta ya ha sido verificada');
            else       
                return view('auth.verificar');

        }

        return redirect()->route('home');
    }
    //controllador para establecer contraseña y verificacion del id 
    //es de peticion post
    public function createPassword(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password_confirmation' => 'required_with:password|same:password',
            'password' => 'required'
        ]);

         //encuentra el usuario por su email,traido del formulario
        $user=User::where('email',$request->email)->first();

        $password=$request->password;
         //consulta si el usuario existe   
        if($user){
            $user->password=bcrypt($password);
            $user->password_creado_en=Carbon::now();
            //por medio de null
            $user->codigoVerificacion=null;
            $user->esVerificado=true;
            $user->update();

            return redirect()->route('login')->with('mensaje','Ya puedes aunteticarte con tu correo y contraseña');
        }   

        //return back()->with('mensaje','Debes colocar tu email correcto');
    }

    public function perfil(){
        $user=auth()->user();

        return view('profile',compact('user'));
    }

    
    public function perfilUpdate(Request $request){
        $user=auth()->user();
        // si el hash existe
        if(!Hash::check( $request->password,$user->password ))
        {
            return back()->with('warning','La contraseña no coincide con el actual');
        }

        $request->validate([
            'confirmacion' => 'required_with:nuevo|same:nuevo',
            'password' => 'required',
            'nuevo'=>'required'
        ]);
       
            $user->password=bcrypt($request->nuevo);
            $user->updated_at=now();
            $user->update();

            return back()->with('mensaje','Se cambio tu contraseña con exito ');            
    }
}
