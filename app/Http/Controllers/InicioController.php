<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;
use Carbon\Carbon;
use App\User;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $docentes=Docente::/* where('esCoordinador',1)-> */count();
        /* $asistentes=Asistente::count();
        $materias=Materia::count();
        $locales=Local::count();
 */
        return view('home',compact(['docentes']));
    }


    public function verificar($codigo){
        $user=User::where('codigoVerificacion',$codigo)->firstOrFail();
        if($user){
            if($user->esVerificado)
                return redirect()->route('/')->with('mensaje','Parece que tu cuenta ya ha sido verificada');
            else       
                return view('auth.verificar');

        }

        return redirect()->route('/');
    }

    public function createPassword(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password_confirmation' => 'required_with:password|same:password',
            'password' => 'required'
        ]);


        $user=User::where('email',$request->email)->first();
        $password=$request->password;
        $password_valido=$request->password_confirmation;
            


        if($user){
            $user->password=bcrypt($password);
            $user->password_creado_en=Carbon::now();
            $user->esVerificado=true;
            $user->update();

            return redirect()->route('login')->with('mensaje','Ya puedes aunteticarte con tu correo y contraseña');
        }   

        return back()->with('mensaje','Debes colocar tu email correcto');
    }
}
