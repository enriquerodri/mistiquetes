<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Tiquetes
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA TIQUETES (OPERATIVOS) -->
@extends('template')

@section('content')
  <section>
        <!-- MENU TIQUETES -->
        @include('partials.menu-tiquetes')
        <div class="section-content">
          <h2 class="icon-box-title text-uppercase text-center"><a class="">Mis tiquetes</a></h2>
          <!-- 26-08-2018 -->
          @include('partials.mensajes')
          <div class="container">
            <!-- 26-08-2018 -->
            @if(Auth::user()->m_capap12=="SI")
              <div class="section-content">
                <!-- FILA 1 -->
                <div class="row">
                  <div class="col-md-3">
                    <div class="text-center">
                      <!-- OPCION 01 -->
                      <a>
                        <img src="{{ asset('images/flaticon-png/small/caja_01.jpg') }}" width="90" alt="">
                      </a>
                      <h4 class="icon-box-title text-uppercase"><a class="">Caja</a></h4>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>DOCUMENTOS CONTABLES</p></h4>
                      <h5><a class="" href="#">Gastos de viaje</a></h5>
                      <h5><a class="" href="#">Egresos</a></h5>
                      <h5><a class="" href="#">Ingresos</a></h5>
                      <h5><a class="" href="#">Notas crédito</a></h5>
                      <h5><a class="" href="#">Notas debito</a></h5>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="text-center">
                      <!-- OPCION 02 -->
                      <a>
                        <img src="{{ asset('images/flaticon-png/small/mis_rodamientos_01.png') }}" width="90" alt="">
                      </a>
                      <h4 class="icon-box-title text-uppercase"><a class="">Rodamientos</a></h4>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>PROGRAMACION</p></h4>
                      <h5><a class="" href="#">Registro</a></h5>
                      <h5><a class="" href="#">Transbordos</a></h5>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>INTERFAZ</p></h4>
                      <h5><a class="" href="#">Terminales de transporte</a></h5>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="text-center">
                      <!-- OPCION 03 --> 
                      <a>
                        <img src="{{ asset('images/flaticon-png/small/mis_tiquetes_01.jpg') }}" width="90" alt="">
                      </a>
                      <!-- <h5><a class="" href="{{ route('ventas.index') }}">Ventas y reservas</a></h5> --> 
                      <h4 class="icon-box-title text-uppercase"><a class="">Tiquetería</a></h4>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>TIQUETES</p></h4>
                      <h5><a class="" href="#">Ventas y reservas</a></h5>
                      <h5><a class="" href="#">Reasignar</a></h5>
                      <h5><a class="" href="#">Abierto</a></h5>
                      <h5><a class="" href="#">Consultar</a></h5>
                      <h5><a class="" href="#">Web - Revertido</a></h5>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>LIBROS DE VIAJE</p></h4>
                      <h5><a class="" href="#">Generar</a></h5>
                      <h5><a class="" href="#">Consultar</a></h5>
                      <h5><a class="" href="#">Anular</a></h5>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>PROTOCOLOS DE ALISTAMIENTO</p></h4>
                      <h5><a class="" href="#">Registro</a></h5>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="text-center">
                      <!-- OPCION 05 -->
                      <a>
                        <img src="{{ asset('images/flaticon-png/small/mis_encomiendas_01.png') }}" width="90" alt="">
                      </a>
                      <h4 class="icon-box-title text-uppercase"><a class="">Encomiendas</a></h4>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>ENVIADAS</p></h4>
                      <h5><a class="" href="#">Registrar</a></h5>
                      <h5><a class="" href="#">Remesar</a></h5>
                      <h5><a class="" href="#">Consultar</a></h5>
                      <h5><a class="" href="#">Anular</a></h5>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>RECIBIDAS</p></h4>
                      <h5><a class="" href="#">Consultar</a></h5>
                      <h5><a class="" href="#">Trazabilidad</a></h5>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>PLANILLAS DE CARGA</p></h4>
                      <h5><a class="" href="#">Generar</a></h5>
                      <h5><a class="" href="#">Consultar</a></h5>
                      <h5><a class="" href="#">Anular</a></h5>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>DESCARGAR</p></h4>
                      <h5><a class="" href="#">Consolidado</a></h5>
                      <h5><a class="" href="#">Plantilla manifiesto de carga</a></h5>
                    </div>
                  </div>
                </div>
                <br><br>

                <!-- FILA 2 --> 
                <div class="row">
                  <div class="col-md-3">
                    <div class="text-center">
                      <!-- OPCION 06 -->
                      <a>
                        <img src="{{ asset('images/flaticon-png/small/mis_giros_01.png') }}" width="90" alt="">
                      </a>
                      <h4 class="icon-box-title text-uppercase"><a class="">Giros</a></h4>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>ENVIADOS</p></h4>
                      <h5><a class="" href="#">Registrar</a></h5>
                      <h5><a class="" href="#">Trazabilidad</a></h5>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>RECIBIDOS</p></h4>
                      <h5><a class="" href="#">Pagar</a></h5>
                      <h5><a class="" href="#">Trazabilidad</a></h5>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="text-center">
                      <!-- OPCION 06 -->
                      <a>
                        <img src="{{ asset('images/flaticon-png/small/mi_productividad_01.png') }}" width="90" alt="">
                      </a>
                      <h4 class="icon-box-title text-uppercase"><a class="">CLIENTES</a></h4>
                      <h4 class="text-center" style="background: #ecf0f1;"><p>ADMINISTRADOR</p></h4>
                      <h5><a class="" href="{{ route('clientescontado.index') }}">Administrador</a></h5>
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
<!-- FIN MENU PAGINA TIQUETES (OPERATIVOS) -->
