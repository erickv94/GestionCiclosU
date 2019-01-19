<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Http\Requests\MateriaRequest;
use App\Http\Requests\MateriaRequestUpdate;

class MateriaController extends Controller
{
    public function index(Request $request){

        $nombre=$request->nombre;
        $codigo=$request->codigo;
        

        $materias=Materia::orderBy('created_at','DESC')
        ->nombre($nombre)->codigo($codigo)->paginate(10);
        
        return view('materias.index',compact(['materias']))->withInput($request);
    }

    public function show($id){
        $materia=Materia::findOrFail($id);
        return view('materias.show',compact('materia'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(MateriaRequest $request){
      
         Materia::create($request->all());
        
        return back()->with('mensaje','Materia almacenado correctamente');
    }

    public function edit($id){
            $materia= Materia::findOrFail($id);
            return view('materias.edit',compact('materia'));
    }

    public function update(MateriaRequestUpdate $request, $id){
        $materia=Materia::findOrFail($id);

        $materia->nombre=$request->nombre;
        $materia->codigo=$request->codigo;
        $materia->descripcion=$request->descripcion;
        $materia->update();
        return back()->with('mensaje','Materia '.$materia->nombre.' ha sido actualizado con exito');
    }

    public function inhabilitar($id)
    {
        $materia=Materia::findOrFail($id);
        //si el usuarios esta habilitado se inhabilita
        if($materia->habilitado)
        {
            $materia->habilitado=false;
            $materia->update();
            return back()->with('warning','Materia '.$materia->nombre .' ha sido inhabilitado');

        }
                //si el usuarios esta inhabilitado se habilita
        else
        {  
            $materia->habilitado=true;
            $materia->update();

            return back()->with('mensaje','Materia '.$materia->nombre.' ha sido habilitado');

        }
    }

    public function destroy($id)
    {
        $materia=Materia::findOrFail($id);
        $materia->delete();

        return back()->with('mensaje','Materia '.$materia->nombre.' fue eliminado con exito');
    }

}
