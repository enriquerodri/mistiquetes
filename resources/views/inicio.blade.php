<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Auditor
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO INICIO -->
@extends('template')
@section('content')
	<!-- Section: home -->
    <section id="home">
      <div class="container-fluid p-0">
        <!-- Slider Revolution Start -->
        @include('partials.slider')
        <!-- Slider Revolution Ends -->
      </div>
    </section>
    <!-- Section: MODULOS -->
    @include('partials.modulos')
@endsection
<!-- FIN INICIO -->
