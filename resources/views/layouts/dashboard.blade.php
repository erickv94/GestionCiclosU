<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Sistema de planificación de ciclos">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon section -->

    <link rel="apple-touch-icon" sizes="180x180" href="/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
    <link rel="manifest" href="/img/icons/site.webmanifest">
    <link rel="mask-icon" href="/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/icons/favicon.ico" type="image/x-icon">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">


    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    @yield('css.current')
    <style>
.pace{-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}.pace-inactive{display:none}.pace .pace-progress{background:red;position:fixed;z-index:2000;top:0;right:100%;width:100%;height:2px}.pace .pace-progress-inner{display:block;position:absolute;right:0;width:100px;height:100%;box-shadow:0 0 10px red,0 0 5px red;opacity:1;-webkit-transform:rotate(3deg) translate(0,-4px);-moz-transform:rotate(3deg) translate(0,-4px);-ms-transform:rotate(3deg) translate(0,-4px);-o-transform:rotate(3deg) translate(0,-4px);transform:rotate(3deg) translate(0,-4px)}.pace .pace-activity{display:block;position:fixed;z-index:2000;top:15px;right:15px;width:14px;height:14px;border:2px solid transparent;border-top-color:red;border-left-color:red;border-radius:10px;-webkit-animation:pace-spinner .4s linear infinite;-moz-animation:pace-spinner .4s linear infinite;-ms-animation:pace-spinner .4s linear infinite;-o-animation:pace-spinner .4s linear infinite;animation:pace-spinner .4s linear infinite}@-webkit-keyframes pace-spinner{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@-moz-keyframes pace-spinner{0%{-moz-transform:rotate(0);transform:rotate(0)}100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}@-o-keyframes pace-spinner{0%{-o-transform:rotate(0);transform:rotate(0)}100%{-o-transform:rotate(360deg);transform:rotate(360deg)}}@-ms-keyframes pace-spinner{0%{-ms-transform:rotate(0);transform:rotate(0)}100%{-ms-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes pace-spinner{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}
    </style>
</head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" style="font-size:1em; line-height:0.8em " href="/"><img src="/img/icons/favicon-32x32.png" alt="icono facultad quimica y farmacia"> Sistema de planificación de ciclos </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

      
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li><a class="dropdown-item" href="{{route('perfil')}}"><i class="fa fa-user fa-lg"></i> Perfil </a></li>
            <li><a class="dropdown-item" href="{{route('logout')}}"  onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Cerrar sesión</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
      <li><a class="app-menu__item {{isActive('inicio')}}" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard "></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item {{isActive('horarios')}}" href="{{route('horarios.index')}}"><i class="app-menu__icon fa fa-calendar "></i><span class="app-menu__label">Gestión Horario</span></a></li>
        <li><a class="app-menu__item {{isActive('docentes')}}" href="{{route('docentes.index')}}"><i class="app-menu__icon fa fa-users "></i><span class="app-menu__label">Gestión Docentes</span></a></li>
        <li><a class="app-menu__item {{isActive('materias')}}" href="{{route('materias.index')}}"><i class="app-menu__icon fa fa-book "></i><span class="app-menu__label">Gestión Materias</span></a></li>       
        <li><a class="app-menu__item {{isActive('locales')}}" href="{{route('locales.index')}}"><i class="app-menu__icon fa fa-building-o "></i><span class="app-menu__label">Gestión Locales</span></a></li>      
        @can('asistentes.index')
        <li><a class="app-menu__item {{isActive('asistentes')}}" href="{{route('asistentes.index')}}"><i class="app-menu__icon fa fa-user-secret "></i><span class="app-menu__label">Gestión Asistentes</span></a></li>
        @endcan
       @can('planificacion.index')
        <li><a class="app-menu__item {{isActive('planificacion')}}" href="{{route('planificaciones.index')}}"><i class="app-menu__icon fa fa-folder "></i><span class="app-menu__label">Planificación de ciclo</span></a></li>
       @endcan
      </ul>


    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          @yield('info')
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            @yield('breadcrumb')
        </ul>
      </div>
      @if (session()->has('error'))
    
      <div class="alert alert-danger text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            {{session()->get('error')}}
      </div>
      @endif      
      @if (session()->has('mensaje'))
      <div class="alert alert-success text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            {{session()->get('mensaje')}}
      </div>
      @endif
      @if (session()->has('warning'))
      <div class="alert alert-warning text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            {{session()->get('warning')}}
      </div>
      @endif

            @yield('contenido')

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/pace.min.js"></script>
    <script src="/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/js/plugins/pace.min.js"></script>
    @yield('js.plugins')
    @yield('js.current')

    </body>
</html>