<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index(){
 
 
        return view('locales.index');
        }
}
