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
<h1><i class="fa fa-users"></i>Docentes registrados</h1>
<p>Docentes que han sido registrados en el sistema</p>
@endsection

@section('contenido')

@endsection

@section('js.plugins')
@endsection

@section('js.current')
@endsection