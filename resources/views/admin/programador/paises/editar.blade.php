<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           editar.blade.php
//Descripción:      Editar: Motivos anulación documentos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

@extends('template')
@section('title','Editar País')

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
	            	<div class="modal-header" style="background-color: #3498db;">
				        <h3 class="modal-title" id="myModalLabel" style="text-align: left;">
				        	<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITAR PAIS
				        </h3>
			        </div>
			        <h4 class="modal-title" id="myModalLabel" style="text-align: left; color: #0652DD">{{ $pais->m_canombr }}
			        </h4>
		            <div class="line-bottom mb-30"></div>
					{!!Form::model($pais,['route'=>['paises.update',$pais->m_nucodig],'method'=>'PUT','class'=>'form-horizontal']) !!}
					@include('admin.programador.paises.form')
					<div class="text-center">
						<a class="btn btn-success" href="{{ route('paises.index') }}">Cerrar</a>&nbsp&nbsp
						<a class="btn btn-danger" href="{{route('paises.show',$pais->m_nucodig)}}">Cancelar</a>&nbsp&nbsp
						{!!Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
					</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>
@endsection