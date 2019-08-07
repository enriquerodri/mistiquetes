<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="StudyPress | Education & Courses HTML Template" />
<meta name="keywords" content="academy, course, education, education html theme, elearning, learning," />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<!-- <title>Transportes, Tiquetes y Carga</title> -->
<title>Mis tiquetes</title>

<!-- Favicon and Touch Icons -->
<!-- <link href="images/favicon.png" rel="shortcut icon" type="image/png"> -->
<link rel="shortcut icon" href="{{ asset('images/tic.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('images/tic.ico') }}" type="image/x-icon">

<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader --> 
  <div id="preloader">
    <div id="spinner">
      <div class="preloader-dot-loading">
        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
      </div>
    </div>
  </div>
  
  <!-- start main-content -->
  <div class="main-content"> 
    <!-- Section: home -->
    <section id="home" class="divider parallax fullscreen layer-overlay overlay-white-0" data-bg-img="{{ asset('images/slider00.jpg') }}">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container">
            <div class="row">
              <!-- 26-08-2018 -->
              <div class="col-md-4 col-md-push-4">
                <div class="text-center mb-60"><a href="#" class=""><img alt="" src="images/logo-wide_60.png"></a></div>
                <form name="login-form" class="form-transparent clearfix" method="POST" action="{{ route('login') }}">
                  @csrf
                  <!-- USUARIO - EMAIL -->
                  <div class="row">
                    <div class="form-group col-md-12">
                      <h4>
                        <span class="label label-Success"
                              title="Correo corporativo">Usuario / Email
                        </span>
                      </h4>
                      <i class="fa fa-user form-control-feedback"></i>
                      <input id="email"
                             name="email"
                             class="form-control"
                             type="email" value="{{ old('email') }}"
                             title="Digite aquí su dirección correo"
                             required autofocus>
                    </div>
                  </div>
                  <!-- CONTRASEÑA -->
                  <div class="row">
                    <div class="form-group col-md-12">
                      <h4>
                        <span class="label label-Success"
                              title="Contraseña personal">Contraseña / Password
                        </span>
                      </h4>
                      <input id="password"
                             name="password"
                             class="form-control"
                             type="password"
                             style="font-size: 30px;" 
                             title="Digite aquí su contraseña personal">
                    </div>
                  </div>
                  <!-- INICIAR SESION -->
                  <div class="row">
                    <div class="form-group col-md-12">
                      <button type="submit"
                              class="btn btn-warning btn-lg btn-block no-border mt-15 mb-15"
                              data-toggle="tooltip"
                              data-placement="bottom"
                              title="Clic aquí para iniciar sesión">
                              <i class="fa fa-sign-in"
                                 style="font-size:18px;text-shadow:2px 2px 4px #000000;">
                              </i>
                              <font face="verdana"
                                    color="White"
                                    style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspINICIAR SESION
                              </font>
                      </button>
                    </div>
                  </div>
                  
                
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content --> 

  <!-- Footer -->
    <footer id="footer" class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="mb-0">Copyright ©2020 Mis tiquetes. Todos los derechos reservados</p>
          </div>
        </div>
      </div>
    </footer>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
  <!-- end wrapper -->

  <!-- Footer Scripts -->
  <!-- JS | Custom script for all pages -->
  <script src="js/custom.js"></script>

</body>
</html>