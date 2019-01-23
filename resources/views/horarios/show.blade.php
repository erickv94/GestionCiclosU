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
<h1><i class="fa fa-dashboard"></i> Horario </h1>
<p>Horario </p>
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
                         onclick="prueba('{{$dia['codigo']}}','{{$hora['codigo']}}')"
                        
                        data-toggle="modal" data-target="#exampleModal"
                        ></td>
                          
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
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js.plugins')
<script>
function prueba(dia,codigo){
}
</script>
@endsection

@section('js.current')


@endsection