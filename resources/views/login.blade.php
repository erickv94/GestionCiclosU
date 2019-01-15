<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
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

      @if (session()->has('mensaje'))
      <div class="alert alert-success text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            {{session()->get('mensaje')}}
      </div>
      @endif

      <div class="login-box">
      <form class="login-form" action="{{route('login')}}" method="POST">
          @csrf
          <h4 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar sesión</h3>
          <div class="form-group {{$errors->has('email')?'has-danger':''}}">
            <label class="control-label">Email</label>
            <input class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" value="{{ old('email') }}" type="text" placeholder="Email" autofocus>
            {!! validacion($errors,'email') !!}
          </div>


          <div class="form-group {{$errors->has('password')?'has-danger':''}}">
            <label class="control-label">Contraseña</label>
            <input class="form-control {{$errors->has('password')?'is-invalid':''}}"  name="password" type="password" placeholder="Contraseña">
            {!! validacion($errors,'password') !!}
          </div>
          <div class="form-group">
            <div class="utility">
                <div class="animated-checkbox">
                  <label>
                    <input type="checkbox" name='remember' {{ old('remember') ? 'checked' : '' }}><span class="label-text">Recordar</span>
                  </label>
                </div>
                <p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvidaste tu contraseña?</a></p>
              </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar sesión</button>
          </div>
        </form>
      <form  class="forget-form" action="{{route('password.email')}}" method="POST">
        @csrf
          <h4 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Reestablecer contraseña</h3>
          <div class="form-group {{$errors->has('email')?'has-danger':''}}">
            <label class="control-label">Email</label>
            <input class="form-control {{$errors->has('email')?'is-invalid':''}}" type="text" name="email" placeholder="Email">
            @if($errors->has('email'))
              <div class="form-control-feedback text-danger">{{$errors->first('email')}}</div>
            @endif
           </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Reestablecer</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar a login</a></p>
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
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>