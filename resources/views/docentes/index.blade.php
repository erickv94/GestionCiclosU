@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('docentes.index')}}">Listado docentes</a></li>
@endsection

@section('info')
<h1><i class="fa fa-users"></i> Gestión de docentes</h1>
<p> Sección para la gestión de materias de la Facultad de Química y Farmacia UES </p>
@endsection

@section('contenido')
<div class="tile">
                <div class="tile-title-w-btn">

                        <div class="btn-group">
                        <a class="btn btn-primary" href="{{route('docentes.create')}}"><i class="fa fa-lg fa-plus"></i></a>
                            <a class="btn btn-primary" href="#"><i class="fa fa-lg fa-file"></i></a>
                        </div>
                </div>    
                <form class="row" method="GET" action="{{route('docentes.index')}}">
                            <div class="form-group col-sm-3">
                  <input class="form-control" type="text" placeholder="Buscar por nombre" name='name'>
                </div>
                <div class="form-group col-sm-3">
                  <input class="form-control" type="text" placeholder="Buscar por email" name="email">
                </div>
                <div class="form-group col-sm-3">
                        <label >
                          <input class="form-control" type="checkbox" name='coordinador'>Coordinadores
                        </label>
                </div>
                <div class="form-group col-sm-3 ">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
                        <a href="{{route('docentes.index')}}" class="btn btn-primary" ><i class="fa fa-list"></i> Todos</a>
                        
                    </div>
              </form>
     <div class="table-responsive">
      <table class="table" style="text-align: center"> 
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>coordinador</th>
            <th>acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($docentes as $docente)
            <tr>
            <td>{{$docente->user->name}}</td>
            <td>{{$docente->user->email}}</td>
            <td>{!!($docente->esCoordinador) ?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-close" aria-hidden="true"></i>' !!}</td>
            <td>
            <a href="{{route('docentes.show',$docente->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar</a>
                <a href="" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                <a href="" class="btn btn-outline-warning btn-sm"><i class="fa fa-lock" aria-hidden="true"></i> Inhabilitar</a>

            </td>
          </tr>
        @endforeach

        </tbody>
      </table>
      {!! $docentes->links() !!}
    </div>
  </div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')
@endsection