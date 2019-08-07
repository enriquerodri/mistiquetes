<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           consultar.blade.php
//Descripción:      Consultar: Motivos anulación documentos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

@extends('template')
@section('title','Consultar Motivo Anulación')

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
				        	<span class="glyphicon glyphicon-zoom-in"></span>&nbsp&nbspEDITAR MOTIVO ANULACION
				        </h3>
			        </div>
			        <h4 class="modal-title" id="myModalLabel" style="text-align: left; color: #0652DD">{{ $anulacion->m_canombr }}
			        </h4>
	            	<div class="line-bottom mb-30"></div>
					{!!Form::model($anulacion,['route'=>['anulaciones.show',$anulacion->m_nucodig],'method'=>'PUT','class'=>'form-horizontal']) !!}
					@include('admin.programador.anulaciones.form_v') 
					<div class="text-center">
						<a class="btn btn-success" href="{{ route('anulaciones.index') }}">Cerrar</a>&nbsp&nbsp
						<a class="btn btn-warning" href="{{route('anulaciones.edit',$anulacion->m_nucodig)}}">Editar
						</a>&nbsp&nbsp
				        <!-- BOTON ELIMINAR -->
						<a class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg">Eliminar
						</a>&nbsp&nbsp
						<!-- BOTON PROCEDIMIENTOS -->
				        <a href="" class="btn btn-info">
				          <span class="glyphicon glyphicon-file" data-toggle="modal1" data-target=".bs-example-modal-lg"></span>&nbsp&nbspPROCEDIMIENTOS
				        </a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>

	<!-- Modal -->
	<div id="modaleliminar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header" style="background-color: #3498db">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbspELIMINAR MOTIVO ANULACION
	        </h3>
	      </div>
	      <div class="modal-body">
			@if ($errors->any())
				<script>
			    	$('#modaleliminar').modal('show');
			    </script>
			    @include('partials.errors')
			@endif
	        <h4 class="modal-title" id="myModalLabel" style="text-align: left; color: #0652DD">{{ $anulacion->m_canombr, $anulacion->m_canombr }}
	        </h4>
	        <br>
	        <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="fa fa-bullhorn"></span>&nbsp&nbsp{{Auth::user()->m_caprnom}}&nbsp{{Auth::user()->m_casenom}}<br><br>&nbsp&nbspEstá seguro de eliminar este Registro?
	        </h4>
	        <br>
			<div class="modal-footer">
				<div class="text-center">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-4">
							<a class="btn btn-danger" href="{{route('anulaciones.show',$anulacion->m_nucodig)}}">No
							</a>
						</div>
						<div class="col-md-4">
							<form action="{{route('anulaciones.destroy',$anulacion->m_nucodig)}}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="delete">
								<button class="btn btn-success"> Si </button>
							</form>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- FIN - Modal -->
@endsection