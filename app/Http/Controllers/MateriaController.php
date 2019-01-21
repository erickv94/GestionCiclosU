<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Http\Requests\MateriaRequest;
use App\Http\Requests\MateriaRequestUpdate;
use App\Grupo;

class MateriaController extends Controller
{
    public function index(Request $request){

        $nombre=$request->nombre;
        $codigo=$request->codigo;
        $ciclo=$request->ciclo;
        $nivel=$request->nivel;

        $materias=Materia::orderBy('created_at','DESC')
        ->nombre($nombre)->codigo($codigo)
        ->ciclo($ciclo)->nivel($nivel)->paginate(10);
        
        return view('materias.index',compact(['materias']))->withInput($request);
    }

    public function show($id){
        $materia=Materia::findOrFail($id);
        $gruposTeorico=$materia->grupos()->where('tipo','GT')->get();
        $gruposLaboratorio=$materia->grupos()->where('tipo','GL')->get();
        
        return view('materias.show',compact('materia','gruposTeorico','gruposLaboratorio'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(MateriaRequest $request){
      
         $materia=Materia::create($request->all());

        for ($i=1; $i <= $request->gruposLaboratorio; $i++) 
        { 
            Grupo::create([
                'nombre'=>'GL-'.$i,
                'tipo'=>'GL',
                'materia_id'=>$materia->id,
            ]);
            
        }

        for ($i=1; $i <= $request->gruposTeorico; $i++) 
        { 
             Grupo::create([
                'nombre'=>'GT-'.$i,
                'tipo'=>'GT',
                'materia_id'=>$materia->id,
            ]);
        }

        return back()->with('mensaje','Materia almacenado correctamente');
    }

    public function edit($id){
            $materia= Materia::findOrFail($id);
            $cantidadGL=$materia->grupos()->where('tipo','GL')->count();
            $cantidadGT=$materia->grupos()->where('tipo','GT')->count();
            
            return view('materias.edit',compact('materia','cantidadGL','cantidadGT'));
    }

    public function update(MateriaRequestUpdate $request, $id){
        $materia=Materia::findOrFail($id);
        $cantidadGL=$materia->grupos()->where('tipo','GL')->count();
        $cantidadGT=$materia->grupos()->where('tipo','GT')->count();
       //dd($request->all());
        $materia->nombre=$request->nombre;
        $materia->codigo=$request->codigo;
        $materia->ciclo=$request->ciclo;
        $materia->nivel=$request->nivel;
        $materia->descripcion=$request->descripcion;
        
        $materia->update();
        //Caso de adiccion de nuevos grupos teoricos
        if($request->gruposTeorico > $cantidadGT)
        {
            for ($cantidadGT; $cantidadGT < $request->gruposTeorico ; $cantidadGT++) { 
                //crea los adiccionales
                Grupo::create([
                    'nombre'=>'GT-'.($cantidadGT+1),
                    'tipo'=>'GT',
                    'materia_id'=>$materia->id,
                ]);
                
            }
        }
        //caso de eliminacion
        elseif($request->gruposTeorico < $cantidadGT)
        {
            for ($cantidadGT; $cantidadGT > $request->gruposTeorico; $cantidadGT--) { 
                //encuentra el objeto que toma el id propio, y el numero de grupo de manera recursiva
                $borrado=Grupo::where('nombre','GT-'.$cantidadGT)
                ->where('materia_id',$materia->id)->first();
                //elimina
                $borrado->delete();
            }        
        }
        /**
         * Misma logica que el caso de grupos teoricos
         * posible refactorizacion aqui
         */
        if($request->gruposLaboratorio > $cantidadGL)
        {
            for ($cantidadGL; $cantidadGL < $request->gruposLaboratorio ; $cantidadGL++) { 

                Grupo::create([
                    'nombre'=>'GL-'.($cantidadGL+1),
                    'tipo'=>'GL',
                    'materia_id'=>$materia->id,
                ]);
                
            }
        }
        elseif($request->gruposLaboratorio < $cantidadGL)
        {
            for ($cantidadGL; $cantidadGL > $request->gruposLaboratorio; $cantidadGL--) { 

                $borrado=Grupo::where('nombre','GL-'.$cantidadGL)
                ->where('materia_id',$materia->id)->first();
                $borrado->delete();
            }
        }
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
