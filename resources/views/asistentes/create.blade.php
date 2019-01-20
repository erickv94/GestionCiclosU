@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('asistentes.index')}}">Listado asistentes</a></li>
<li class="breadcrumb-item"><a href="{{route('asistentes.create')}}">Registrar asistente</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Registrar asistente</h1>
<p>Registro de asistente en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('asistentes.partials.crear')
</div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')
@endsection