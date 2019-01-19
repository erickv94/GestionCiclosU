@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('materias.index')}}">Listado Materias</a></li>
<li class="breadcrumb-item"><a href="{{route('materias.edit',$materia->id)}}">EditaMateria</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Editar materia</h1>
<p>Actualizacion de materia en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('materias.partials.edit')
</div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection