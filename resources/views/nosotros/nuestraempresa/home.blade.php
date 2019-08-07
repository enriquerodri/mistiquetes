<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Nuestra empresa
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA EMPRESA (NOSOTROS) -->
@extends('template')

@section('content')
  <section>
        <!-- MENU EMPRESA -->
        @include('partials.menu-nosotros')

        <div class="section-content">
          <h2 class="icon-box-title text-uppercase text-center"><a class="">Nuestra empresa</a></h2>
          <div class="container">
            <div class="section-content">
              <!-- FILA 1 -->
              <div class="row">
                <div class="col-md-3">
                  <div class="text-center">
                    <!-- NOTICIA 01 -->
                    <a>
                      <img src="{{ asset('images/noticias/nuestra_empresa_inicio_02.jpg') }}" width="300" alt="">
                    </a>
                    <h4 class="icon-box-title text-uppercase"><a class="">ASI EMPEZAMOS</a></h4>
                    <p class="">Cómo empezamos</p>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="text-center">
                    <!-- NOTICIA 02 -->
                    <a>
                      <img src="{{ asset('images/noticias/nuestra_empresa_hoy_01.png') }}" width="300" alt="">
                    </a>
                    <h4 class="icon-box-title text-uppercase"><a class="">AQUI ESTAMOS AHORA</a></h4>
                    <p class="">Hoy estamos aquí</p>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="text-center">
                    <!-- NOTICIA 02 -->
                    <a>
                      <img src="{{ asset('images/noticias/nuestra_empresa_futuro_01.jpg') }}" width="300" alt="">
                    </a>
                    <h4 class="icon-box-title text-uppercase"><a class="">FUTURO...</a></h4>
                    <p class="">A donde queremos llegar</p>
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
<!-- FIN MENU PAGINA EMPRESA (NOSOTROS) -->
