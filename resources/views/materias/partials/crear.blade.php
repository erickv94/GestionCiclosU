<h3 class="tile-title">Registrar datos de materia</h3>
<div class="tile-body">
<form class="form-horizontal" id="crear" action="{{route('materias.store')}}" method="POST">
    <div class="form-group row">
      @csrf
      <label class="control-label col-md-3">Nombre</label>
      <div class="col-md-8">
        <input class="form-control col-md-8 {{$errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" placeholder="Ingresar nombre de materia" value="{{ old('nombre') }}">
        {!! validacion($errors,'nombre') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Codigo</label>
      <div class="col-md-8">
        <input class="form-control col-md-8 {{$errors->has('codigo')?'is-invalid':''}}" type="email" name='codigo' placeholder="Ingresar codigo del Materia" value="{{ old('codigo')}}">
        {!! validacion($errors,'codigo') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Descripción</label>
      <div class="col-md-8">
            <textarea rows="5" class="form-control col-md-8 {{$errors->has('descripcion')?'is-invalid':''}}" type='text' name="descripcion" placeholder="Ingresar descripción (opcional)" value="{{old('descripcion')}}">
            </textarea>
              {!! validacion($errors,'descripcion') !!}
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
