<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados
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
        @include('admin.programador.asociados.form_01')
      </div>
    </div>
  </div>
  <br>
  <!-- ASOCIADO -->
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
        <span class="open-sub"></span>Asociado
      </a>
    </div>
    <div id="accordion12" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
      <div class="panel-content">
        @include('admin.programador.asociados.form_02')
      </div>
    </div>
  </div>
  <br>
  <!-- CONDUCTOR -->
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
        <span class="open-sub"></span>Conductor
      </a>
    </div>
    <div id="accordion13" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.asociados.form_03')
      </div>
    </div>
  </div>
  <br>
  <!-- PROPIETARIO -->
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
        <span class="open-sub"></span>Propietario
      </a>
    </div>
    <div id="accordion14" class="panel-collapse collapse" role="tablist" aria-expanded="false">
      <div class="panel-content">
        @include('admin.programador.asociados.form_04')
      </div>
    </div>
  </div>
</div>
<!-- FIN: ACORDEON -->
<script>
</script>
