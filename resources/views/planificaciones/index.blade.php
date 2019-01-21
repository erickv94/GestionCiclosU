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
              <form class="row" method="GET" action="{{route('planificaciones.index')}}">
                          <div class="form-group col-sm-3">
                <input class="form-control" type="text" placeholder="Buscar por nombre" name='nombre'>
              </div>
              <div class="form-group col-sm-3">
                <input class="form-control" type="text" placeholder="Buscar por codigo" name="codigo">
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
          <th> Terminado </th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($planificaciones as $planificacion)
          <tr>
          <td>{{$planificacion->ciclo}}</td>
          <td>{{$planificacion->fechaInicio}}</td>
          <td>{{$planificacion->Fechafin}}</td>
          <td></td>
          <td>
          <a href="{{route('planificaciones.show',$planificacion->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar</a>
          <a href="{{route('planificaciones.edit',$planificacion->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
       
          <form id="delete-{{$planificacion->id}}" class='accion-form' action="{{ route('planificaciones.destroy', $planificacion->id)}}" method="post">
              @csrf
              @method('DELETE')
          <button class="btn btn-outline-danger btn-sm" type="button" onclick="confirmar('{{$planificacion->fechaInicio}}-{{$planificacion->fechaFin}}',{{$planificacion->id}})"><i class="fa fa-trash" aria-hidden="true"></i>  Eliminar</button>
            </form>

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
@endsection

@section('js.current')
<script type="text/javascript">

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
</script>
@endsection