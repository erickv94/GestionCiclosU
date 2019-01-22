@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Gestión Planificaciones de ciclo
@endsection

@section('css.current')
<style>
.accion-form {
display:inline;
}
</style>
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('planificaciones.index')}}">Listado planificaciones</a></li>
@endsection

@section('info')
<h1><i class="fa fa-folder"></i> Gestión de planificación</h1>
<p> Sección para la gestión de planificación de ciclos de la Facultad de Química y Farmacia UES </p>
@endsection

@section('contenido')
<div class="tile">
        <div class="tile-title-w-btn">

              <div class="btn-group">
                  <a class="btn btn-primary" href="{{route('planificaciones.create')}}"><i class="fa fa-lg fa-plus"></i> Crear</a>
              </div>
              </div>    
              <form class="row" method="GET" action="{{route('planificaciones.index')}}" autocomplete="off">
                <div class="form-group col-sm-3">
                    <input class="form-control cold-md-3" id="fechaInicio" type="text" name="fechaInicio" placeholder="Fecha en adelante"
                     value="{{request('fechaInicio')}}">
              </div>
              <div class="form-group col-sm-3">
                  <input class="form-control cold-md-3" id="fechaFin" type="text" name="fechaFin" placeholder="Hasta la fecha"
                   value="{{request('fechaFin')}}">
              </div>

              <div class="form-group col-sm-3 ">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
                      <a href="{{route('planificaciones.index')}}" class="btn btn-primary" ><i class="fa fa-list"></i> Todos</a>
                      
                  </div>
            </form>
   <div class="table-responsive">
    <table class="table" style="text-align: center"> 
      <thead>
        <tr>
          <th>Ciclo</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th> Estado </th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($planificaciones as $planificacion)
          <tr>
          <td>{{$planificacion->ciclo==1?'I':'II'}}</td>
          <td>{{$planificacion->fechaInicio}}</td>
          <td>{{$planificacion->fechaFin}}</td>
          @if($planificacion->estado==='activo')
          <td>{!!'<i class="fa fa-clock-o" aria-hidden="true"></i> En proceso'!!}</td>
          @else
          <td>{!!$planificacion->estado==='tiempo'?'<i class="fa fa-calendar-times-o" aria-hidden="true"></i> Tiempo Finalizado':'<i class="fa fa-check-circle-o" aria-hidden="true"></i> Terminado'!!}</td>
          @endif
          <td>
          <a href="{{route('planificaciones.show',$planificacion->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar</a>
          <a href="{{route('planificaciones.edit',$planificacion->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
          
          <form id="delete-{{$planificacion->id}}" autocomplete="off" class='accion-form' action="{{ route('planificaciones.destroy', $planificacion->id)}}" method="post">
              @csrf
              @method('DELETE')
          <button class="btn btn-outline-danger btn-sm" type="button" onclick="confirmar('{{$planificacion->fechaInicio}}-{{$planificacion->fechaFin}}',{{$planificacion->id}})"><i class="fa fa-trash" aria-hidden="true"></i>  Eliminar</button>
            </form>
            @if($planificacion->estado=='terminado')
          <form id="finalizar-{{$planificacion->id}}" autocomplete="off" class='accion-form' action="{{ route('planificaciones.finalizar', $planificacion->id)}}" method="post">
              @csrf
              @method('PUT')
            <button class="btn btn-outline-warning btn-sm" type="button" onclick="finalizar('{{$planificacion->fechaInicio}}-{{$planificacion->fechaFin}}',{{$planificacion->id}})"><i class="fa fa-calendar-times-o" aria-hidden="true"></i>  Finalizar</button>
            </form>
            @endif

          </td>
        </tr>
      @endforeach

      </tbody>
    </table>
    {!! $planificaciones->links() !!}
  </div>
</div>
@endsection

@section('js.plugins')
<script src="/js/plugins/sweetalert.min.js">
</script>
<script type="text/javascript" src="/js/plugins/bootstrap-datepicker.min.js"></script>

@endsection

@section('js.current')
<script type="text/javascript">



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


function confirmar(nombre,id){
    swal({
      title: "Estas seguro de eliminar planificación de "+nombre+" ?",
      text: "Una vez borrado no podras recuperar el registro",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No, cancelar",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        swal("Borrado!", "Planificación ha sido borrada con exito.", "success");
        document.getElementById('delete-'+id).submit();
      } else {
        swal("Cancelado!", "No se ha elimando nada:)", "error");
      }
    });
  }


  function finalizar(nombre,id){
    swal({
      title: "Esta seguro de finalizar la planificación de fecha: "+nombre+" ?",
      text: "Una vez finalizado no podra aumentar el tiempo",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No, cancelar",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        swal("Hecho!", "Planificación ha sido marcada con estado terminado.", "success");
        document.getElementById('finalizar-'+id).submit();
      } else {
        swal("Cancelado!", "No se ha hecho nada :)", "error");
      }
    });
  }
</script>
@endsection