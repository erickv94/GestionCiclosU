        <h3 class="tile-title">Registrar datos de docente</h3>
        <div class="tile-body">
        <form class="form-horizontal" id="crear" action="{{route('docentes.store')}}" method="POST">
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
              <label class="control-label col-md-3">Nivel Academico</label>
              <div class="col-md-8">
                    <input class="form-control col-md-8 {{$errors->has('gradoAcademico')?'is-invalid':''}}" type='text' name="gradoAcademico" placeholder="Ingresar titulo academico (opcional)" value="{{ old('gradoAcademico')}}">
                    {!! validacion($errors,'gradoAcademico') !!}
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

            <div class="form-group row">
                <label  class='control-label col-md-3' for="exampleSelect1">Materias impartidas</label>
                <div class="col-md-8">
                <select class="form-control col-md-8" id="select" multiple name='materias[]'>
                    <option></option>
                    @foreach ($materias as $materia)
                    <option value="{{$materia->id}}" 
                    {{
                      (collect(old('materias'))->contains($materia->id)) ? 'selected':'' 
                    }}
                    >
                      {{$materia->codigo.' - '.$materia->nombre}}
                    </option>
                    @endforeach                  
                </select>
                </div>
                {!!validacion($errors,'materias')!!}
              </div>
              <div class="form-group row">
                <label  class='control-label col-md-3' for="exampleSelect1">Materia coordinación</label>
                <div class="col-md-8">
                <select class="form-control col-md-8"  id="select2"  name='materia'>
                    <option></option>
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
                {!!validacion($errors,'materia')!!}
              </div>

              </div>


          </form>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-success" type="button"  onclick="document.getElementById('crear').submit()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;
                <button type='button' class="btn btn-secondary" onclick="document.getElementById('crear').reset()"><i class="fa fa-fw fa-lg fa-paint-brush"></i>Limpiar</button>
                
                @if(session()->has('activate'))
                <button type='submit' form='crear' class="btn btn-warning" name='delegar' value='1'><i class="fa fa-fw fa-lg fa-user-plus"></i>Delegar Coordinación</button>
                @endif
            </div>
          </div>
        </div>
    