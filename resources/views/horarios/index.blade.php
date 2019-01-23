@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">Panel general</a></li>
@endsection

@section('info')
<h1><i class="fa fa-dashboard"></i> Horarios de planificación - {{$planificacion->fechaInicio}} a {{$planificacion->fechaFin}}</h1>
<p>Horarios de planificación </p>
@endsection

@section('contenido')
<div class="row">
    @foreach ($planificacion->horarios as $horario)
    <div class="col-md-4">
        <div class="tile">
          <div class="tile-title-w-btn">
          <h3 class="title">{{$horario->referido}}</h3>
            <div class="btn-group">
            <a class="btn btn-primary" href="{{route('horarios.edit',[$horario->id,$planificacion->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                <a class="btn btn-primary" href="{{route('horarios.show',[$horario->id,$planificacion->id])}}"><i class="fa fa-lg fa-eye"></i></a>
            </div>
          </div>
          <div class="tile-body">
            {{$horario->descripcion}}
        </div>
        </div>
      </div>
      @endforeach

</div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection