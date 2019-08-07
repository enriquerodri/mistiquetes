<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           template.blade.php
//Descripción:      Plantilla global
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->


<style type="text/css">
</style>

<!-- INICIO PLANTILLA GLOBAL -->
<!DOCTYPE html>
  <html dir="ltr" lang="es">
  <!-- INICIO ENCABEZADO -->
  <head>
    <!-- Meta Tags -->

    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Ticket | Logística en Transporte" />
    <meta name="keywords" content="carga, ticketes, logística" />

    <!-- Page Title -->
    <!-- <title>Tiquetes | Logística y Transporte</title> -->
    <title>Mis tiquetes</title>

    <!-- Favicon and Touch Icons -->
    <link rel="shortcut icon" href="{{ asset('images/tic.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/tic.ico') }}" type="image/x-icon">

    <!-- Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>
    <link id="menuzord-menu-skins" href="{{ asset('css/menuzord-skins/menuzord-rounded-boxed.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style-main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link  href="{{ asset('js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
    <link  href="{{ asset('js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
    <link  href="{{ asset('js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>

    <!-- NOTIFICACIONES USUARIO -->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('css/sweetalert2.all.min.css') }}" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="{{ asset('css/colors/theme-skin-color-set-2.css') }}" rel="stylesheet" type="text/css">
    <!-- Mis CSS -->
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">

    <!-- NUEVOS ESTILOS PARA CALENDARIO -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}" type="text/css"> 
 
    <!-- external javascripts -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>

    <!-- NUEVOS ESTILOS PARA CALENDARIO -->
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    <!-- 07-09-2018 -->
    <!-- NOTIFICACIONES USUARIO -->
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/promise.min.js') }}"></script>
    <!-- MENSAJES DE ERROR: NOTIFICACIONES USUARIO -->
    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- PROGRESS BAR -->
    <!-- <link href="{{ asset('css/w3.css') }}" rel="stylesheet" type="text/css"> -->

  </head>
  <!-- FIN ENCABEZADO -->

  <!-- INICIO CUERPO -->
  <body class="" onload="mostrarHora()">
    <div id="wrapper" class="clearfix">
      <!-- preloader -->
      <div id="preloader">
        <div id="spinner">
          <div class="preloader-dot-loading">
            <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
          </div>
        </div>
      </div> 
      
      <!-- Header -->
      @include('partials.header')
      
      <!-- Start main-content -->
      <div class="main-content">
        @yield('content')
      </div>

      <!-- Footer -->
      @include('partials.footer')
    </div>
    <!-- end wrapper -->

    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
          (Load Extensions only on Local File Systems ! 
           The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>


    <!-- CALENDARIO GLOBAL -->
    <script type="text/javascript">
          //$("#contenedor").datepicker("show");
          $(".dateicon").datepicker({
                format: "dd/mm/yyyy",
                language: "es",
                daysOfWeekHighlighted: "0",
                todayHighlight: true,
                changeMonth: true,
                changeYear: true,
                autoclose: true,
                clearBtn: true,
                todayBtn: true
          });
    </script>

  </body>
  <!-- FIN CUERPO -->
</html>
<!-- FIN PLANTILLA GLOBAL -->
