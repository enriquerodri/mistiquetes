<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           formb.blade.php
//Descripción:      Crear - Editar: Página principal: Propietarios vehículos
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
        @include('admin.vehiculos.propietarios.form_01')
      </div>
    </div>
  </div>
  <br>
  <!-- VEHICULOS -->
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
        <span class="open-sub"></span>Vehículos
      </a>
    </div>
    <div id="accordion12b" class="panel-collapse collapse" role="tablist" aria-expanded="false" style="height: 0px;">
      <div class="panel-content">
        @include('admin.vehiculos.propietarios.form_02')
      </div>
    </div>
  </div>
  <br>
</div>
<!-- FIN: ACORDEON -->
<script>
</script>
