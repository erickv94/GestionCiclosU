<h3 class="tile-title">Actualizar datos de local</h3>
<div class="tile-body">
<form class="form-horizontal" id="crear" action="{{route('locales.update',$local->id)}}" method="POST">
    <div class="form-group row">
      @csrf
      @method('PUT')
      <label class="control-label col-md-3">Nombre</label>
      <div class="col-md-8">
        <input class="form-control col-md-8 {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" placeholder="Ingresar nombre del local" value="{{ old('nombre')??$local->nombre }}">
        {!! validacion($errors,'nombre') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Codigo</label>
      <div class="col-md-8">
        <input class="form-control col-md-8 {{$errors->has('codigo')?'is-invalid':''}}" type="email" name='codigo' placeholder="Ingresar codigo del local" value="{{ old('codigo')??$local->codigo}}">
        {!! validacion($errors,'codigo') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Tipo Local</label>
      <div class="col-md-8">
            <input class="form-control col-md-8 {{$errors->has('tipo')?'is-invalid':''}}" type='text' name="tipo" placeholder="Ingresar titulo academico" value="{{ old('tipo')??$local->tipo}}">
            {!! validacion($errors,'tipo') !!}
        </div>
    </div>



  </form>
</div>
<div class="tile-footer">
  <div class="row">
    <div class="col-md-8 col-md-offset-3">
        <button class="btn btn-success" type="button"  onclick="document.getElementById('crear').submit()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;
        <button type='button' class="btn btn-secondary" onclick="document.getElementById('crear').reset()"><i class="fa fa-fw fa-lg fa-paint-brush"></i>Limpiar</a>
    </div>
  </div>
</div>
