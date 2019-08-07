<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           home.blade.php
//Descripción:      Menu pagina Programador
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU PAGINA PROGRAMADOR (ADMINISTRATIVOS) -->
@extends('template')

@section('content')
  <section>
    <!-- MENU PROGRAMADOR -->
    @include('partials.menu-programador')
    <div class="section-content">
      <h2 class="icon-box-title text-uppercase text-center"><a class="">Mi programador</a></h2>
      <!-- 26-08-2018 -->
      @include('partials.mensajes')
      <div class="container">
        <!-- 26-08-2018 -->
        @if(Auth::check())
        @if(Auth::user()->m_capap10=="SI")
          <div class="section-content">
            <!-- FILA 1 -->
            <div class="row">
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 01 --> 
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_clientes_02.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Clientes</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONTADO</p></h4>
                  <h5><a class="" href="{{ route('clientescontado.index') }}">Administrador</a></h5>
                  <h5><a class="" href="#">Contratos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONVENIOS</p></h4>
                  <h5><a class="" href="{{ route('clientesconvenios.index') }}">Administrador</a></h5>
                  <h5><a class="" href="#">Contratos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CREDITO</p></h4>
                  <h5><a class="" href="{{ route('clientescredito.index') }}">Administrador</a></h5>
                  <h5><a class="" href="#">Contratos</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>OTROS</p></h4>
                  <h5><a class="" href="{{ route('asociados.index') }}">Vinculados</a></h5>
                  <h5><a class="" href="{{ route('aseguradoras.index') }}">Compañias aseguradoras</a></h5>
                  <h5><a class="" href="{{ route('terminales.index') }}">Terminales de transporte</a></h5>
                  <h5><a class="" href="#">Tarifas terminales de transporte</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 02 --> 
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_identificadores_02.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">IDENTIFICADORES</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CAMBIO DE IDENTIFICADOR</p></h4>
                  <h5><a class="" href="#">Vinculados, Conductores, Propietarios</a></h5>
                  <h5><a class="" href="#">Oficinas</a></h5>
                  <h5><a class="" href="#">Usuarios</a></h5>
                  <h5><a class="" href="#">Vehículos</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 03 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_oficinas_01.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Oficinas</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>ADMINISTRADOR</p></h4>
                  <h5><a class="" href="{{ route('oficinas.index') }}">Registro</a></h5>
                </div>
              </div>
              <div class="col-md-3">
                <div class="text-center">
                  <!-- OPCION 04 -->
                  <a>
                    <img src="{{ asset('images/flaticon-png/small/mis_tablas_administrativas.png') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Tablas administrativas</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONFIGURACION REGIONAL</p></h4>
                  <h5><a class="" href="{{ route('paises.index') }}">Países</a></h5>
                  <h5><a class="" href="{{ route('departamentos.index') }}">Departamentos</a></h5>
                  <h5><a class="" href="{{ route('ciudades.index') }}">Ciudades</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONFIGURACION EMPRESARIAL I</p></h4>
                  <h5><a class="" href="{{ route('divisiones.index') }}">Divisiones</a></h5>
                  <h5><a class="" href="{{ route('cargos.index') }}">Cargos</a></h5>
                  <h5><a class="" href="{{ route('grupos.index') }}">Grupos de Trabajo</a></h5>
                  <h5><a class="" href="{{ route('contratos.index') }}">Tipos de Contrato laboral</a></h5>
                  <h5><a class="" href="{{ route('capacitaciones.index') }}">Capacitaciones</a></h5>
                  <h5><a class="" href="{{ route('examenes.index') }}">Exámenes Médicos</a></h5>
                  <h5><a class="" href="{{ route('pruebas.index') }}">Pruebas</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONFIGURACION EMPRESARIAL II</p></h4>
                  <h5><a class="" href="{{ route('conceptos.index') }}">Conceptos activaciones e inactivaciones</a></h5>
                  <h5><a class="" href="{{ route('anulaciones.index') }}">Motivos anulaciones</a></h5>
                  <h5><a class="" href="{{ route('documentos.index') }}">Documentos</a></h5>
                  <h5><a class="" href="{{ route('seguros.index') }}">Seguros</a></h5>
                  <h5><a class="" href="{{ route('gastosviaje.index') }}">Gastos de viaje</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>NATURALES - JURIDICAS</p></h4>
                  <h5><a class="" href="{{ route('tiposdocumentos.index') }}">Tipos documento de identificación</a></h5>
                  <h5><a class="" href="{{ route('estadocivil.index') }}">Estado civil</a></h5>
                  <h5><a class="" href="{{ route('estratosocial.index') }}">Estrato social</a></h5>
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
                    <img src="{{ asset('images/flaticon-png/small/mis_usuarios_01.jpg') }}" width="90" alt="">
                  </a>
                  <h4 class="icon-box-title text-uppercase"><a class="">Usuarios</a></h4>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CUENTAS</p></h4>
                  <h5><a class="" href="{{ route('usuarios.index') }}">Administrador</a></h5>
                  <h5><a class="" href="#">Mi cuenta</a></h5>
                  <h4 class="text-center" style="background: #ecf0f1;"><p>CONTRASEÑA</p></h4>
                  <h5><a class="" href="{{ route('contrasenias.index') }}">Administrador</a></h5>
                  <h5><a class="" href="#">Eliminar contraseña</a></h5>
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
                  <h5><a class="" href="#">Vinculados, conductores, propietarios</a></h5>
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
        @endif
      </div>
    </div>
  </section>
@endsection
<!-- FIN MENU PAGINA PROGRAMADOR (ADMINISTRATIVOS) -->
