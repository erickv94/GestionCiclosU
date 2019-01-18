<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;
use App\Http\Requests\LocalRequest;
use App\Http\Requests\LocalRequestUpdate;

class LocalController extends Controller
{
    public function index(Request $request){

        $nombre=$request->nombre;
        $codigo=$request->codigo;
        

        $locales=Local::orderBy('created_at','DESC')
        ->nombre($nombre)->codigo($codigo)->paginate(10);
        
    return view('locales.index',compact(['locales']));
    }

    public function show($id){
        $local=Local::findOrFail($id);
        return view('locales.show',compact('local'));
    }

    public function create()
    {
        return view('locales.create');
    }

    public function store(LocalRequest $request){
      
         Local::create($request->all());
        
        return back()->with('mensaje','Local almacenado correctamente');
    }

    public function edit($id){
            $local= Local::findOrFail($id);
            return view('locales.edit',compact('local'));
    }

    public function update(LocalRequestUpdate $request, $id){
        $local=Local::findOrFail($id);

        $local->nombre=$request->nombre;
        $local->codigo=$request->codigo;
        $local->tipo=$request->tipo;
        $local->update();
        return back()->with('mensaje','Local '.$local->nombre.' ha sido actualizado con exito');
    }

    public function inhabilitar($id)
    {
        $local=Local::findOrFail($id);
        //si el usuarios esta habilitado se inhabilita
        if($local->habilitado)
        {
            $local->habilitado=false;
            $local->update();
            return back()->with('warning','Local '.$local->nombre .' ha sido inhabilitado');

        }
                //si el usuarios esta inhabilitado se habilita
        else
        {  
            $local->habilitado=true;
            $local->update();

            return back()->with('mensaje','Local '.$local->nombre.' ha sido habilitado');

        }
    }

    public function destroy($id)
    {
        $local=Local::findOrFail($id);
        $local->delete();

        return back()->with('mensaje','Local '.$local->nombre.' fue eliminado con exito');
    }

}
