<h3 class="tile-title">Actualizar datos de docente</h3>
<div class="tile-body">
<form class="form-horizontal" id="crear" action="{{route('docentes.update',$docente->id)}}" method="POST">
    <div class="form-group row">
      
      @csrf
      @method('PUT')
      <label class="control-label col-md-3">Nombre</label>
      <div class="col-md-8">
        <input class="form-control {{$errors->has('name')?'is-invalid':''}}" type="text" name="name" placeholder="Ingresar nombre completo" value="{{ old('name')??$docente->user->name }}">
        {!! validacion($errors,'name') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Email</label>
      <div class="col-md-8">
        <input class="form-control col-md-8 {{$errors->has('email')?'is-invalid':''}}" type="email" name='email' placeholder="Ingresar email" value="{{ old('email')??$docente->user->email}}">
        {!! validacion($errors,'email') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Nivel Academico</label>
      <div class="col-md-8">
            <input class="form-control col-md-8 {{$errors->has('gradoAcademico')?'is-invalid':''}}" type='text' name="gradoAcademico" placeholder="Ingresar titulo academico" value="{{ old('gradoAcademico')??$docente->gradoAcademico}}">
            {!! validacion($errors,'gradoAcademico') !!}
        </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-md-3">Sexo</label>
      <div class="col-md-9">
        @if (old('sexo'))
        <div class="form-check">
            <label class="form-radio-label">
              <input class="form-check-input" type="radio" name="sexo" value='Masculino' {{old('sexo')=='Masculino'?'checked':''}}> Masculino
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="sexo" value="Femenino" {{old('sexo')=='Femenino'?'checked':''}}>Femenino
            </label>
          </div>               
        @else
        <div class="form-check">
            <label class="form-radio-label">
              <input class="form-check-input" type="radio" name="sexo" value='Masculino' {{$docente->user->sexo=='Masculino'?'checked':''}}> Masculino
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="sexo" value="Femenino" {{$docente->user->sexo=='Femenino'?'checked':''}}>Femenino
            </label>
          </div>            
        @endif

        {!! validacion($errors,'sexo') !!}
      </div>
    </div>
    <div class="form-group row">
        <label  class='control-label col-md-3' for="exampleSelect1">Materias impartidas</label>
        <div class="col-md-8">
        <select class="form-control col-md-10" id="select" multiple name='materias[]'>
            <option></option>

            @foreach ($materias as $materia)
                <option 
                value="{{$materia->id}}"
                {{$docente->materias->pluck('id')->contains($materia->id)?'selected':''}}
                >
                    {{$materia->codigo.' - '.$materia->nombre}}</option>
            @endforeach 
           
        </select>
        </div>
        {!!validacion($errors,'materias')!!}
      </div>

  </form>
</div>
<div class="tile-footer">
  <div class="row">
    <div class="col-md-8 col-md-offset-3">
        <button class="btn btn-success" type="button"  onclick="document.getElementById('crear').submit()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>&nbsp;&nbsp;&nbsp;
        <button type='button' class="btn btn-secondary" onclick="document.getElementById('crear').reset()"><i class="fa fa-fw fa-lg fa-paint-brush"></i>Limpiar</a>
    </div>
  </div>
</div>
