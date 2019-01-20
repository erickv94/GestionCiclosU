        <h3 class="tile-title">Registrar datos de asistente</h3>
        <div class="tile-body">
        <form class="form-horizontal" id="crear" action="{{route('asistentes.store')}}" method="POST">
            <div class="form-group row">
              @csrf
              <label class="control-label col-md-3">Nombre</label>
              <div class="col-md-8">
                <input class="form-control {{$errors->has('name')?'is-invalid':''}}" type="text" name="name" placeholder="Ingresar nombre completo" value="{{ old('name') }}">
                {!! validacion($errors,'name') !!}
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-8">
                <input class="form-control col-md-8 {{$errors->has('email')?'is-invalid':''}}" type="email" name='email' placeholder="Ingresar email" value="{{ old('email')}}">
                {!! validacion($errors,'email') !!}
              </div>
            </div>


            <div class="form-group row">
              <label class="control-label col-md-3">Sexo</label>
              <div class="col-md-9">
                <div class="form-check">
                  <label class="form-radio-label">
                    <input class="form-check-input" type="radio" name="sexo" {{old('sexo')==='Masculino'?'checked':''}} value='Masculino'> Masculino
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sexo" {{old('sexo')=='Femenino'?'checked':''}}  value="Femenino">Femenino
                  </label>
                </div>
                {!! validacion($errors,'sexo') !!}
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
    