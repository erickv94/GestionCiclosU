@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('planificaciones.index')}}">Listado planificaciones</a></li>
<li class="breadcrumb-item"><a href="{{route('planificaciones.show',$planificacion->id)}}">Mostrar planificación</a></li>
@endsection

@section('info')
<h1><i class="fa fa-eye"></i> Mostrar detalles de planificación</h1>
<p>Muestra los detalles de planificación</p>
@endsection

@section('contenido')
<div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
            <h2 class="mb-3 line-head" id="typography">Planificación datos</h2>
            </div>
          </div>
        </div>
        <!-- Headings-->
        <div class="row">
          <div class="col-lg-6">
          
            <h3>Fecha de inicio</h3>
            <p class="lead">
              {{$planificacion->fechaInicio}} <i class="fa fa-calendar" aria-hidden="true"></i></p>
            <h3>Fecha de fin</h3>
            <p class='lead'>
              {{$planificacion->fechaInicio}} <i class="fa fa-calendar" aria-hidden="true"></i></p>            
            <h3>Ciclo</h3>
            <p class="lead">
              {{$planificacion->ciclo}}
            </p>
                    
          </div>
          <div class="col-lg-6">
              <h3>Fecha de registro</h3>
              <p class="lead">{{$planificacion->created_at}}</p>
              <h3>Fecha de actualización</h3>
              <p class="lead">{{$planificacion->updated_at??'No se ha actualizado'}}</p>
              <h3>Estado</h3>
              @if($planificacion->estado==='activo')
              <p class='lead'>{!!'<i class="fa fa-clock-o" aria-hidden="true"></i> En proceso'!!}</p>
              @else
              <p class='lead'>{!!$planificacion->estado==='tiempo'?'<i class="fa fa-calendar-times-o" aria-hidden="true"></i> Tiempo Finalizado':'<i class="fa fa-check-circle-o" aria-hidden="true"></i> Terminado'!!}</p>
              @endif
            </div>

        </div>
    @endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection