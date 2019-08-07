<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Auditoria Eventos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

@extends('template')
@section('title','Auditoria')
@include('sweet::alert')
@include('partials.mensajes')

@section('content')
<!-- MENU ADMINISTRATIVOS: AUDITOR -->
@include('partials.menu-auditor')
	<div class="container text-center">
		<!-- ADMINISTRATIVOS - DIVISIONES -->
		<hr class="separador">
    		<h3>EVENTOS AUDITORIA</h3>
    	<hr class="separador">

	    <!-- INICIO FORMULARIO DE BOTONES -->
		<div class="row text-center">
			<div class="col-md-8">
				<!-- BOTON REGRESAR -->
		        <a href="{{ route('admin-auditor') }}" class="btn btn-primary boton btn-lg" data-toggle="tooltip" title="Regresar...">
		        	<span class="fa fa-mail-reply" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
		        		<font face="verdana" color="White" style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspAUDITOR</font>
		        	</span>
		        </a>&nbsp&nbsp
	          	<!-- REGISTROS - NUEVO -->
	          	
				<!-- BOTON FITROS -->
				<button type="button" class="btn btn-primary boton" data-toggle="modal" data-target="#modalfiltros">
					<i class="fa fa-filter" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Filtros"></i>
				</button>&nbsp&nbsp
				<!-- BOTON PROCEDIMIENTOS -->
				<button type="button" class="btn btn-primary boton" data-toggle="modal" data-target="#modalprocedimientos">
					<i class="fa fa-file-text-o" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Conozca aquí los procedimientos generales"></i>
				</button>&nbsp&nbsp
				
			</div>
			
		</div>
		<br>
		<!-- FIN FORMULARIO DE BOTONES -->
		<!-- MENSAJES -->

		
	</div>



	<!-- INICIO MODAL: PROCEDIMIENTOS -->
	<div id="modalprocedimientos" class="modal fade">
  	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<!-- Encabezado -->
			<div class="modal-header" style="background-color: #3498db">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbspPROCEDIMIENTOS DIVISION
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
		    	<div class="container-fluid">
					<object width="100%" height="50px" data="{{ asset('document/divisiones.pdf') }}"></object>
		    	</div>
		    </div>
	    	<!-- Pie -->
			<div class="modal-footer">
				<div class="text-center">
					<button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCerrar</button>
				</div>
			</div>
	    </div>
	  </div>
	</div>
	<!-- FIN MODAL: PROCEDIMIENTOS -->

	<!-- INICIO MODAL: FILTROS -->
	<div id="modalfiltros" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<!-- Encabezado -->
			<div class="modal-header" style="background-color: #3498db">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-filter"></span>&nbsp&nbspFILTROS AUDITORIA
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
				{!!Form::open(['route'=>'divisiones.index','method'=>'get'])!!}
		    	<div class="container-fluid">
		    		<!-- CAJA DE TEXTO BUSQUEDA: NOMBRE -->	
		    		<div class="row form-group">
		    			<div class="col-md-3 text-right">
		    				<label class="control-label">Mótivo:</label>
		    			</div>
		    			<div class="col-md-9">
		    				{!! Form::text('m_canombr',null, 
								['placeholder'=>'NOMBRE DVISION...',
								'class'=>'form-control',
								'id'=>'m_canombr',
								'onkeyup'=>'this.value=this.value.toUpperCase()'
								]) 
							!!}
		    			</div>
		    		</div>
		    		<!-- CAJA DE TEXTO BUSQUEDA: CODIGO NACIONAL -->	
		    		<div class="row form-group">
		    			<div class="col-md-3 text-right">
		    				<label class="control-label">Código Nacional:</label>
		    			</div>
		    			<div class="col-md-9">
		    				{!! Form::text('m_cacodna',null, 
								['placeholder'=>'CODIGO NACIONAL...',
								'class'=>'form-control',
								'id'=>'m_cacodna',
								'onkeyup'=>'this.value=this.value.toUpperCase()'
								]) 
							!!}
		    			</div>
		    		</div>
					<!-- LISTA: ESTADO -->
					<div class="row form-group">
					    <div class="col-md-3 text-right">
					        <label class="control-label">Estado:</label>
					    </div>
					    <div class="col-md-9">
							{!! Form::select('conceptos', $conceptos_auditoria, null, 
									['placeholder'=>'CONCEPTO...',
									'class'=>'form-control',
									'id'=>'m_caestad']) 
							!!}
						</div>
					</div>
					<!-- LISTA: USUARIO REGISTRA -->
					<div class="row form-group">
					    <div class="col-md-3 text-right">
					        <label class="control-label">Registrado por:</label>
					    </div>
					    <div class="col-md-9">
							{!! Form::select('m_causreg', $usuarios, null, 
									['placeholder'=>'USUARIO...',
									'class'=>'form-control'
									])
							!!}
						</div>
					</div>
					<!-- LISTA: USUARIO ACTUALIZA -->
					<div class="row form-group">
					    <div class="col-md-3 text-right">
					        <label class="control-label">Actualizado por:</label>
					    </div>
					    <div class="col-md-9">
							{!! Form::select('m_causact', $usuarios, null, 
									['placeholder'=>'USUARIO...',
									'class'=>'form-control'
									])
							!!}
						</div>
					</div>
		    	</div>
		    </div>
	    	<!-- Pie -->
			<div class="modal-footer">
				<div class="text-center">
					<div class="row text-center">
						<!-- BOTON CANCELAR -->
						<a class="btn btn-warning" href="{{ route('divisiones.index') }}" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCancelar</a>
						<!-- BOTON BUSCAR -->
						<button class="btn btn-success" type="submit" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-search fa-1x" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspBuscar
						</button>
						<!-- BOTON EXPORTAR PDF -->
						@if(Auth::user()->m_capreep=="SI")
							<a class="btn btn-primary boton" type="submit" href="{{ route('divisiones-pdf') }}" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-pdf-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbsp Exportar PDF
							</a>
						@else
							<a class="btn btn-warning boton" data-toggle="tooltip" title="Propiedad Inactiva" type="submit" href="#" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-pdf-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbsp Exportar PDF
							</a>
						@endif
						<!-- BOTON EXPORTAR HOJA DE CALCULO -->
						@if(Auth::user()->m_capreex=="SI")
							<a class="btn btn-primary boton" type="submit" href="{{ route('divisiones-excel') }}" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-excel-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbspExportar a hoja de calculo
							</a>
						@else
							<a class="btn btn-warning boton" data-toggle="tooltip" title="Propiedad Inactiva" type="submit" href="#" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-excel-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbspExportar a hoja de calculo
							</a>
						@endif
					</div>
				</div>
			</div>
			{!!Form::close()!!}
	    </div>
	  </div>
	</div>
	<!-- FIN MODAL: FILTROS -->

@endsection
