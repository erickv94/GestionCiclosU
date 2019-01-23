<form class="form" id="crear" action="{{route('horarios.store',[$horario->id,$horario->planificacion->id])}}" method="POST">       
  @csrf
  @method('PUT')
 


  <div class="form-group">
    <label for="name">
        Materia:</label>
    <select  class="form-control" name="materia" >

      <option>Seleccionar materia</option>
      @foreach ($materias as $materia)
      <option value="{{$materia->id}}" 
      {{
        old('materia')==$materia->id ? 'selected':'' 
      }}
      >
        {{$materia->codigo.' - '.$materia->nombre}}
      </option>
      @endforeach 
    </select>
</div>



<div class="form-group">
    <label for="email">
        GL:</label>
    <input type="email" class="form-control"
    id="email" name="email" required maxlength="50">
</div>



</form>
    