<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <title>Planificación de ciclos | Login</title>
  </head>
  <body>
    <section class="material-half-bg">

      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h3>Sistema de Planificación de ciclos</h3>
      </div>

 
      <div class="login-box">
      <form class="login-form" action="{{route('password.update')}}" method="POST">
          @csrf
          <h5 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Restablecer contraseña</h3>          
          <input type="hidden" name="token" value="{{ $token }}">


          <div class="form-group {{$errors->has('email')?'has-danger':''}}">

            <label for="email">confirmar su email</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

            {!! validacion($errors,'email') !!}
          </div>


          <div class="form-group {{$errors->has('password')?'has-danger':''}}">
            <label class="control-label">Nueva contraseña</label>
            <input class="form-control {{$errors->has('password')?'is-invalid':''}}"  name="password" type="password" placeholder="Contraseña">
            {!! validacion($errors,'password') !!}
          </div>

          <div class="form-group">
            <label class="control-label">Confirmar  nueva contraseña</label>
            <input class="form-control"  name="password_confirmation" type="password" placeholder="Contraseña">
          </div>

          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock "></i>Cambiar contraseña</button>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
  
  </body>
</html>