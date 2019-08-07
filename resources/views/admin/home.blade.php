<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Administrativos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA ADMINISTRATIVOS -->
@extends('template')

@section('content')
  <h2 class="icon-box-title text-uppercase text-center"><a class="" href="#">Administrativos</a></h2>
	<section>
    <!-- PAGINA ADMINISTRATIVOS -->
    <div class="container">
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      @if(Auth::user()->m_capap22=="SI")
        <div class="section-content">
          <!-- FILA 1 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - AUDITORIA -->
                @if(Auth::user()->m_capap01=="SI")
                  <a href="{{ route('admin-auditor') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_auditor_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('admin-auditor') }}">Mi auditor</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_auditor_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mi auditor</a></h4>
                @endif
                <p class="">Monitoreo y trazabilidad de las operaciones registradas por usuarios</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - CONDUCTORES -->
                @if(Auth::user()->m_capap03=="SI")
                  <a href="{{ route('admin-conductores') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_conductores_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('admin-conductores') }}">Mis conductores</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_conductores_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis conductores</a></h4>
                @endif
                <p class="">Registro y actualización de datos de conductores</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - CONSULTAS -->
                @if(Auth::user()->m_capap04=="SI")
                  <a href="{{ route('admin-consultas') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_consultas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('admin-consultas') }}">Mis consultas</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_consultas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis consultas</a></h4>
                @endif
                <p class="">Genera informes para análisis de ventas y movimientos por tipos de servicios</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - FICHA TECNICA -->
                @if(Auth::user()->m_capap06=="SI")
                  <a href="{{ route('admin-fichatecnica') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_ficha_tecnica_011.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('admin-fichatecnica') }}">Mi ficha técnica</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_ficha_tecnica_011.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mi ficha técnica</a></h4>
                @endif
                <p class="">Registro de revisiones técnico mecánicas y protocolo de alistamiento vehículos</p>
              </div>
            </div>
          </div>

          <br><br>

          <!-- FILA 2 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - INTEGRADOR CONTABLE -->
                @if(Auth::user()->m_capap07=="SI")
                  <a href="{{ route('admin-integradorcontable') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_integrador_contable_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('admin-integradorcontable') }}">Mi integrador contable</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_integrador_contable_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mi integrador contable</a></h4>
                @endif
                <p class="">Integra movimientos registrados por giros, encomiendas y tiquetes a la contabilidad</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - PROCESOS JURIDICOS -->
                @if(Auth::user()->m_capap08=="SI")
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_procesos_juridicos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis procesos jurídicos</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_procesos_juridicos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis procesos jurídicos</a></h4>
                @endif
                <p class="">Registro y trazabilidad de procesos para conductores y vehículos</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - PROGRAMADOR -->
                @if(Auth::user()->m_capap10=="SI")
                  <a href="{{ route('admin-programador') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_programador_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('admin-programador') }}">Mi Programador</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_programador_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mi Programador</a></h4>
                @endif
                <p class="">Administración de parámetros que definen comportamientos y procesos de los aplicativos</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- ADMINISTRATIVOS - VEHICULOS -->
                @if(Auth::user()->m_capap14=="SI")
                  <a href="{{ route('admin-vehiculos') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_vehiculos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('admin-vehiculos') }}">Mis Vehículos</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_vehiculos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis Vehículos</a></h4>
                @endif
                <p class="">Administración del parque automotor de la empresa o por convenios</p>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA ADMINISTRATIVOS -->
