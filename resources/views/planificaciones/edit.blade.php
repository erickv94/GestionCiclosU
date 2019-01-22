@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('planificaciones.index')}}">Listado planificaciones</a></li>
<li class="breadcrumb-item"><a href="{{route('planificaciones.edit',$planificacion->id)}}">Editar Planificación</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Editar Planificación</h1>
<p>Actualizacion de Planificación en el sistema</p>
@endsection

@section('contenido')
<div class="tile">
    @include('planificaciones.partials.edit')
</div>
@endsection

@section('js.plugins')
<script type="text/javascript" src="/js/plugins/bootstrap-datepicker.min.js"></script>
@endsection

@section('js.current')
<script>



$('#fechaInicio').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
});

$('#fechaFin').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
});

</script>

@endsection