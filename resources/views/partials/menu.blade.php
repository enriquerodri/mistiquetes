<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu.blade.php
//Descripción:      Menu horizontal Global
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL GLOBAL -->
<nav id="menuzord" class="menuzord bg-theme-colored pull-left flip menuzord-responsive">
  <ul class="menuzord-menu">
    <li class="active" >
      <a href="{{route('inicio')}}">
        <span class="fa fa-home"
              style="font-size: 36px;"
              data-toggle="tooltip"
              data-placement="left"
              title="Inicio...&nbsp&nbsp">
        </span>
      </a>
    </li>
    <!-- ADMINISTRATIVOS -->
    <!-- 26-08-2018 -->
    <!-- CHEQUEA ESTADO DE SESION ACTIVA - INACTIVA -->
    @if(Auth::check())
      @if(Auth::user()->m_capap22=="SI")
        <li><a href="{{ route('admin') }}">Administrativos</a>
          <ul class="dropdown" style="background: #ecf0f1;">
            <!-- ADMINISTRATIVOS - AUDITOR -->
            @if(Auth::user()->m_capap01=="SI")
              <li><a href="{{ route('admin-auditor') }}">Mi Auditor</a></li>
            @endif
            <!-- ADMINISTRATIVOS - CONDUCTORES -->
            @if(Auth::user()->m_capap03=="SI")
              <li><a href="{{ route('admin-conductores') }}">Mis Conductores</a></li>
            @endif
            <!-- ADMINISTRATIVOS - CONSULTAS -->
            @if(Auth::user()->m_capap04=="SI")
              <li><a href="{{ route('admin-consultas') }}">Mis consultas</a></li>
            @endif
            <!-- ADMINISTRATIVOS - FICHA TECNICA -->
            @if(Auth::user()->m_capap06=="SI")
              <li><a href="{{ route('admin-fichatecnica') }}">Mi Ficha Técnica</a></li>
            @endif
            <!-- ADMINISTRATIVOS - INTEGRADOR CONTABLE -->
            @if(Auth::user()->m_capap07=="SI")
              <li><a href="{{ route('admin-integradorcontable') }}">Mi Integrador Contable</a></li>
            @endif
            <!-- ADMINISTRATIVOS - PROCESOS JURIDICOS -->
            @if(Auth::user()->m_capap08=="SI")
              <li><a href="#">Mis Procesos Jurídicos</a></li>
            @endif
            <!-- ADMINISTRATIVOS - PROGRAMADOR -->
            @if(Auth::user()->m_capap10=="SI")
              <li><a href="{{ route('admin-programador') }}">Mi Programador</a></li>
            @endif
            <!-- ADMINISTRATIVOS - VEHICULOS -->
            @if(Auth::user()->m_capap14=="SI")
              <li><a href="{{ route('admin-vehiculos') }}">Mis vehículos</a></li>
            @endif
          </ul>
        </li>
      @endif

      <!-- OPERATIVOS -->
      <!-- 26-08-2018 -->
      @if(Auth::user()->m_capap23=="SI")
        <!-- ACTUALIZADO 19-05-2018 – INICIO -->
        <li><a href="{{ route('operativos') }}">Operativos</a>
          <ul class="dropdown"style="background: #ecf0f1;">
            <!-- OPERATIVOS - BIBLIOTECA -->
            @if(Auth::user()->m_capap02=="SI")
              <li><a href="{{ route('operativos-biblioteca') }}">Mi biblioteca de consulta</a></li>
            @endif
            <!-- OPERATIVOS - RODAMIENTOS -->
            @if(Auth::user()->m_capap11=="SI")
              <li><a href="{{ route('operativos-rodamientos') }}">Mis rodamientos</a></li>
            @endif
            <!-- OPERATIVOS - TIQUETES -->
            @if(Auth::user()->m_capap12=="SI")
              <li><a href="{{ route('operativos-tiquetes') }}">Mis tiquetes</a></li>
            @endif
          </ul>
        </li>
      @endif

      <!-- SOPORTE -->
      <!-- 26-08-2018 -->
      @if(Auth::user()->m_capap24=="SI")
        <li><a href="{{ route('soporte') }}">Soporte</a>
          <ul class="dropdown"style="background: #ecf0f1;">
            <!-- SOPORTE - CHAT -->
            @if(Auth::user()->m_capap15=="SI")
              <li><a href="{{ route('soporte-michat') }}">Mi chat</a></li>
            @endif
            <!-- SOPORTE - PROCEDIMIENTOS -->
            @if(Auth::user()->m_capap16=="SI")
              <li><a href="{{ route('soporte-misprocedimientos') }}">Mis procedimientos</a></li>
            @endif
            <!-- SOPORTE - ACERCA DE -->
            @if(Auth::user()->m_capap17=="SI")
              <li><a href="{{ route('soporte-acercade') }}">Acerca de...</a></li>
            @endif
          </ul>
        </li>
      @endif

      <!-- NOSOTROS -->
      <!-- 26-08-2018 -->
      @if(Auth::user()->m_capap25=="SI")
        <li><a href="{{ route('nosotros') }}">Nosotros</a>
          <ul class="dropdown"style="background: #ecf0f1;">
              <!-- NOSOTROS - EMPRESA -->
              @if(Auth::user()->m_capap18=="SI")
                <li><a href="{{ route('nosotros-nuestraempresa') }}">Nuestra empresa</a></li>
              @endif
              <!-- NOSOTROS - NOSOTROS -->
              @if(Auth::user()->m_capap19=="SI")
                <li><a href="{{ route('nosotros-nosotroso') }}">Nosotros</a></li>
              @endif
              <!-- NOSOTROS - DEBERES -->
              @if(Auth::user()->m_capap20=="SI")
                <li><a href="{{ route('nosotros-misdeberesmisderechos') }}">Mis deberes, Mis derechos</a></li>
              @endif
              <!-- NOSOTROS - NOTICIAS -->
              @if(Auth::user()->m_capap21=="SI")
                <li><a href="{{ route('nosotros-noticias') }}">Noticias</a></li>
              @endif
          </ul>
        </li>
      @endif
    @endif

    <!-- CERRAR SESION -->
    <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
    <!-- ACTUALIZADO 19-05-2018 – CIERRE -->
  </ul>
    
  <!-- INICIO SCRIPT FECHA Y HORA -->
  <script>
    function mostrarHora(){
      var fecha= new Date();
      var horas= fecha.getHours();
      var minutos = fecha.getMinutes();
      var segundos = fecha.getSeconds();
      var diaSemana = fecha.getDay();
      var dia = fecha.getDate();
      var mes = fecha.getMonth();
      var year = fecha.getFullYear();

      // Accedemos a los elementos del DOM para agregar mas adelante sus correspondientes valores
      var pHoras = document.getElementById('horas'),
      pAMPM = document.getElementById('ampm'),
      pMinutos = document.getElementById('minutos'),
      pSegundos = document.getElementById('segundos'),
      pDiaSemana = document.getElementById('diaSemana'),
      pDia = document.getElementById('dia'),
      pMes = document.getElementById('mes'),
      pYear = document.getElementById('year');

      // Obtenemos el dia se la semana y lo mostramos
      var semana = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'];
      pDiaSemana.textContent = semana[diaSemana];

      // Obtenemos el dia del mes
      pDia.textContent = dia;

      // Obtenemos el Mes y año y lo mostramos
      var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
      pMes.textContent = meses[mes];
      pYear.textContent = year;

      // Cambiamos las hora de 24 a 12 horas y establecemos si es AM o PM

      if (horas >= 12) {
        horas = horas - 12;
        ampm = 'pm';
      } else {
        ampm = 'am';
      }

      // Detectamos cuando sean las 0 AM y transformamos a 12 AM
      if (horas == 0 ){
        horas = 12;
      }

      // Horas, Minutos y Segundos
      if(horas<10){ horas = "0"+horas; }
      if(minutos<10){ minutos = "0"+minutos; }
      if(segundos<10){ segundos = '0'+segundos; }

      document.getElementById('contenedor').innerHTML=''+horas+':'+minutos+':'+segundos+'&nbsp;'+ampm+'';        
      setTimeout('mostrarHora()',1000);
    }
  </script>
  <!-- FIN SCRIPT FECHA Y HORA -->
  
  <!-- INICIO MUESTRA FECHA Y HORA -->
  <ul class="pull-right flip hidden-sm hidden-xs">
    <li>
      <div class="row vcenter">
        <div class="col-sm-12">
          <a class="text-white text-center" href="#"><span id="diaSemana" class="dia">Martes</span>, <span id="dia" class="dia"> 27</span> de <span id="mes" class="dia">Octubre</span> del <span id="year" class="dia">2015</span> <br> </a>
          <a class="text-white text-center" href="#"><span id="contenedor" class="horas"></span></a>
          <input type="hidden" name="calendario" id="calendario"> &nbsp;&nbsp;      
          <input type="image"
                  class="dateicon"
                  style="border: 0;"
                  data-toggle="tooltip"
                  data-placement="right"
                  title="Calendario...&nbsp&nbsp"
                  src="{{ asset('images/flaticon-png/small/calendario_50.png') }}">
        </div>
      </div>
    </li>
  </ul>
  <!-- FIN MUESTRA FECHA Y HORA -->
</nav>
<!-- FIN MENU HORIZONTAL GLOBAL -->
