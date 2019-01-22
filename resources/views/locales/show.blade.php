@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('locales.index')}}">Listado locales</a></li>
<li class="breadcrumb-item"><a href="{{route('locales.show',$local->id)}}">Mostrar local</a></li>
@endsection

@section('info')
<h1><i class="fa fa-eye"></i> Mostrar detalles de local</h1>
<p>Muestra los detalles de local</p>
@endsection

@section('contenido')
<div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
            <h2 class="mb-3 line-head" id="typography">{{$local->nombre}}</h2>
            </div>
          </div>
        </div>
        <!-- Headings-->
        <div class="row">
          <div class="col-lg-6">
          
            <h3>Codigo</h3>
            <p class="lead">{!!$local->codigo??"<i class='fa fa-info text-info' aria-hidden='true'></i> No se ha definido"!!}</p>
            <h3>Tipo</h3>
            <p class="lead">{!!$local->tipo??"<i class='fa fa-info text-info' aria-hidden='true'></i> No se ha definido"!!}</p>
            <h3>Local Habilitado</h3>
            <p class="lead">{!!$local->habilitado?"<i class='fa fa-check text-success' aria-hidden='true'></i> Si":"<i class='fa fa-close text-danger' aria-hidden='true'></i> No"!!}</p>
                    
          </div>
          <div class="col-lg-6">
              <h3>Fecha de registro</h3>
              <p class="lead">{{$local->created_at}}</p>
              <h3>Fecha de actualización</h3>
              <p class="lead">{{$local->updated_at??'No se ha actualizado'}}</p>

          </div>

        </div>
    @endsection

@section('js.plugins')
@endsection

@section('js.current')


@endsection