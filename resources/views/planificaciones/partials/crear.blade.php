<h3 class="tile-title">Seleccionar la configuración del horario</h3>
<div class="tile-body">
<form class="form-horizontal" id="crear" action="{{route('planificaciones.store')}}" method="POST" autocomplete="off">
    <div class="form-group row">
      @csrf
      <label class="control-label col-md-3">Fecha Inicio</label>
      <div class="col-md-4">
        <input class="form-control cold-md-3" id='fechaInicio' type="text" name='fechaInicio' placeholder="seleccionar fecha inicio" value={{old('fechaInicio')}}>
        {!! validacion($errors,'fechaInicio') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Fecha Fin</label>
      <div class="col-md-4">
        <input class="form-control cold-md-3"  type="text" id='fechaFin' name='fechaFin' placeholder="seleccionar fecha finalizacion" value={{old('fechaFin')}}>
         {!! validacion($errors,'fechaFin') !!}
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3">Ciclo</label>
      <div class="col-md-8">
        <select class="form-control col-md-6 " id="select" name="ciclo">
         
          <option >Seleccionar ciclo academico</option>
          <option value="1" {{old('ciclo')==1?'selected':''}}>Ciclo I</option>
          <option value="2" {{old('ciclo')==2?'selected':''}}>Ciclo II</option>              
         
        </select>
        {!! validacion($errors,'ciclo') !!}
      </div>
    </div>

    <div class="form-group row">
      <label class="control-label col-md-3">Descripción</label>
      <div class="col-md-8">
            <textarea rows="5" class="form-control col-md-8 " type="text" name="descripcion" placeholder="Ingresar descripción (opcional)" value=""></textarea>
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
