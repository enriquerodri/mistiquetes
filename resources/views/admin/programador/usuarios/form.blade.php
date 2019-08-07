<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Usuarios
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO: ACORDEON -->
<div id="accordion1" class="panel-group accordion">
  <!-- DATOS GENERALES -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1" data-toggle="collapse"
        href="#accordion11" class="" style= "text-align: center;
        background-color: #5CB85C; color: white; 
        font-size:14px; text-shadow:2px 2px 4px #000000;"
        aria-expanded="true">
        <span class="open-sub"></span>Datos Generales
      </a>
    </div>
    <div id="accordion11" class="panel-collapse collapse in" role="tablist" aria-expanded="true">
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
        data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion12"
        style= "text-align: center;
        background-color: #5CB85C; 
        color: white; 
        font-size:14px;
        text-shadow:2px 2px 4px #000000;"
        aria-expanded="false">
        <span class="open-sub"></span>Cuenta
      </a>
    </div>
    <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_02')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES DE REGISTROS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion13"
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
    <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_03')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES ADMINISYRATIVAS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion14"
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
    <div id="accordion14" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_04')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES COMPROBANTES DE CAJA -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion15"
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
    <div id="accordion15" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_05')
      </div>
    </div>
  </div>

  <br>
  <!-- PROPIEDADES ENCOMIENDAS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion16"
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
    <div id="accordion16" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_06')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES GIROS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion17"
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
    <div id="accordion17" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_07')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES TIQUETES -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion18"
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
    <div id="accordion18" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_08')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES RODAMIENTOS -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion19"
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
    <div id="accordion19" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_09')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIEDADES CONTABLES -->
  <div class="panel">
    <div class="panel-title">
      <a data-parent="#accordion1"
        data-toggle="collapse"
        href="#accordion20"
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
    <div id="accordion20" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.usuarios.form_10')
      </div>
    </div>
  </div>
</div>
<!-- FIN: ACORDEON -->
<script>
</script>
