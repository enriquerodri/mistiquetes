<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Chat
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA CHAT -->
@extends('template')

@section('content')
  <section>
    <!-- MENU CHAT -->
    @include('partials.menu-soporte')

    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Mi chat</a></h2>
      <div class="container">
        <div class="section-content">
          <!-- FILA 1 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- NOTICIA 01 -->
                <a>
                  <img src="{{ asset('images/noticias/soporte_chat_01.jpg') }}" width="300" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase"><a class="">MI CHAT</a></h4>
                <p class="">Soporte técnico en tiempo real</p>
              </div>
            </div>

          <br><br>

          <!-- FILA 2 -->

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA CHAT -->
