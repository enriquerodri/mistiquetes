<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           eliminar.blade.php
//Descripción:      Eliminar: Motivos anulación documentos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

@extends('template')
@section('title','Eliminar Motivo Anulación')

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
			        <h3 class="modal-title" id="myModalLabel" style="text-align: left;">
			        	<span class="glyphicon glyphicon-zoom-in"></span>&nbsp&nbspELIMINAR MOTIVO ANULACION
			        </h3>
			        <h4 class="modal-title" id="myModalLabel" style="text-align: left; color: #0652DD">{{ $anulacion->m_canombr }}
			        </h4>
	            	<div class="line-bottom mb-30"></div>
					{!!Form::model($anulacion,['route'=>['anulaciones.show',$anulacion->m_nucodig],'method'=>'PUT','class'=>'form-horizontal']) !!}
					@include('admin.programador.anulaciones.form_v')
					<div class="text-center">
						<a class="btn btn-danger" href="{{ route('anulaciones.index') }}">Cerrar</a>&nbsp&nbsp 
						<a class="btn btn-warning" href="{{route('anulaciones.destroy',$anulacion->m_nucodig)}}">Eliminar
						</a>
					</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>
@endsection