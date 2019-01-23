@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | Inicio
@endsection

@section('css.current')
td:hover{
    background-color:black;
}
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('home')}}">Panel general</a></li>
@endsection

@section('info')
<h1><i class="fa fa-dashboard"></i> Horario {{$horario->planificacion->ciclo==1?'ciclo I':'ciclo II'}} </h1>
<p>{{$horario->descripcion}}</p>
@endsection

@section('contenido')
            <div class="tile">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="text-align: center">
                      <thead>
                        <tr>
                          <th>Horas</th>
                          <th>Lunes</th>
                          <th>Martes</th>
                          <th>Miercoles</th>
                          <th>Jueves</th>
                          <th>Viernes</th>
                          <th>Sabado</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                    @foreach ($horas as $hora)
                            
                        <td>{{$hora['value']}}</td>

                            @foreach ($dias as $dia)

                                    <td id="{{$dia['codigo']}}-{{$hora['codigo']}}" 
                                    onclick="prueba('{{$dia['dia']}}',
                                    
                                    '{{$hora['value']}}')"
                                    
                                    data-toggle="modal" data-target="#exampleModal"
                                    >
                                    </td>
                            @endforeach

                        </tr>
                    @endforeach
                      </tbody>
                    </table>
                  </div>
                
    </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo"> </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('horarios.partials.edit')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js.plugins')
<script src="/js/plugins/select2.min.js">

</script>
@endsection

@section('js.current')
<script>

function prueba(dia,value){
    document.getElementById('titulo').innerHTML=dia+' - '+value;
}


$('#select').select2({
  placeholder: "Seleccionar materias",
});

$('#select2').select2({
placeholder: "Seleccionar materia a coordinar (opcional)",
width:'resolve'
});
</script>

@endsection