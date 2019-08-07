<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           crear.blade.php
//Descripción:      Crear: Motivos anulación documentos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

@extends('template')
@section('title','Crear Motivos Anulaciones')

@section('content')
<!-- MENU ADMINISTRATIVOS: PROGRAMADOR -->
@include('partials.menu-programador')
	<div class="container text-center">
		@if ($errors->any())
		    @include('partials.errors')
		@endif
		<div class="row">
          	<div class="col-md-8 col-md-push-2">
	            <div class="border-1px p-25">
	              <h4 class="text-theme-colored text-uppercase m-0">Crear Motivos Anulaciones</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::open(['route'=>'anulaciones.store','class'=>'form-horizontal']) !!}
					@include('admin.programador.anulaciones.form')
					{!!Form::close() !!}
				</div>
		   	</div>
		</div>						
	</div>
@endsection