<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Metodos sobre escritos de traits
     */

    public function showLoginForm()
    {
        return view('login');
    }

    protected function loggedOut(Request $request)
    {
           $request->session()->flash("mensaje","Hasta la proxima");
    }


    protected function authenticated(Request $request, $user)
    {
        $request->session()->flash("mensaje",'Bienvenido/a '.$user->name);
    }

}

