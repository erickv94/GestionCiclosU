        <h3 class="tile-title">Registrar datos de docente</h3>
        <div class="tile-body">
          <form class="form-horizontal" id="crear">
            <div class="form-group row">
              <label class="control-label col-md-3">Nombre</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="name" placeholder="Ingresar nombre completo">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" type="email" name='email' placeholder="Ingresar email">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Nivel Academico</label>
              <div class="col-md-8">
                    <input class="form-control col-md-8" type='text' name="gradoAcademico" placeholder="Ingresar titulo academico">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Sexo</label>
              <div class="col-md-9">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sexo">Masculino
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="sexo">Femenino
                  </label>
                </div>
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
    