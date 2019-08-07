<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Acerca de
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA ACERCA DE -->
@extends('template')

@section('content')
  <section>
    <!-- MENU ACERCA DE -->
    @include('partials.menu-soporte')

    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Acerca de</a></h2>
      <div class="container">
        <div class="section-content">
          <!-- FILA 1 -->
          <div class="row">
            <div class="col-md-3">
              <div class="text-center">
                <!-- NOTICIA 01 -->
                <a>
                  <img src="{{ asset('images/noticias/acerca_de_01.jpg') }}" width="300" alt="">
                </a>
                <h4 class="icon-box-title text-uppercase"><a class="">DERECHOS RESERVADOS</a></h4>
                <p class="">Propiedad intelectual</p>
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
<!-- FIN MENU PAGINA ACERCA DE -->
