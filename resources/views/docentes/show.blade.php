@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('docentes.index')}}">Listado docentes</a></li>
<li class="breadcrumb-item"><a href="{{route('docentes.show',$docente->id)}}">Mostrar docente</a></li>
@endsection

@section('info')
<h1><i class="fa fa-eye"></i> Mostrar detalles de docente </h1>
<p>Muestra los detalles del usuario docente</p>
@endsection

@section('contenido')
<div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
            <h2 class="mb-3 line-head" id="typography">{{$docente->user->name}}</h2>
            </div>
          </div>
        </div>
        <!-- Headings-->
        <div class="row">
          <div class="col-lg-6">
          
            <h3>Email</h3>
            <p class="lead">{{$docente->user->email}}</p>
            <h3>Sexo</h3>
            <p class="lead">{{$docente->user->sexo}}</p>
            <h3>Grado Academico</h3>
            <p class="lead">{{$docente->gradoAcademico}}</p>
            <h3>Cordinador</h3>
            <p class="lead">{!!$docente->esCoordinador?"<i class='fa fa-check text-success' aria-hidden='true'></i> Si":"<i class='fa fa-close text-danger' aria-hidden='true'></i> No"!!}</p>

            
          </div>
          <div class="col-lg-6">
              <h3>Fecha de registro</h3>
              <p class="lead">{{$docente->user->created_at}}</p>
              <h3>Ultimo login</h3>
              <p class="lead">{{$docente->user->lastLogin??'Nunca se ha logeado'}}</p>
              <h3>Cuenta verificada</h3>
              <p class="lead">{!!$docente->user->esVerificado?"<i class='fa fa-check text-success' aria-hidden='true'></i> Si":"<i class='fa fa-close text-danger' aria-hidden='true'></i> No"!!}</p>
            @if ($docente->user->esVerificado)
              <h3>Fecha de verificación de cuenta</h3>
              <p class="lead">{{$docente->user->password_creado_en??'No se ha verificado'}}</p>
                
           @endif

          </div>

        </div>

        <div class="tile mb-4">
          <div class="row">
            <div class="col-lg-12">
              <div class="page-header">
              <h2 class="mb-3 line-head" id="typography">Materias</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">

            @foreach ($docente->materias as $materia)
              <h3>Materia</h3>  
              <p class="lead">{{$materia->codigo}} - {{$materia->nombre}} - 
                  <i class="fa fa-book text-success" aria-hidden="true"></i> 
     
              @switch($materia->nivel)
                  @case(1)
                      Primer año
                      @break
                  @case(2)
                      Segundo año
                      @break
                  @case(3)
                      Tercer año
                      @break
                  @case(4)
                      Cuarto año  
                      @break        
                  @case(5)
                      Quinto año 
                    @break
                  @endswitch
                  {!!$docente->materia->id==$materia->id?'- Coordinador <i class="fa fa-check-circle" aria-hidden="true"></i>':''!!}

              </p>     
            @endforeach

              
            </div>
          </div>
        </div>

    @endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection