@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('planificaciones.index')}}">Listado Planificaciones</a></li>
<li class="breadcrumb-item"><a href="{{route('planificaciones.create')}}">Registrar Planificación</a></li>

@endsection

@section('info')
<h1><i class="fa fa-plus"></i> Registrar Planificación</h1>
<p>Crear planificación en el sistema creera los horarios vacios por año academico </p>
@endsection

@section('contenido')
<div class="tile">
    @include('planificaciones.partials.crear')
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