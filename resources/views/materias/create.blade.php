@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('materias.index')}}">Listado materias</a></li>
<li class="breadcrumb-item"><a href="{{route('materias.create')}}">Registrar materia</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Registrar Materia</h1>
<p>Registro de materia en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('materias.partials.crear')
</div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection