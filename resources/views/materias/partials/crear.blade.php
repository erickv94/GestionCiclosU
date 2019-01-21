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
        <label class="control-label col-md-3">Cantidad grupos teoricos</label>
        <div class="col-md-8">
            <input class="form-control col-md-8 " type="number" min="1" max="10" name="gruposTeorico"  value="{{old('gruposTeorico')}}">    
        </div>
      </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Cantidad grupos de laboratorio</label>
        <div class="col-md-8">
        <input class="form-control col-md-8 " type="number" min="1" max="10" name="gruposLaboratorio"  value="{{old('gruposLaboratorio')}}">
               
        </div>
      </div>

    <div class="form-group row">
      <label class="control-label col-md-3">Descripción</label>
      <div class="col-md-8">
            <textarea rows="5" class="form-control col-md-8 {{$errors->has('descripcion')?'is-invalid':''}}" type='text' name="descripcion" placeholder="Ingresar descripción (opcional)" value="{{old('descripcion')}}"></textarea>
           
              {!! validacion($errors,'descripcion') !!}
        </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-md-3">Ciclo</label>
      <div class="col-md-8">
        <select class="form-control col-md-6 {{$errors->has('ciclo')?'is-invalid':''}}" id="select" name='ciclo'>
          <option value >Seleccionar ciclo academico</option>
          <option value="Ambos" {{old('ciclo')?'selected':''}}>Ambos</option>
          <option value="Impar" {{old('ciclo')?'selected':''}}>Impar</option>
          <option value="Par" {{old('ciclo')?'selected':''}}>Par</option>
        </select>
        {!! validacion($errors,'ciclo') !!}
      </div>
    </div>
    <div class="form-group row">
        <label class="control-label col-md-3">Seleccionar nivel academico</label>
        <div class="col-md-8">
          <select class="form-control col-md-6 {{$errors->has('nivel')?'is-invalid':''}}" id="select" name='nivel'>
            <option value >Seleccionar nivel academico</option>
            <option value="1" {{old('nivel')==1?'selected':''}} >Primer año</option>
            <option value="2" {{old('nivel')==2?'selected':''}}>Segundo año</option>
            <option value="3" {{old('nivel')==3?'selected':''}}>Tercer año</option>
            <option value="4" {{old('nivel')==4?'selected':''}}>Cuarto año</option>
            <option value="5" {{old('nivel')==5?'selected':''}}>Quinto año</option>
          </select>
          {!! validacion($errors,'nivel') !!}
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
