<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           formb.blade.php
//Descripción:      Crear - Editar: Página principal: Usuarios
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO: ACORDEON -->
<div id="accordion1b" class="panel-group accordion">
  <!-- DATOS GENERALES -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b" data-toggle="collapse"
        href="#accordion11b" class="" style= "text-align: center;
        background-color: #5CB85C; color: white; 
        font-size:14px; text-shadow:2px 2px 4px #000000;"
        aria-expanded="true">
        <span class="open-sub"></span>Datos Generales
      </a>
    </div>
    <div id="accordion11b" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_01')
      </div>
    </div>
  </div>
  <br>
  <!-- USUARIO -->
  <div class="panel">
    <div class="panel-title">
      <a class="collapsed"
        data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion12b"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Cuenta
      </a>
    </div>
    <div id="accordion12b" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_02')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES REGISTROS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion13b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades de Registros
      </a>
    </div>
    <div id="accordion13b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_03')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES ADMINISTRATIVAS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion14b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades Administrativas
      </a>
    </div>
    <div id="accordion14b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_04')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES COMPROBANTES DE CAJA -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion15b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades Comprobantes de Caja
      </a>
    </div>
    <div id="accordion15b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_05')
      </div>
    </div>
  </div>

  <br>
  <!-- PROPIEDADES ENCOMIENDAS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion16b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades Encomiendas
      </a>
    </div>
    <div id="accordion16b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_06')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES GIROS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion17b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades Giros
      </a>
    </div>
    <div id="accordion17b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_07')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES TIQUETES -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion18b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades Tiquetes
      </a>
    </div>
    <div id="accordion18b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_08')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES RODAMIENTOS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion19b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades Rodamientos
      </a>
    </div>
    <div id="accordion19b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_09')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES CONTABLES -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1b"
        data-toggle="collapse"
        href="#accordion20b"
        class="collapsed"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Propiedades Contables
      </a>
    </div>
    <div id="accordion20b" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_10')
      </div>
    </div>
  </div>
</div>
<!-- FIN: ACORDEON -->
<script>
</script>






