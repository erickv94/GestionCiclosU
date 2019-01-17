@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('docentes.index')}}">Listado docentes</a></li>
<li class="breadcrumb-item"><a href="{{route('docentes.show',$docente->id)}}">Mostrar docente</a></li>
@endsection

@section('info')
<h1><i class="fa fa-eye"></i> Mostrar detalles de docente </h1>
<p>Muestra los detalles del usuario docente</p>
@endsection

@section('contenido')
<div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
            <h2 class="mb-3 line-head" id="typography">{{$docente->user->name}}</h2>
            </div>
          </div>
        </div>
        <!-- Headings-->
        <div class="row">
          <div class="col-lg-6">
          
            <h3>Email</h3>
            <p class="lead">{{$docente->user->email}}</p>
            <h3>Sexo</h3>
            <p class="lead">{{$docente->user->sexo}}</p>
            <h3>Fecha de creacion</h3>
            <p class="lead">{{$docente->user->created_at}}</p>
            
          </div>
          <div class="col-lg-6">
            <div class="bs-component">
              <h2>Example body text</h2>
              <p>Nullam quis risus eget <a href="#">urna mollis ornare</a> vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
              <p><small>This line of text is meant to be treated as fine print.</small></p>
              <p>The following is <strong>rendered as bold text</strong>.</p>
              <p>The following is <em>rendered as italicized text</em>.</p>
              <p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>
            </div>
          </div>

        </div>
    @endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection