<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Conductores
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA CONDUCTORES (ADMINISTRATIVOS) -->
@extends('template')

@section('content')
  <section>
    <!-- MENU CONDUCTORES -->
    @include('partials.menu-conductores')
    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Mis conductores</a></h2>
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      <div class="container">
        <!-- 26-08-2018 -->
        @if(Auth::user()->m_capap03=="SI")
          <div class="section-content">
            <!-- FILA 1 -->
            <div class="row">
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 01 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_conductores_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Conductores</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>ADMINISTRADOR</p></h4>
                  <h5><a class="" href="{{ route('conductores.index') }}">Registro</a></h5>
                  <h5><a class="" href="{{ route('conductores.index') }}">Servicio de mensajería</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 02 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/infracciones_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Comparendos</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>COMPARENDOS E INFRACCIONES DE TRANSITO</p></h4>
                  <h5><a class="" href="#">Administrador</a></h5>
                  <h5><a class="" href="#">Registro</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 03 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mi_seguridad_vial_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Seguridad vial</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>PLAN ESTRATEGICO DE SEGURIDAD VIAL</p></h4>
                  <h5><a class="" href="#">Capacitaciones</a></h5>
                  <h5><a class="" href="#">Consultar</a></h5>
                </div>
              </div>

            <!-- FILA 2 -->
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
<!-- FIN MENU PAGINA CONDUCTORES (ADMINISTRATIVOS) -->
