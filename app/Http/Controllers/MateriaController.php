<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index(){
 
 
        return view('materias.index');
     }  
}
