<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Anulaciones
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

@extends('template')
@section('title','Anulaciones')

@section('content')
<!-- MENU ADMINISTRATIVOS: PROGRAMADOR -->
@include('partials.menu-programador')
	<div class="container text-center">
		<!-- ADMINISTRATIVOS - ANULACIONES -->
		<hr class="separador">
        <h3>ANULACIONES</h3>
        <hr class="separador">
	    <!-- INICIO FORMULARIO DE BOTONES -->
		<div class="row text-center">
			<div class="col-md-8">
				<!-- BOTON REGRESAR -->
		        <a href="{{ route('admin-programador') }}" class="btn btn-primary boton btn-lg" data-toggle="tooltip" title="Regresar...">
		        	<span class="fa fa-mail-reply" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
		        		<font face="verdana" color="White" style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspPROGRAMADOR</font>
		        	</span>
		        </a>&nbsp&nbsp
	          	<!-- REGISTROS - NUEVO -->
	          	@if(Auth::user()->m_caprenu=="SI")
	        		<a id="btncrear" class="btn btn-success" data-toggle="modal" data-target="#modalcrear">
	        			<i class="fa fa-plus" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Agregar..." data-placement="right"></i>
	        		</a>&nbsp&nbsp
	        	@else
	        		<a id="btncrear" class="btn btn-warning" data-toggle="modal" data-target="#">
	        			<i class="fa fa-plus" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Propiedad Inactiva" data-placement="right"></i>
	        		</a>&nbsp&nbsp
	        	@endif
				<!-- BOTON FITROS -->
				<button type="button" class="btn btn-primary boton" data-toggle="modal" data-target="#modalfiltros">
					<i class="fa fa-filter" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Filtros"></i>
				</button>&nbsp&nbsp
				<!-- BOTON PROCEDIMIENTOS -->
				<button type="button" class="btn btn-primary boton" data-toggle="modal" data-target="#modalprocedimientos">
					<i class="fa fa-file-text-o" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Conozca aquí los procedimientos generales"></i>
				</button>&nbsp&nbsp
				<!-- BOTON REFRESCAR - TOTAL REGISTROS -->
				<a class="btn btn-success" data-toggle="tooltip" title="Refrescar pagina" href="{{ route('anulaciones.index') }}" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-refresh fa-1x" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbsp&nbsp(&nbsp&nbspTotal Registros {{count($anulaciones)}} de {{$anulaciones->total()}}&nbsp&nbsp)
				</a>&nbsp&nbsp					
			</div>
			<!-- PAGINADO SUPERIOR -->
			<div class="col-md-4 text-right"> 
				{{$anulaciones->appends(['m_canombr'=>$m_canombr_filtro,'m_cacodna'=>$m_cacodna_filtro,'m_caaplic'=>$m_caaplic_filtro,'m_caanure'=>$m_caanure_filtro,'m_caestad'=>$m_caestad_filtro,'m_causreg'=>$m_causreg_filtro,'m_causact'=>$m_causact_filtro])->links()}}
			</div>
		</div>
		<br>
		<!-- FIN FORMULARIO DE BOTONES -->
		<!-- MENSAJES -->
		@include('partials.mensajes')
		<!-- INICIO TABLA -->
		<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<!-- INICIO ENCABEZADO -->
			<thead>
				<tr>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Editar
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Mótivo
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Aplica a
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Anular documentos relacionados
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Código nacional
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Estado
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Registro
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Usuario
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Actualizado
					</td>
					<td style="background-color: #5CB85C; color: white; font-size:14px;text-shadow:2px 2px 4px #000000;">Usuario
					</td>
				</tr>
			</thead>
			<!-- FIN ENCABEZADO -->
			<!-- INICIO CONTENIDO -->
			<tbody>
				@foreach($anulaciones as $anulacion)
					<tr>
						<td>
							<!-- INICIO BOTON EDITAR -->
							@if(Auth::user()->m_capreed=="SI")
								<a onclick="consultar({{$anulacion->m_nucodig}})" id="btneditar" class="btn btn-primary" data-toggle="modal" data-target="#modaleditar" title="Editar registro" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@else
								<a onclick="" id="btneditar" class="btn btn-warning" data-toggle="modal" data-target="#" title="Propiedad Inactiva" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@endif
							<!-- FIN BOTON EDITAR -->
						</td>
						<td class="text-left">{{$anulacion->m_canombr}}</td>
						<td>{{$anulacion->m_caaplic}}</td>
						<td>{{$anulacion->m_caanure}}</td>
						<td>{{$anulacion->m_cacodna}}</td>
						<td>{{$anulacion->m_caestad}}</td>
						<td>{{$anulacion->created_at}}</td>
						<td>{{$anulacion->usuario_registra->name}}</td>
						<td>{{$anulacion->updated_at}}</td>
						<td>{{$anulacion->usuario_actualiza->name}}</td>
					</tr>
				@endforeach
			</tbody>
			<!-- FIN CONTENIDO -->
		</table>
		</div>
		<!-- FIN TABLA -->
		<!-- PAGINADO INFERIOR -->
		<!-- {{$anulaciones->links()}} -->
		{{$anulaciones->appends(['m_canombr'=>$m_canombr_filtro,'m_cacodna'=>$m_cacodna_filtro,'m_caaplic'=>$m_caaplic_filtro,'m_caanure'=>$m_caanure_filtro,'m_caestad'=>$m_caestad_filtro,'m_causreg'=>$m_causreg_filtro,'m_causact'=>$m_causact_filtro])->links()}}
	</div>
	<br>
	<!-- IR A INICIO
	{!! QrCode::size(100)->generate(Request::url('https://www.velotax.com.co/')); !!}
	-->

	<!-- INICIO MODAL: CREAR -->
	<div id="modalcrear" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Encabezado -->
				<div class="modal-header" style="background-color: #3498db">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-check"></span>&nbsp&nbspCREAR ANULACION
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
					@if ($errors->any())
						<script>
							$('#modalcrear').modal('show');
						</script>
						@include('partials.errors')
					@endif
					{!!Form::open(['route'=>'anulaciones.store','class'=>'form-horizontal']) !!}
					@include('admin.programador.anulaciones.form')
				</div>
				<!-- Pie -->
				<div class="modal-footer">
					<div class="text-center">
						<!-- BOTON CANCELAR -->
						<button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCancelar</button>
						<!-- BOTON GUARDAR -->
						<button type="submit" class="btn btn-primary" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspGuardar</button>
					</div>
				</div>
				{!!Form::close() !!}
			</div>
		</div>
	</div>
	<!-- FIN MODAL: CREAR -->

	<!-- INICIO MODAL: EDITAR -->
	<div id="modaleditar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Encabezado -->
				<div class="modal-header" style="background-color: #3498db">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITAR ANULACION
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
	            	<form id="formeditar" class="form-horizontal" method="post">
	            		<input name="_method" type="hidden" value="PUT">
	            		@csrf
						@include('admin.programador.anulaciones.form')
						<!-- Pie -->
						<div class="modal-footer">
							<div class="text-center">
								<!-- BOTON CANCELAR -->
								<button type="button" class="btn btn-warning" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCancelar
								</button>
								<!-- BOTON GUARDAR -->
								<button type="submit" class="btn btn-primary" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspGuardar
								</button>
								<!-- BOTON ELIMINAR -->
								@if(Auth::user()->m_capreel=="SI")
									<a class="btn btn-danger" data-toggle="modal" data-target="#modaleliminar" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-trash" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspEliminar
									</a>
								@else
									<a class="btn btn-warning" data-toggle="modal" data-target="#" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-trash" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspEliminar
									</a>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FIN MODAL: EDITAR -->

	<!-- INICIO MODAL: ELIMINAR -->
	<div id="modaleliminar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header" style="background-color: #ff1a1a">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-trash"></span>&nbsp&nbspELIMINAR ANULACION
	        </h3>
	      </div>
	      <div class="modal-body">
	        <h4 class="modal-title" id="myModalLabel" style="text-align: left; color: #0652DD">Detalle:
	        	<div id="tituloeliminar"></div>
	        </h4>
	        <br>
	        <h4 class="modal-title" id="myModalLabel" style="text-align: left; color: #0652DD">Registro:
	        	<div id="titulodatoregi"></div>
	        </h4>
	        <hr class="separador">
	        <br><br><br>
	        <h4 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="fa fa-bullhorn"></span>&nbsp&nbsp{{Auth::user()->m_caprnom}}&nbsp{{Auth::user()->m_casenom}}<br>&nbsp&nbspEstá seguro de eliminar este Registro?
	        </h4>
	        <br>
			<div class="modal-footer">
		    	<div class="container-fluid">
		    		<div class="row form-group">
		    			<div class="col-md-6">
						<!-- BOTON CANCELAR -->
						<button type="button" class="btn btn-danger" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspNo
						</button>
						</div>
						<div class="col-md-1">
							<!-- BOTON CONFIRMAR ELIMINACION -->
							<form id="formeliminar" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="delete">
								<button class="btn btn-success" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspSi
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- FIN MODAL: ELIMINAR -->

	<!-- INICIO SCRIPT: CONSULTAR -->
	<script>
	    function consultar(id){
	    	//alert(id)
	    	$.ajax({
                url: "anulaciones/"+id+"/edit",
                type: "get",
                success:function(data){
                	$("#modalcrear").attr('disabled','disabled');
                	$("#modalcrear").children().attr("disabled","disabled");
                    console.log(data);
                    $("#formeditar").attr("action","anulaciones/"+id+"");
                    $('#modaleditar #m_canombr').val(data.m_canombr);
                    $('#modaleditar #m_caestad').val(data.m_caestad);
                    $('#modaleditar #m_cacodna').val(data.m_cacodna);
                    $('#modaleditar #m_caaplic').val(data.m_caaplic);
                    $('#modaleditar #m_caanure').val(data.m_caanure);
                    $('#tituloeliminar').html(data.m_canombr + ' - ' + data.m_cacodna);
                    $('#titulodatoregi').html(data.created_at + ' - ' + data.nombre_causreg);
                    $("#formeliminar").attr("action","anulaciones/"+id+"");
                }               
            })     
	    }
		$(".boton").click(function(){
		   $("#m_canombr").focus();
		});
	</script>
	<!-- FIN SCRIPT: CONSULTAR -->

	
	<!-- INICIO MODAL: PROCEDIMIENTOS -->
	<div id="modalprocedimientos" class="modal fade">
  	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<!-- Encabezado -->
			<div class="modal-header" style="background-color: #3498db">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbspPROCEDIMIENTOS ANULACION
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
		    	<div class="container-fluid">
					<object width="100%" height="50px" data="{{ asset('document/anulaciones.pdf') }}"></object>
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
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-filter"></span>&nbsp&nbspFILTROS ANULACION
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
				{!!Form::open(['route'=>'anulaciones.index','method'=>'get'])!!}
		    	<div class="container-fluid">
		    		<!-- CAJA DE TEXTO BUSQUEDA: NOMBRE -->	
		    		<div class="row form-group">
		    			<div class="col-md-3 text-right">
		    				<label class="control-label">Mótivo:</label>
		    			</div>
		    			<div class="col-md-9">
		    				{!! Form::text('m_canombr',null, 
								['placeholder'=>'NOMBRE ANULACION...',
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
		    		<!-- LISTA: PESV -->
		    		<div class="row form-group">
					    <div class="col-md-3 text-right">
					        <label class="control-label">Aplica a:</label>
					    </div>
					    <div class="col-md-9">
							{!! Form::select('m_caaplic',
								['Egresos'=>'Egresos',
								'Encomimendas'=>'Encomiendas',
								'Gastos de Viaje'=>'Gastos de Viaje',
								'Giros Enviados'=>'Giros Enviados',
								'Giros Pagados'=>'Giros Pagados',
								'Ingresos'=>'Ingresos',
								'Libros de Viaje'=>'Libros de Viaje',
								'Notas Crédito'=>'Notas Crédito',
								'Notas Débito'=>'Notas Débito',
								'Planillas de carga'=>'Planillas de Carga',
								'Tiquetes'=>'Tiquetes'], null,
								['placeholder'=>'APLICA A...','class'=>'form-control','id'=>'m_caaplic']) 
							!!}
						</div>
		    		</div>
		    		<!-- LISTA: ANULAR DOCUMENTOS RELACIONADOS -->
		    		<div class="row form-group">
					    <div class="col-md-3 text-right">
					        <label class="control-label">Anular Documentos relacionados:</label>
					    </div>
					    <div class="col-md-9">
							{!! Form::select('m_caanure', ['SI'=>'SI','NO'=>'NO'], null, 
									['placeholder'=>'ANULAR DOCUMENTOS RELACIONADOS...',
									'class'=>'form-control',
									'id'=>'m_caanure'])
							!!}
						</div>
		    		</div>
					<!-- LISTA: ESTADO -->
					<div class="row form-group">
					    <div class="col-md-3 text-right">
					        <label class="control-label">Estado:</label>
					    </div>
					    <div class="col-md-9">
							{!! Form::select('m_caestad', ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'], null, 
									['placeholder'=>'ESTADO...',
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
						<!-- BOTON CERRAR -->
						<button type="button" class="btn btn-warning" href="{{route('anulaciones.index')}}" data-dismiss="modal" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCerrar
						</button>
						<!-- BOTON BUSCAR -->
						<button class="btn btn-success" type="submit" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-search fa-1x" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspBuscar
						</button>
						<!-- BOTON EXPORTAR PDF -->
						@if(Auth::user()->m_capreep=="SI")
							<a class="btn btn-primary boton" type="submit" href="{{ route('anulaciones-pdf') }}" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-pdf-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbsp Exportar PDF
							</a>
						@else
							<a class="btn btn-warning boton" data-toggle="tooltip" title="Propiedad Inactiva" type="submit" href="#" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-pdf-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbsp Exportar PDF
							</a>
						@endif
						<!-- BOTON EXPORTAR HOJA DE CALCULO -->
						@if(Auth::user()->m_capreex=="SI")
							<a class="btn btn-primary boton" type="submit" href="{{ route('anulaciones-excel') }}" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-excel-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbspExportar a hoja de calculo
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
