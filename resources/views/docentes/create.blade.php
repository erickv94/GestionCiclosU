@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('docentes.index')}}">Listado Docentes</a></li>
<li class="breadcrumb-item"><a href="{{route('docentes.create')}}">Registrar Docente</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Registrar docente</h1>
<p>Registro de docente en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('docentes.partials.crear');
</div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection