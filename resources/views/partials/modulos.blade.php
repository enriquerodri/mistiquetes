<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           modulos.blade.php
//Descripción:      Modulos pagina de inicio
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MODULOS PAGINA DE INICIO -->
<section class="bg-lighter">
  <div class="container pb-60">
    <div class="section-title mb-10">
      <div class="row">
        <div class="col-md-8">
          <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Módulos <span class="text-theme-color-2 font-weight-400"></span></h2>
        </div>
      </div>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel-4col" data-dots="true">
            <div class="item ">
              <div class="service-block bg-white">
                <div class="thumb"> <img alt="featured project" src="{{ asset('images/mod-administrativo.jpg') }}" class="img-fullwidth">
                
                </div>
                <!-- ADMINISTRATIVOS -->
                <div class="content text-left flip p-25 pt-0">
                  <h4 class="line-bottom mb-10">Administrativos</h4>
                  <p>Descubra una nueva experiencia a través de aplicaciones que administran las bases de datos con parámetros globales e individuales facilitando la integración de los módulos administrativos y operativos que componen Mis tiquetes</p>
                  <!-- ADMINISTRATIVOS -->
                  <!-- 26-08-2018 -->
                  @if(Auth::user()->m_capap22=="SI")
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('admin') }}">Ingresar</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-block mb-md-30 bg-white">
                <div class="thumb"> <img alt="featured project" src="{{ asset('images/mod-operativo.jpg') }}" class="img-responsive img-fullwidth">
                </div>
                <!-- OPERATIVOS -->
                <div class="content text-left flip p-25 pt-0">
                  <h4 class="line-bottom mb-10">Operativos</h4>
                  <p>Aplicaciones diseñadas para lograr la administración y operación total de su oficina desde cualquier lugar o en sitio permitiéndole alcanzar mayor productividad, cumplimiento de metas y mucho más aún por descubrir</p>
                  <!-- OPERATIVOS -->
                  <!-- 26-08-2018 -->
                  @if(Auth::user()->m_capap23=="SI")
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('operativos') }}">Ingresar</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-block mb-md-30 bg-white">
                <div class="thumb"> <img alt="featured project" src="{{ asset('images/modulo_mi_soporte_01.png') }}" class="img-responsive img-fullwidth">
                </div>
                <!-- SOPORTE -->
                <div class="content text-left flip p-25 pt-0">
                  <h4 class="line-bottom mb-10">Soporte</h4>
                  <p>Contáctenos, estamos siempre disponibles para brindarle soluciones que le harán disfrutar del uso de nuestras herramientas informáticas. Conozca anticipadamente los procedimientos que le guían paso a paso en sus tareas </p>
                  <!-- SOPORTE -->
                  <!-- 26-08-2018 -->
                  @if(Auth::user()->m_capap24=="SI")
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('soporte') }}">Ingresar</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-block mb-md-30 bg-white">
                <div class="thumb"> <img alt="featured project" src="{{ asset('images/modulo_nosotros_01.png') }}" class="img-responsive img-fullwidth">
                </div>
                <!-- NOSOTROS -->
                <div class="content text-left flip p-25 pt-0">
                  <h4 class="line-bottom mb-10">Nosotros</h4>
                  <p>Sabemos que nuestra empresa cuenta con humanos brillantes, creativos, emprendedores por eso Usted está ahora aquí y comprendemos claramente que al formar parte de nuestro grupo rápidamente compartirá nuestros valores e ideales</p>
                  <!-- NOSOTROS -->
                  <!-- 26-08-2018 -->
                  @if(Auth::user()->m_capap25=="SI")
                    <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('nosotros') }}">Ingresar</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-block mb-md-30 bg-white">
                <div class="thumb"> <img alt="featured project" src="{{ asset('images/modulo_mis_deberes_mis_derechos_02.png') }}" class="img-responsive img-fullwidth">
                </div>
                <!-- DEBERES Y DERECHOS -->
                <div class="content text-left flip p-25 pt-0">
                  <h4 class="line-bottom mb-10">Mis deberes, Mis derechos</h4>
                  <p>Recuerde que estos son un acto de responsabilidad y conciencia a través del uso de herramientas informáticas que la empresa le confía para que Usted logre una agradable experiencia en el desempeño de sus labores</p>
                  <!-- NOSOTROS -->
                  <!-- 26-08-2018 -->
                  @if(Auth::user()->m_capap25=="SI")
                    <!-- DEBERES Y DERECHOS -->
                    <!-- 26-08-2018 -->
                    @if(Auth::user()->m_capap20=="SI")
                      <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('nosotros-misdeberesmisderechos') }}">Ingresar</a>
                    @endif
                  @endif
                </div>
              </div>
            </div>
            <div class="item">
              <div class="service-block mb-md-30 bg-white">
                <div class="thumb"> <img alt="featured project" src="{{ asset('images/modulo_mis_noticias_01.png') }}" class="img-responsive img-fullwidth">
                </div>
                <!-- NOTICIAS -->
                <div class="content text-left flip p-25 pt-0">
                  <h4 class="line-bottom mb-10">Mis noticias</h4>
                  <p>Permanezca enterado de las noticias y novedades recientes de nuestra empresa y del sector del transporte terrestre</p>
                  <!-- NOSOTROS -->
                  <!-- 26-08-2018 -->
                  @if(Auth::user()->m_capap25=="SI")
                    <!-- NOTICIAS -->
                    <!-- 26-08-2018 -->
                    @if(Auth::user()->m_capap21=="SI")
                      <a class="btn btn-dark btn-theme-colored btn-sm text-uppercase mt-10" href="{{ route('nosotros-noticias') }}">Ingresar</a>
                    @endif
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- FIN MODULOS PAGINA DE INICIO -->
