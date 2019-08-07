<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Operativos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA OPERATIVOS -->
@extends('template')

@section('content')
  <h2 class="icon-box-title text-uppercase text-center"><a class="" href="#">Operativos</a></h2>
	<section>
    <!-- PAGINA OPERATIVOS -->
    <div class="container">
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      @if(Auth::user()->m_capap23=="SI")
        <div class="section-content">
          <!-- FILA 1 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- OPERATIVOS - BIBLIOTECA -->
                @if(Auth::user()->m_capap02=="SI")
                  <a href="{{ route('operativos-biblioteca') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_biblioteca_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('operativos-biblioteca') }}">Mi Biblioteca de consuta</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_biblioteca_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mi Biblioteca de consuta</a></h4>
                @endif
                <p class="">Administre desde cualquier lugar con la ayuda y seguridad de herramientas informáticas su oficina en la terminal de transportes</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- OPERATIVOS - RODAMIENTOS -->
                @if(Auth::user()->m_capap11=="SI")
                  <a href="{{ route('operativos-rodamientos') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_rodamientos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('operativos-rodamientos') }}">Mis rodamientos</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_rodamientos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis rodamientos</a></h4>
                @endif
                <p class="">Administrar y controlar la programación de rodamientos del parque automotor a nivel global</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- OPERATIVOS - TIQUETES -->
                  @if(Auth::user()->m_capap12=="SI")
                  <a href="{{ route('operativos-tiquetes') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_tiquetes_01.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('operativos-tiquetes') }}">Mis tiquetes</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_tiquetes_01.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis tiquetes</a></h4>
                @endif
                <p class="">Registro de ventas por servicios de giros, encomiendas y tiquetes</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <a href="#" class="">
                  <img src="{{ asset('images/flaticon-png/small/mi_tranquilidad_01.png') }}" width="90" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase">
                  <a class="">Administración y operación para su oficina</a>
                </h4>
                <h4 class="usuario">{{Auth::user()->oficina->m_canombr}}</h4>
                <p class="">Obtenga mayor productividad con expericiencias agradables en sus labores</p>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA OPERATIVOS -->
