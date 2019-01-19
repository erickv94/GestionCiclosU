@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Gestión docentes
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('docentes.index')}}">Listado Docentes</a></li>
<li class="breadcrumb-item"><a href="{{route('docentes.edit',$docente->id)}}">Editar Docente</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Actualizar docente</h1>
<p>Actualización de docente en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('docentes.partials.edit')
</div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection