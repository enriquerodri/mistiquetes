<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Noticias
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA NOTICIAS (NOSOTROS) -->
@extends('template')

@section('content')
  <section>
    <!-- MENU NOTICIAS -->
    @include('partials.menu-nosotros')

    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Noticias</a></h2>
      <div class="container">
        <div class="section-content">
          <!-- FILA 1 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- NOTICIA 01 -->
                <a>
                  <img src="{{ asset('images/noticias/noticia_01.jpg') }}" width="300" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase"><a class="">NOTICIA 01</a></h4>
                <p class="">Detalles noticia 01</p>
              </div>
            </div>

            <div class="col-md-3">
              <div class="text-center">
                <!-- NOTICIA 02 -->
                <a>
                  <img src="{{ asset('images/noticias/noticia_01.jpg') }}" width="300" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase"><a class="">NOTICIA 02</a></h4>
                <p class="">Detalles noticia 02</p>
              </div>
            </div>

            <div class="col-md-3">
              <div class="text-center">
                <!-- NOTICIA 03 -->
                <a>
                  <img src="{{ asset('images/noticias/noticia_01.jpg') }}" width="300" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase"><a class="">NOTICIA 03</a></h4>
                <p class="">Detalles noticia 03</p>
              </div>
            </div>

            <div class="col-md-3">
              <div class="text-center">
                <!-- NOTICIA 04 -->
                <a>
                  <img src="{{ asset('images/noticias/noticia_01.jpg') }}" width="1300" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase"><a class="">NOTICIA 04</a></h4>
                <p class="">Detalles noticia 04</p>
              </div>
            </div>
          </div>

          <br><br>

          <!-- FILA 2 -->

        </div>
      </div>
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA NOTICIAS (NOSOTROS) -->
