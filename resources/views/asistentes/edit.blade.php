@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Gestión asistentes
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('asistentes.index')}}">Listado asistentes</a></li>
<li class="breadcrumb-item"><a href="{{route('asistentes.edit',$asistente->id)}}">Editar Asistente</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Actualizar asistente</h1>
<p>Actualización de asistente en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('asistentes.partials.edit')
</div>
@endsection

@section('js.plugins')

@endsection

@section('js.current')

@endsection