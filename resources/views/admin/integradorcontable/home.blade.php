<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Integrador contable
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA INTEGRADOR CONTABLE (ADMINISTRATIVOS) -->
@extends('template')

@section('content')
  <section>
    <!-- MENU INTEGRADOR CONTABLE -->
    @include('partials.menu-integradorcontable')
    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Mi integrador</a></h2>
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      <div class="container">
        <!-- 26-08-2018 -->
        @if(Auth::user()->m_capap07=="SI")
          <div class="section-content">
            <!-- FILA 1 -->
            <div class="row">
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 01 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_documentos_manuales_01.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Documentos</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>MANUALES</p></h4>
                  <h5><a class="" href="#">Registro</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 02 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mi_interfaz_contable_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Contables I</a></h4>
                  <p class="">Genera documentos contables para ser integrados a la contabilidad</p>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>INTERFAZ CONTABLE I</p></h4>
                  <h5><a class="" href="#">Documentos manuales</a></h5>
                  <h5><a class="" href="#">Documentos sistematizados</a></h5>
                  <h5><a class="" href="#">Distribución ingresos</a></h5>
                  <h5><a class="" href="#">Consultar</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>INTERFAZ CONTABLE II</p></h4>
                  <h5><a class="" href="#">Fondo de reposición ley 105</a></h5>
                  <h5><a class="" href="#">Intereses vehículos con saldo negativo</a></h5>
                  <h5><a class="" href="#">Retención de industria y comercio RETEICA</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>INTERFAZ CONTABLE III</p></h4>
                  <h5><a class="" href="#">Oficinas</a></h5>
                  <h5><a class="" href="#">Taquilleros</a></h5>
                  <h5><a class="" href="#">Vehículos</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 03 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mi_interfaz_contable_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Contables II</a></h4>
                  <p class="">Genera e integra a la contabilidad documentos contables</p>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>INTERFAZ CONTABLE I</p></h4>
                  <h5><a class="" href="#">Documentos sistematizados</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>INTERFAZ CONTABLE II</p></h4>
                  <h5><a class="" href="#">Fondo de reposición ley 105</a></h5>
                  <h5><a class="" href="#">Intereses vehículos con saldo negativo</a></h5>
                  <h5><a class="" href="#">Retención de industria y comercio RETEICA</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 04 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_extractos_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Extractos</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>GENERADOR</p></h4>
                  <p class="">Genera extractos con información de Mis tiquetes</p>
                  <h5><a class="" href="#">Generador de extractos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>INTEGRADO</p></h4>
                  <p class="">Genera extractos con información de la contabilidad</p>
                  <h5><a class="" href="#">Generador integrado de extractos</a></h5>
                </div>
              </div>
            </div>

            <br><br>

            <!-- FILA 2 -->
            <div class="row">
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 05 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_parametros_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Parámetros</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONTABLES</p></h4>
                  <h5><a class="" href="#">Administrador de fondos</a></h5>
                  <h5><a class="" href="#">Conceptos documentos contables</a></h5>
                  <h5><a class="" href="#">Documentos Manuales</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>DISTRIBUCION</p></h4>
                  <h5><a class="" href="#">Libros de viaje</a></h5>
                  <h5><a class="" href="#">Tiquetes</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>TERCEROS</p></h4>
                  <h5><a class="" href="#">Administrador</a></h5>
                  <h5><a class="" href="#">Importar</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 07 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_consultas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Consultas</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>TARIFARIOS</p></h4>
                  <h5><a class="" href="#">Encomiendas</a></h5>
                  <h5><a class="" href="#">Giros</a></h5>
                  <h5><a class="" href="#">Tiquetería</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>VINCULADOS</p></h4>
                  <h5><a class="" href="#">Asociados, conductores, propietarios</a></h5>
                  <h5><a class="" href="#">Vehículos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>OFICINAS</p></h4>
                  <h5><a class="" href="#">Directorio</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>TERMINALES DE TRANSPORTE</p></h4>
                  <h5><a class="" href="#">Directorio</a></h5>
                  <h5><a class="" href="#">Tarifarios</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CLIENTES</p></h4>
                  <h5><a class="" href="#">Contado</a></h5>
                  <h5><a class="" href="#">Crédito</a></h5>
                  <h5><a class="" href="#">Convenios empresariales</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 08 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_herramientas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Herramientas</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>DESCARGAR</p></h4>
                  <h5><a class="" href="#">Tablas de datos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>SISTEMA</p></h4>
                  <h5><a class="" href="#">Propiedades del sistema</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>FONDOS</p></h4>
                  <h5><a class="" href="#">Descargar</a></h5>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA INTEGRADOR CONTABLE (ADMINISTRATIVOS) -->
