<h3 class="tile-title">Actualizar datos de docente</h3>
<div class="tile-body">
<form class="form-horizontal" id="crear" action="{{route('asistentes.update',$asistente->id)}}" method="POST">
    <div class="form-group row">
      
      @csrf
      @method('PUT')
      <label class="control-label col-md-3">Nombre</label>
      <div class="col-md-8">
        <input class="form-control {{$errors->has('name')?'is-invalid':''}}" type="text" name="name" placeholder="Ingresar nombre completo" value="{{ old('name')??$asistente->name }}">
        {!! validacion($errors,'name') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Email</label>
      <div class="col-md-8">
        <input class="form-control col-md-8 {{$errors->has('email')?'is-invalid':''}}" type="email" name='email' placeholder="Ingresar email" value="{{ old('email')??$asistente->email}}">
        {!! validacion($errors,'email') !!}
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
              <input class="form-check-input" type="radio" name="sexo" value='Masculino' {{$asistente->sexo=='Masculino'?'checked':''}}> Masculino
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="sexo" value="Femenino" {{$asistente->sexo=='Femenino'?'checked':''}}>Femenino
            </label>
          </div>            
        @endif

        {!! validacion($errors,'sexo') !!}
      </div>
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
