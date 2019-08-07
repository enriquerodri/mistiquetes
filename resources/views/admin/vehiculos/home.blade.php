<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Vehiculos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA VEHICULOS (ADMINISTRATIVOS) -->
@extends('template')

@section('content')
  <section>
    <!-- MENU VEHICULOS -->
    @include('partials.menu-vehiculos')
    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Mis vehículos</a></h2>
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      <div class="container">
        <!-- 26-08-2018 -->
        @if(Auth::user()->m_capap14=="SI")
          <div class="section-content">
            <!-- FILA 1 -->
            <div class="row">
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 01 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_propietarios_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Propietarios</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>ADMINISTRADOR</p></h4>
                  <h5><a class="" href="{{ route('propietarios.index') }}">Registro</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 02 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_rutas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Rutas</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>ADMINISTRADOR</p></h4>
                  <h5><a class="" href="{{ route('rutas.index') }}">Registro</a></h5>
                  <h5><a class="" href="{{ route('rutas-autorizadas.index') }}">Autorizadas</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 03 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mi_carga_01.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Carga</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>TARIFARIOS</p></h4>
                  <h5><a class="" href="#">Rutas principales</a></h5>
                  <h5><a class="" href="#">Reexpedición</a></h5>
                  <h5><a class="" href="#">Liquidación por kilos</a></h5>
                  <h5><a class="" href="#">Artícilos por clase</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>ARTICULOS Y CLASES</p></h4>
                  <h5><a class="" href="#">Artículos</a></h5>
                  <h5><a class="" href="#">Clases</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 04 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_pasajeros_01.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Pasajeros</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>TARIFARIOS</p></h4>
                  <h5><a class="" href="#">Por ruta y trayectos</a></h5>
                </div>
              </div>
            </div>

            <br><br>

            <!-- FILA 2 -->
            <div class="row">
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 05 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_vehiculos_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Vehículos</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>ADMINISTRADOR</p></h4>
                  <h5><a class="" href="{{ route('vehiculos.index') }}">Vehículos de Pasajeros y Carga</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>PARAMETROS I</p></h4>
                  <h5><a class="" href="{{ route('clases.index') }}">Clases</a></h5>
                  <h5><a class="" href="{{ route('lineas.index') }}">Líneas</a></h5>
                  <h5><a class="" href="{{ route('marcas.index') }}">Marcas</a></h5>
                  <h5><a class="" href="{{ route('colores.index') }}">Paleta de colores</a></h5>
                  <h5><a class="" href="{{ route('tipos-carrocerias.index') }}">Tipos de Carrocería</a></h5>
                  <h5><a class="" href="{{ route('tipos-combustible.index') }}">Tipos de combustible</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>PARAMETROS II</p></h4>
                  <h5><a class="" href="{{ route('clases.index') }}">Grupos de vehículos</a></h5>
                  <h5><a class="" href="#">Planos silletería</a></h5>
                  <h5><a class="" href="{{ route('servicios.index') }}">Tipos de servicio</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 07 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_consultas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Consultas</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>TARIFARIOS</p></h4>
                  <h5><a class="" href="#">Encomiendas</a></h5>
                  <h5><a class="" href="#">Giros</a></h5>
                  <h5><a class="" href="#">Tiquetería</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>VINCULADOS</p></h4>
                  <h5><a class="" href="#">Asociados, conductores, propietarios</a></h5>
                  <h5><a class="" href="#">Vehículos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>OFICINAS</p></h4>
                  <h5><a class="" href="#">Directorio</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>TERMINALES DE TRANSPORTE</p></h4>
                  <h5><a class="" href="#">Directorio</a></h5>
                  <h5><a class="" href="#">Tarifarios</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CLIENTES</p></h4>
                  <h5><a class="" href="#">Contado</a></h5>
                  <h5><a class="" href="#">Crédito</a></h5>
                  <h5><a class="" href="#">Convenios empresariales</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 08 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_herramientas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Herramientas</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>DESCARGAR</p></h4>
                  <h5><a class="" href="#">Tablas de datos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>SISTEMA</p></h4>
                  <h5><a class="" href="#">Propiedades del sistema</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>FONDOS</p></h4>
                  <h5><a class="" href="#">Descargar</a></h5>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA VEHICULOS (ADMINISTRATIVOS) -->
