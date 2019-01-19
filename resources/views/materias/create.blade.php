@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('locales.index')}}">Listado Locales</a></li>
<li class="breadcrumb-item"><a href="{{route('locales.create')}}">Registrar Local</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Registrar Local</h1>
<p>Registro de local en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('locales.partials.crear')
</div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection