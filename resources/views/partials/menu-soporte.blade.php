<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu-soporte.blade.php
//Descripción:      Menu horizontal Soporte
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL SOPORTE -->
<nav class="navbar navbar-default mb-15">
  <div class="container-fluid">
    <div class="navbar-header">
      <button aria-expanded="false" data-target="#bs-example-navbar-collapse-8" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a href="{{ route('soporte') }}" class="navbar-brand">SOPORTE</a>
    </div>
    <!-- 26-08-2018 -->
    <!-- CHEQUEA ESTADO DE SESION ACTIVA - INACTIVA -->
    @if(Auth::check())
      @include('partials.mensajes')
      @if(Auth::user()->m_capap24=="SI")
        <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <!-- OPCION 01 -->
            <li class="active dropdown"><a href="{{ route('propietarios.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   </p></li>
                <li><a href=""></a></li>
              </ul>
            </li>
            
            <!-- OPCION 02 -->
            <!-- OPCION 03 -->
            <!-- OPCION 04 -->
            <!-- OPCION 05 -->
            <!-- OPCION 06 -->
            <!-- OPCION 07 -->
            <!-- OPCION 08 -->
          </ul>
        </div>
      @endif
    @endif
  </div>
</nav>
<!-- FIN MENU HORIZONTAL SOPORTE -->
