<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Soporte
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA SOPORTE -->
@extends('template')

@section('content')
  <h2 class="icon-box-title text-uppercase text-center"><a class="" href="#">Soporte tecnico de Mis tiquetes</a></h2>
	<section>
    <!-- PAGINA SOPORTE -->
    <div class="container">
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      @if(Auth::user()->m_capap24=="SI")
        <div class="section-content">
          <!-- FILA 1 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- SOPORTE - USUARIO ACTIVO -->
                <a href="#" class="">
                  <img src="{{ asset('images/flaticon-png/small/mi_soporte_01.png') }}" width="90" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase">
                  <a class="">@if(Auth::user()->m_catisex=="M") Bienvenido @else Bienvenida @endif</a>
                </h4>
                <h4 class="usuario">{{Auth::user()->m_caprnom}} {{Auth::user()->m_casenom}}</h4>
                <p class="">No olvide que estamos aquí para ayudarle cuando lo necesite</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- SOPORTE - CHAT -->
                @if(Auth::user()->m_capap15=="SI")
                  <a href="{{ route('soporte-michat') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_chat_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('soporte-michat') }}">Mi chat</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mi_chat_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mi chat</a></h4>
                @endif
                <p class="">Solicite un chat con uno de nuestros técnicos en tiempo real</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- SOPORTE - PROCEDIMIENTOS -->
                @if(Auth::user()->m_capap16=="SI")
                  <a href="{{ route('soporte-misprocedimientos') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_procedimientos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('soporte-misprocedimientos') }}">Mis procedimientos</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_procedimientos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis procedimientos</a></h4>
                @endif
                <p class="">Conozca y opere adecuadamente los aplicativos a través de los procedimientos</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- SOPORTE - ACERCA DE -->
                @if(Auth::user()->m_capap17=="SI")
                  <a href="{{ route('soporte-acercade') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/acerca_de_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('soporte-acercade') }}">Acerca de</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/acerca_de_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Acerca de</a></h4>
                @endif
                <p class="">Derechos reservados y propiedad legal de Mis tiquetes</p>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA SOPORTE -->
