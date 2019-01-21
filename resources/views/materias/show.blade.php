@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('materias.index')}}">Listado materias</a></li>
<li class="breadcrumb-item"><a href="{{route('materias.show',$materia->id)}}">Mostrar materia</a></li>
@endsection

@section('info')
<h1><i class="fa fa-eye"></i> Mostrar detalles de materia</h1>
<p>Muestra los detalles de materia</p>
@endsection

@section('contenido')
<div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
            <h2 class="mb-3 line-head" id="typography">{{$materia->nombre}}</h2>
            </div>
          </div>
        </div>
        <!-- Headings-->
        <div class="row">
          <div class="col-lg-6">
          
            <h3>Codigo</h3>
            <p class="lead">{!!$materia->codigo??"<i class='fa fa-info text-info' aria-hidden='true'></i> No se ha definido"!!}</p>
            <h3>Materia Habilitada</h3>
            <p class="lead">{!!$materia->habilitado?"<i class='fa fa-check text-success' aria-hidden='true'></i> Si":"<i class='fa fa-close text-danger' aria-hidden='true'></i> No"!!}</p>
                    
          </div>
          <div class="col-lg-6">
              <h3>Fecha de registro</h3>
              <p class="lead">{{$materia->created_at}}</p>
              <h3>Fecha de actualización</h3>
              <p class="lead">{{$materia->updated_at??'No se ha actualizado'}}</p>

          </div>

        </div>
      </div>




      <div class="tile mb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="page-header">
              <h2 class="mb-3 line-head" id="typography">Grupos Teoricos y Grupos Laboratorio</h2>
              </div>
            </div>
          </div>
          <!-- Headings-->
          <div class="row">
            <div class="col-lg-6">
              <h3>Grupos Teoricos <i class="fa fa-check-circle" aria-hidden="true"></i></h3>
            @foreach ($gruposTeorico as $gt)
            <p class="lead">{{$gt->nombre}}</p>                
            @endforeach

            </div>
            <div class="col-lg-6">
                <h3>Grupos Laboratorio <i class="fa fa-check-circle" aria-hidden="true"></i></h3>
              @foreach ($gruposLaboratorio as $gl)
               <p class="lead">{{$gl->nombre}}</p>
           
              @endforeach
            </div>
  
          </div>
        </div>
  
      @endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection