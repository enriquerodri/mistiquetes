<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Ficha tecnica
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA FICHA TECNICA (ADMINISTRATIVOS) -->
@extends('template')

@section('content')
  <section>
    <!-- MENU FICHA TECNICA -->
    @include('partials.menu-fichatecnica')
    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Mi ficha técnica</a></h2>
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      <div class="container">
        <!-- 26-08-2018 -->
        @if(Auth::user()->m_capap06=="SI")
          <div class="section-content">
            <!-- FILA 1 -->
            <div class="row">
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 01 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_protocolos_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Protocolo de alistamiento</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>ADMINISTRADOR</p></h4>
                  <h5><a class="" href="#">Centros de diagnóstico automotor</a></h5>
                  <h5><a class="" href="#">Ítems protocolo</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>REGISTRAR</p></h4>
                  <h5><a class="" href="#">Protocolos de alistamiento</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONSULTAR</p></h4>
                  <h5><a class="" href="#">Protocolo de alistamiento</a></h5>
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
<!-- FIN MENU PAGINA FICHA TECNICA (ADMINISTRATIVOS) -->
