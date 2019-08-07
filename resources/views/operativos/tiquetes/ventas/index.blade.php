<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Venta de tiquetes
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<style>

	.label_sillas {
		color: black;
		margin-top: 5px;
		margin-bottom: 10px;
		text-align: center;
		cursor: pointer;
		font-size: 18px;
		font-weight:bold;
	}

	.incluir {
		position: relative;
	}
	.incluir input {
		-webkit-appearance: none;   
		-moz-appearance: window;   
		-ms-appearance: window;  
		appearance: window; 
		position: absolute;
		cursor: pointer;
		top: 0;
		width: 38px;
		height: 38px;
	}
	.incluir input + label::before {
		position: relative;
		display: inline-block;
		background: transparent url({{ asset('images/flaticon-png/small/sc_1.png') }}) no-repeat 0 0;
		background-size: 100%;
		cursor: pointer;
		width: 38px;
		height: 38px;
		content: "" attr(value) "";
		vertical-align: middle;
	}
	.incluir input:checked + label::before {
		background: transparent url({{ asset('images/flaticon-png/small/sc_10.png') }}) no-repeat 0 0;
		background-size: 100%;
		cursor: pointer;
		content: "" attr(value) "";
	}
	
	.inc_pvh_con {
		position: relative;
	}
	.inc_pvh_con input {
		-webkit-appearance: none;   
		-moz-appearance: window;   
		-ms-appearance: window;  
		appearance: window; 
		position: absolute;
		cursor: pointer;
		top: 0;
		width: 38px;
		height: 38px;
	}
	.inc_pvh_con input + label::before {
		position: relative;
		display: inline-block;
		background: transparent url({{ asset('images/flaticon-png/small/sc_0.png') }}) no-repeat 0 0;
		background-size: 100%;
		cursor: pointer;
		width: 38px;
		height: 38px;
		content: "" attr(value) "";
		vertical-align: middle;
	}
	.inc_pvh_con input:checked + label::before {
		background: transparent url({{ asset('images/flaticon-png/small/sc_0.png') }}) no-repeat 0 0;
		background-size: 100%;
		cursor: pointer;
		content: "" attr(value) "";
	}

	.exc_pvh_vac {
		position: relative;
	}
	.exc_pvh_vac input {
		-webkit-appearance: none;   
		-moz-appearance: window;   
		-ms-appearance: window;  
		appearance: window; 
		position: absolute;
		cursor: default;
		cursor: 
		top: 0;
		width: 38px;
		height: 38px;
	}
	.exc_pvh_vac input + label::before {
		position: relative;
		display: inline-block;
		cursor: default;
		width: 38px;
		height: 38px;
		content: "" attr(value) "";
		vertical-align: middle;
	}
	.exc_pvh_vac input:checked + label::before {
		cursor: default;
		content: "" attr(value) "";
	}

</style>

@extends('template')
@section('title','Venta tiquetes')
@include('sweet::alert')
@include('partials.mensajes')

@section('content')

<!-- MENU OPERATIVOS: TIQUETES -->
@include('partials.menu-tiquetes')

	<div class="container text-center">
		<!-- OPERATIVOS - TIQUETES --> 
		<hr class="separador">
    		<h3>TIQUETES</h3>
    	<hr class="separador">

		@include('operativos.tiquetes.ventas._find')

		@include('operativos.tiquetes.ventas._ida')
		@include('operativos.tiquetes.ventas._regreso')
		
		<hr>
		@include('operativos.tiquetes.ventas._planoVehiculo')
		
		<br>
   </div>

 @endsection
