@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('asistentes.index')}}">Listado asistentes</a></li>
<li class="breadcrumb-item"><a href="{{route('asistentes.show',$asistente->id)}}">Mostrar asistente</a></li>
@endsection

@section('info')
<h1><i class="fa fa-eye"></i> Mostrar detalles de asistente </h1>
<p>Muestra los detalles del usuario asistente</p>
@endsection

@section('contenido')
<div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
            <h2 class="mb-3 line-head" id="typography">{{$asistente->name}}</h2>
            </div>
          </div>
        </div>
        <!-- Headings-->
        <div class="row">
          <div class="col-lg-6">
          
            <h3>Email</h3>
            <p class="lead">{{$asistente->email}}</p>
            <h3>Sexo</h3>
            <p class="lead">{{$asistente->sexo}}</p>
            <h3>Ultimo login</h3>
            <p class="lead">{{$asistente->lastLogin??'Nunca se ha logeado'}}</p>

            
          </div>
          <div class="col-lg-6">
              <h3>Fecha de registro</h3>
              <p class="lead">{{$asistente->created_at}}</p>

              <h3>Cuenta verificada</h3>
              <p class="lead">{!!$asistente->esVerificado?"<i class='fa fa-check text-success' aria-hidden='true'></i> Si":"<i class='fa fa-close text-danger' aria-hidden='true'></i> No"!!}</p>
            @if ($asistente->esVerificado)
              <h3>Fecha de verificación de cuenta</h3>
              <p class="lead">{{$asistente->password_creado_en??'No se ha verificado'}}</p>
                
           @endif

          </div>

        </div>
    @endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection