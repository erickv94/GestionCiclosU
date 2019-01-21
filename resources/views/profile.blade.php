@extends('layouts.dashboard')

@section('titulo')
Planificación de ciclos | tu perfil
@endsection

@section('css.current')
@endsection


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('perfil')}}">Perfil</a></li>
@endsection

@section('info')
<h1><i class="fa fa-user"></i> Perfil de usuario</h1>
<p>Permite modificar perfil de usuario</p>
@endsection

@section('contenido')
@if (count($errors))
<div class="tile " id='passwordForm'>
@else
<div class="tile " id='passwordForm' style="display:none" >
@endif

        <h3 class="tile-title">Cambie su contraseña</h3>
        <div class="tile-body">
        <form action="{{route('perfil.update')}}" method="POST">
            @csrf
            <div class="form-group col-lg-6" >
                    <label for="">Contraseña</label>
                    <input type="password"
                      class="form-control" name="password"  aria-describedby="helpId" placeholder="Ingrese contraseña actual">
                    {!!validacion($errors,'password')!!}
                      <label for="">Contraseña Nueva</label>
                      <input type="password" 
                        class="form-control" name="nuevo"  aria-describedby="helpId" placeholder="Ingrese contraseña nueva">
                    {!!validacion($errors,'nuevo')!!}
                    
                        <label for="">Repetir Contraseña Nueva</label>
                    
                        <input type="password" class="form-control" name="confirmacion" id="" aria-describedby="helpId" placeholder="Ingrese contraseña nueva">
                        {!!validacion($errors,'confirmacion')!!}
                    
                        <div class="tile-footer">
                                <div class="row">
                                  <div class="col-lg-6 col-md-offset-3">

                        
                                    <button  class="btn btn-primary form-control" type="submit" >Enviar </button>
                                  </div>
                                </div>
                        </div>
                </div>
            </form>
        </div>
    </div>
<div class="tile mb-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
            <h2 class="mb-3 line-head" id="typography">{{$user->name}}</h2>
            </div>
          </div>
        </div>
        <!-- Headings-->
        <div class="row">
          <div class="col-lg-6">
          
            <h3>Email</h3>
            <p class="lead">{{$user->email}}</p>
            <h3>Rol</h3>
            <p class="lead">{{$user->roles->first()->name}}</p>
            <h3>Se ha registrado en el sistema</h3>
            <p class="lead">{{$user->created_at}}</p>                    
          </div>
          <div class="col-lg-6">
              <h3>Validaste tu email el:</h3>
              <p class="lead">{{$user->password_creado_en??'No hay informacion'}}</p>
              <h3>Fecha de ultima actualización: </h3>
              <p class="lead">{{$user->updated_at??'No se ha actualizado'}}</p>
              <button type="button" class="btn btn-outline-primary" id='password'>
                    Cambiar contraseña
                </button>
    
          </div>
        </div>
        </div>
        

                
@endsection

@section('js.plugins')
@endsection

@section('js.current')
<script>
document.getElementById('password').addEventListener('click',function(){
    if(document.getElementById('passwordForm').getAttribute('style')==='display:none')
    {
        document.getElementById('passwordForm').setAttribute('style','display:block');
        document.getElementById('password').innerHTML='Reestablacer';
        
    }
    else
    {
        document.getElementById('passwordForm').setAttribute('style','display:none');
        document.getElementById('password').innerHTML='Cambiar contraseña';
    }
});
</script>
@endsection