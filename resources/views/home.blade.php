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
<h1><i class="fa fa-dashboard"></i> Panel general</h1>
<p>Panel general de usuario</p>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
          <h4>Docentes</h4>
          <p><b></b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
        <div class="info">
          <h4>Asistentes</h4>
          <p><b>25</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><i class="icon fa fa-book fa-3x"></i>
        <div class="info">
          <h4>Materias</h4>
          <p><b>10</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><i class="icon fa fa-star fa-3x"></i>
        <div class="info">
          <h4>Stars</h4>
          <p><b>500</b></p>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js.plugins')
@endsection

@section('js.current')
@endsection