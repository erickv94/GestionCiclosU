<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DocenteController extends Controller
{
    public function index(){
        $docentes= User::all();

        return view('docente.index',compact(['docentes'=>$docentes]));
    }
}
