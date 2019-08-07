<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Nosotros
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA NOSOTROS -->
@extends('template')

@section('content')
  <h2 class="icon-box-title text-uppercase text-center"><a class="" href="#">Nosotros</a></h2>
	<section>
    <!-- PAGINA NOSOTROS -->
    <div class="container">
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      @if(Auth::user()->m_capap25=="SI")
        <div class="section-content">
          <!-- FILA 1 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- NOSOTROS - EMPRESA -->
                @if(Auth::user()->m_capap18=="SI")
                  <a href="{{ route('nosotros-nuestraempresa') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/nuestra_empresa_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('nosotros-nuestraempresa') }}"">Nuestra empresa</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/nuestra_empresa_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Nuestra empresa</a></h4>
                @endif
                <p class="">Cómo empezamos, en donde estamos y a donde vamos a llegar</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- NOSOTROS - NOSOTROS -->
                @if(Auth::user()->m_capap19=="SI")
                  <a href="{{ route('nosotros-nosotroso') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/nosotros_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('nosotros-nosotroso') }}">Nosotros</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/nosotros_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Nosotros</a></h4>
                @endif
                <p class="">Perfiles del equipo humano de trabajo</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- NOSOTROS - DEBERES -->
                @if(Auth::user()->m_capap20=="SI")
                  <a href="{{ route('nosotros-misdeberesmisderechos') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_deberes_mis_derechos_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('nosotros-misdeberesmisderechos') }}">Mis deberes, mis derechos</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_deberes_mis_derechos_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Mis deberes, mis derechos</a></h4>
                @endif
                <p class="">Carta fundamental de mi comportamiento y correcto uso de las herramientas informáticas de nuestra empresa</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="text-center">
                <!-- NOSOTROS - NOTICIAS -->
                @if(Auth::user()->m_capap21=="SI")
                  <a href="{{ route('nosotros-noticias') }}" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_noticias_04.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="{{ route('nosotros-noticias') }}">Noticias</a></h4>
                @else
                  <a href="#" class="">
                    <img src="{{ asset('images/flaticon-png/small/mis_noticias_04.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="" href="#">Noticias</a></h4>
                @endif
                <p class="">Entérese aquí de las noticias y novedades recientes</p>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA NOSOTROS -->
