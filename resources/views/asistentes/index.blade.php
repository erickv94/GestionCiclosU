  @extends('layouts.dashboard')

  @section('titulo')
  Planificación de ciclos | Inicio
  @endsection

  @section('css.current')
  <style>
  .accion-form {
  display:inline;
  }
  </style>
  @endsection


  @section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('asistentes.index')}}">Listado asistentes</a></li>
  @endsection

  @section('info')
  <h1><i class="fa fa-users"></i> Gestión de asistentes</h1>
  <p> Sección para la gestión de asistentes de la Facultad de Química y Farmacia UES </p>
  @endsection

  @section('contenido')
  <div class="tile">
          <div class="tile-title-w-btn">

                <div class="btn-group">
                    <a class="btn btn-primary" href="{{route('asistentes.create')}}"><i class="fa fa-lg fa-plus"></i> Crear</a>
                </div>
                </div>    
                <form class="row" method="GET" action="{{route('asistentes.index')}}">
                            <div class="form-group col-sm-3">
                  <input class="form-control" type="text" placeholder="Buscar por nombre" name='name'>
                </div>
                <div class="form-group col-sm-3">
                  <input class="form-control" type="text" placeholder="Buscar por email" name="email">
                </div>

                <div class="form-group col-sm-3 ">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar</button>
                        <a href="{{route('asistentes.index')}}" class="btn btn-primary" ><i class="fa fa-list"></i> Todos</a>
                        
                    </div>
              </form>
     <div class="table-responsive">
      <table class="table" style="text-align: center"> 
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($asistentes as $asistente)
            <tr>
            <td>{{$asistente->name}}</td>
            <td>{{$asistente->email}}</td>
            <td>
            @can('asistentes.show')
              <a href="{{route('asistentes.show',$asistente->id)}}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar</a>
            @endcan
            @can('asistentes.edit')
              <a href="{{route('asistentes.edit',$asistente->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
            @endcan
            @can('asistentes.inhabilitar')
              <form class='accion-form' action="{{route('asistentes.inhabilitar',$asistente->id)}}" method="POST">
              @csrf
              @method('patch')
              @if ($asistente->habilitado)
                <button type="submit" class="btn btn-outline-warning btn-sm"><i class="fa fa-lock" aria-hidden="true"></i> Inhabilitar</button>  
              @else
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-unlock" aria-hidden="true"></i> Habilitar</button>  
                
              @endif
              </form>
            @endcan
            
            @can('asistentes.delete')
              <form id="delete-{{$asistente->id}}" class='accion-form' action="{{ route('asistentes.destroy', $asistente->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm" type="button" onclick="confirmar('{{$asistente->name}}',{{$asistente->id}})"><i class="fa fa-trash" aria-hidden="true"></i>  Eliminar</button>
              </form>
            @endcan
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>
      {!! $asistentes->links() !!}
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
      title: "Estas seguro de eliminar "+nombre+"?",
      text: "Una vez borrado no podras recuperar el registro",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No, cancelar",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        swal("Borrado!", "Asistente ha sido borrado con exito.", "success");
        document.getElementById('delete-'+id).submit();
      } else {
        swal("Cancelado!", "No se ha elimando nada:)", "error");
      }
    });
  }
</script>
@endsection