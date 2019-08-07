<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Propietarios vehículos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

@extends('template')
@section('title','Propietarios')
@include('sweet::alert')
@include('partials.mensajes')

@section('content')
<!-- MENU ADMINISTRATIVOS: VEHICULOS -->
@include('partials.menu-vehiculos')
	<div class="container text-center">
		<!-- ADMINISTRATIVOS - PROPIETARIOS -->
		<hr class="separador">
    		<h3>PROPIETARIOS</h3>
    	<hr class="separador">

	    <!-- INICIO FORMULARIO DE BOTONES -->
		<div class="row text-center">
			<div class="col-md-5">
				<!-- BOTON REGRESAR -->
		        <a href="{{ route('admin-vehiculos') }}" class="btn btn-primary boton btn-lg" data-toggle="tooltip" title="Regresar...">
		        	<span class="fa fa-mail-reply" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
		        		<font face="verdana" color="White" style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspVEHICULOS</font>
		        	</span>
		        </a>&nbsp&nbsp
	          	<!-- REGISTROS - NUEVO -->
	          	@if(Auth::user()->m_caprenu=="XX")
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
			</div>
			<div class="col-md-3">
				<!-- FORM BOTONES REFRESCAR Y TOTAL REGISTROS -->
				<form action="{{ route('propietarios.index') }}" method="get">
					<!-- ORDENAMIENTO -->
					<!-- ASCENDENTE - DESCENTE -->
					<input type="hidden" name="m_canombr_ordene"
								value="<?php if(isset($_GET['m_canombr_ordene']))
									{ if($_GET['m_canombr_ordene']=="asc")echo "desc";
									if($_GET['m_canombr_ordene']=="desc")echo "asc";}
									else{echo "desc";}?>">
					<!-- NOMBRE CAMPO -->
					<input type="hidden" name="m_canombr_campos" value="<?php if(isset($_GET['m_canombr_campos'])) echo $_GET['m_canombr_campos']; ?>">
					<!-- FILTROS -->
					<input type="hidden" name="m_canombr" value="<?php if(isset($_GET['m_canombr'])) echo $_GET['m_canombr']; ?>">
					<input type="hidden" name="m_cacodna" value="<?php if(isset($_GET['m_cacodna'])) echo $_GET['m_cacodna']; ?>">
					<input type="hidden" name="m_caestad" value="<?php if(isset($_GET['m_caestad'])) echo $_GET['m_caestad']; ?>">
					<input type="hidden" name="m_causreg" value="<?php if(isset($_GET['m_causreg'])) echo $_GET['m_causreg']; ?>">
					<input type="hidden" name="m_causact" value="<?php if(isset($_GET['m_causact'])) echo $_GET['m_causact']; ?>">
					<!-- BOTON ORDENAR DESCENDENTE-->
					@if($m_canombr_ordene=="asc")
						<div class="col-md-4 text-left" style="padding-left: 0px">
							<button class="btn btn-success"
									type="submit"
									data-toggle="tooltip"
									title="Cambiar a Orden Descendente"
									data-placement="bottom"
									style="text-shadow:2px 2px 4px #000000;">
									<i class="glyphicon glyphicon-sort-by-alphabet"
									style="font-size:18px;text-shadow:2px 2px 4px #000000;">
									</i>
							</button>
						</div>
					@else
						<!-- BOTON ORDENAR ASCENDENTE-->
						<div class="col-md-4 text-left" style="padding-left: 0px">
							<button class="btn btn-success"
									type="submit"
									data-toggle="tooltip"
									title="Cambiar a Orden Ascendente"
									data-placement="bottom"
									style="text-shadow:2px 2px 4px #000000;">
									<i class="glyphicon glyphicon-sort-by-alphabet-alt"
									style="font-size:18px;text-shadow:2px 2px 4px #000000;">
									</i>
							</button>
						</div>
					@endif

					<!-- BOTON REFRESCAR - TOTAL REGISTROS -->
					<div class="col-md-5 text-left" style="padding-left: 0px">
						<button 
							class="btn btn-success"
							type="submit"
							style="text-shadow:2px 2px 4px #000000;">
							<i class="fa fa-refresh fa-1x"
								style="font-size:18px;text-shadow:2px 2px 4px #000000;"
								data-toggle="tooltip"
								title="Refrescar pagina">
							</i>&nbsp&nbsp&nbsp(&nbsp&nbspTotal Registros {{count($propietarios)}} de {{$propietarios->total()}}&nbsp&nbsp)
						</button>
					</div>
				</form>
			</div>
			<!-- PAGINADO SUPERIOR -->
			@if($propietarios->total()>160)
				<div class="col-md-12 text-right">
			@else
				<div class="col-md-4 text-right">
			@endif
				{{$propietarios->appends([
				'm_canuipe'=>$m_canuipe_filtro,
				'm_canombr'=>$m_canombr_filtro,
				'm_nucociu'=>$m_nucociu_filtro,
				'm_cadacon'=>$m_cadacon_filtro,
				'm_cacodna'=>$m_cacodna_filtro,
				'm_caestad'=>$m_caestad_filtro,
				'm_causreg'=>$m_causreg_filtro,
				'm_causact'=>$m_causact_filtro,
				'm_canombr_ordene'=>$m_canombr_ordene,
				'm_canombr_campos'=>$m_canombr_campos,])->links()}}
			</div>
		</div>
		<br>
		<!-- FIN FORMULARIO DE BOTONES -->
		<!-- MENSAJES -->
		<!-- INICIO TABLA -->
		<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<!-- INICIO ENCABEZADO -->
			<thead>
				<tr class="text-center encabezadotb">
					<td>Editar</td>
					<td>NUIP</td>
					<td>Propietario</td>
					<td>Dirección</td>
					<td>Ciudad</td>
					<td>Teléfono fijo</td>
					<td>Teléfono móvil</td>					
					<td>Contacto</td>
					<td>Código nacional</td>
					<td>Estado</td>
					<td>Oficina de registro</td>
					<td>Registro</td>
					<td>Usuario</td>
					<td>Actualizado</td>
					<td>Usuario</td>
				</tr>
			</thead>
			<!-- FIN ENCABEZADO -->
			<!-- INICIO CONTENIDO -->
			<tbody>
				<!-- REVISION 12-10-2018 -->
				<?php $j=0; ?>
				@foreach($propietarios as $propietario)
					<tr>
						<td>
							<!-- INICIO BOTON EDITAR -->
							@if(Auth::user()->m_capreed=="SI")
								<a onclick="consultar({{$propietario->m_nucodig}});datosC({{$propietario->m_nucociu}});" id="btneditar" class="btn btn-primary" data-toggle="modal" data-target="#modaleditar" title="Editar registro" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@else
								<a onclick="" id="btneditar" class="btn btn-warning" data-toggle="modal" data-target="#" title="Propiedad Inactiva" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@endif
							<!-- FIN BOTON EDITAR -->
						</td>
						<td class="text-left">{{$propietario->m_canuipe}}</td>
						<td>{{$propietario->m_canombr}}</td>
						<td>{{$propietario->m_cadirec}}</td>
						<td>{{$propietario->ciudades->m_canombr}} - {{$departamento_x[$j]}} - {{$pais_x[$j]}}</td>
						<td>{{$propietario->m_catelfi}}</td>
						<td>{{$propietario->m_camovil}}</td>
						<td>{{$propietario->m_cadacon}}</td>
						<td>{{$propietario->m_cacodna}}</td>
						<td>{{$propietario->m_caestad}}</td>
						<td>{{$propietario->oficina_registro->m_canombr}}</td>
						<td>{{$propietario->created_at}} </td>
						<td>{{$propietario->usuario_registra->name}} </td>
						<td>{{$propietario->updated_at}} </td>
						<td>{{$propietario->usuario_actualiza->name}} </td>
					</tr>
					<?php $j++; ?>
				@endforeach
			</tbody>
			<!-- FIN CONTENIDO -->
			{{-- <td>{{$propietario->departamentos->m_canombr}}</td>
			<td>{{$propietario->paises->m_canombr}}</td> --}}
		</table>
		</div>
		<!-- FIN TABLA -->
		<!-- PAGINADO INFERIOR -->
		{{$propietarios->appends([
			'm_canuipe'=>$m_canuipe_filtro,
			'm_canombr'=>$m_canombr_filtro,
			'm_nucociu'=>$m_nucociu_filtro,
			'm_cadacon'=>$m_cadacon_filtro,
			'm_cacodna'=>$m_cacodna_filtro,
			'm_caestad'=>$m_caestad_filtro,
			'm_causreg'=>$m_causreg_filtro,
			'm_canombr_ordene'=>$m_canombr_ordene,
			'm_canombr_campos'=>$m_canombr_campos,])->links()}}
	</div>

	<!-- INICIO MODAL: CREAR -->
	<div id="modalcrear" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Encabezado -->
				<div class="modal-header" style="background-color: #3498db">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-check"></span>&nbsp&nbspCREAR PROPIETARIO
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
					<!-- ERRORES -->

					{!!Form::open(['route'=>'propietarios.store','class'=>'form-horizontal']) !!}
					@include('admin.vehiculos.propietarios.form')
				</div>
				<!-- Pie -->
				<div class="modal-footer">
					<div class="text-center">
						<!-- BOTON CANCELAR -->
						<a class="btn btn-warning"
							data-dismiss="modal"
							href="#"
							style="text-shadow:2px 2px 4px #000000;">
							<i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCancelar
						</a>
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
	@if(isset($propietario))
		<div id="modaleditar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- Encabezado -->
					<div class="modal-header" style="background-color: #3498db">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITANDO PROPIETARIO
						<div id="tituloeditar"></div>
						</h3>
					</div>
					<!-- Contenido -->
					<div class="modal-body">
						{!!Form::open(['id'=>'formeditar','class'=>'form-horizontal']) !!}
		            		<input name="_method" type="hidden" value="PUT">
		            		<input name="m_id" id="m_id" type="hidden">
							@if (\Session::has('men_reg_edi'))
								<script>
									$('#modaleditar').modal('show');
								</script>
								@include('partials.mensajes')
							@endif
							@include('admin.vehiculos.propietarios.formb')
							<!-- Pie -->
							<div class="modal-footer">
								<div class="text-center">
									<!-- BOTON CANCELAR -->
									<a class="btn btn-warning"
										data-dismiss="modal"
										href="#"
										style="text-shadow:2px 2px 4px #000000;">
										<i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCancelar
									</a>
									<!-- BOTON GUARDAR -->
									<button type="submit" class="btn btn-primary" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspGuardar
									</button>
									<!-- BOTON ELIMINAR -->
									@if(Auth::user()->m_capreel=="SI")
										<a onclick="eliminar()" id="btn btn-danger" class="btn btn-danger" data-toggle="modal" data-target="#modaleditar" title="" data-placement="right"><i class="fa fa-trash" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbspEliminar
										</a>
									@else
										<a class="btn btn-warning" data-toggle="modal" data-target="#" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-trash" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspEliminar
										</a>
									@endif
								</div>
							</div>
						{!!Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	@endif
	<!-- FIN MODAL: EDITAR -->

	<!-- INICIO FUNCION: ELIMINAR --> 
	<script>
		function eliminar() {
			var titulo = $('#modaleditar #m_canombr').val();
			var codigo = $('#modaleditar #m_cacodna').val();
			var id = $('#modaleditar #m_id').val();

			swal({
			  title: 'Eliminar Propietario:',
			  html: ('<b>'+titulo+'</b> <br>'+codigo+'<br><br><br> <span class="fa fa-bullhorn"></span>&nbsp&nbsp {{Auth::user()->m_caprnom}} &nbsp{{Auth::user()->m_casenom}} <br><br> Está @if(Auth::user()->m_catisex=="M") seguro @else segura @endif de eliminar este Registro?<br><form action="propietarios/'+id+'" id="formeliminar" method="post">@csrf<input type="hidden" name="_method" value="delete"><br><br>    <a href="{{route('propietarios.index')}}" class="btn btn-danger btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspNo</a>&nbsp&nbsp    <button class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspSi</button></form>'),
			  type: 'warning',
			  showCancelButton: false,
			  showConfirmButton: false
			}).then((result) => {
			  if (result.value) {
			    swal(
			      'Deleted!',
			      'Your file has been deleted.',
			      'success'
			    )
			  }
			})
		}
	</script>
	<!-- FIN FUNCION: ELIMINAR --> 

	<!-- INICIO FUNCION: CONSULTAR -->
	<script>
	    function consultar(id){
	    	//alert(id)
	    	$.ajax({
                url: "propietarios/"+id+"/edit",
                type: "get",
                success:function(data){
                	$("#modalcrear").attr('disabled','disabled');
                	$("#modalcrear").children().attr("disabled","disabled");
                    console.log(data);
                    $("#formeditar").attr("action","propietarios/"+id+"");
                    $('#modaleditar #m_id').val(data.m_nucodig);
                    $('#modaleditar #m_canuipe').val(data.m_canuipe);
                    $('#modaleditar #m_nudiver').val(data.m_nudiver);
                    $('#modaleditar #m_nutipdo').val(data.m_nutipdo);
                    $('#modaleditar #m_canombr').val(data.m_canombr);
                    $('#modaleditar #m_caprnom').val(data.m_caprnom);
                    $('#modaleditar #m_casenom').val(data.m_casenom);
                    $('#modaleditar #m_caprape').val(data.m_caprape);
                    $('#modaleditar #m_caseape').val(data.m_caseape);
                    $('#modaleditar #m_cadirec').val(data.m_cadirec);
                    $('#modaleditar #m_nucociu').val(data.m_nucociu);
                    $('#modaleditar #m_catelfi').val(data.m_catelfi);
                    $('#modaleditar #m_camovil').val(data.m_camovil);
                    $('#modaleditar #m_casitew').val(data.m_casitew);
                    $('#modaleditar #m_cacorel').val(data.m_cacorel);
                    $('#modaleditar #m_caenvco').val(data.m_caenvco);
                    $('#modaleditar #m_cadacon').val(data.m_cadacon);
                    $('#modaleditar #m_caautna').val(data.m_caautna);
                    $('#modaleditar #m_cacodna').val(data.m_cacodna);
                    $('#modaleditar #m_caestad').val(data.m_caestad);
                    $('#modaleditar #m_fenacim').val(data.m_fenacim);
                    $('#modaleditar #m_nuedada').val(data.m_nuedada);
                    $('#modaleditar #m_catipsa').val(data.m_catipsa);
                    $('#modaleditar #m_catisex').val(data.m_catisex);
                    $('#modaleditar #m_nuofici').val(data.m_nuofici);
                    $('#modaleditar #m_caviemp').val(data.m_caviemp);
                    $('#modaleditar #m_caasoci').val(data.m_caasoci);
                    $('#modaleditar #m_fevinas').val(data.m_fevinas);
                    $('#modaleditar #m_caestas').val(data.m_caestas);
                    $('#modaleditar #m_feestas').val(data.m_feestas);
                    $('#modaleditar #m_cadeeas').val(data.m_cadeeas);
                    $('#modaleditar #m_caorpas').val(data.m_caorpas);
                    $('#modaleditar #m_capropi').val(data.m_capropi);
                    $('#modaleditar #m_fevinpr').val(data.m_fevinpr);
                    $('#modaleditar #m_caestpr').val(data.m_caestpr);
                    $('#modaleditar #m_feestpr').val(data.m_feestpr);
                    $('#modaleditar #m_cadeepr').val(data.m_cadeepr);
                    $('#modaleditar #m_caorppr').val(data.m_caorppr);
                    $('#modaleditar #m_cacondu').val(data.m_cacondu);
                    $('#modaleditar #m_fevinco').val(data.m_fevinco);
                    $('#modaleditar #m_caestco').val(data.m_caestco);
                    $('#modaleditar #m_feestco').val(data.m_feestco);
                    $('#modaleditar #m_cadeeco').val(data.m_cadeeco);
                    $('#modaleditar #m_caorpco').val(data.m_caorpco);
                    $('#modaleditar #m_feinsco').val(data.m_feinsco);
                    $('#modaleditar #m_fetesco').val(data.m_fetesco);
                    $('#modaleditar #m_feincon').val(data.m_feincon);
                    $('#modaleditar #m_nuexper').val(data.m_nuexper);
                    $('#tituloeditar').html(data.m_canombr);
                    $('#tituloeliminar').html(data.m_canuipe + ' - ' + data.m_canombr);
                    $("#formeliminar").attr("action","propietarios/"+id+"");

					//	DOCUMENTOS
					$('#modaleditar #TablaVehiculosPropietarios tbody').empty()
					for(var k in data[1]) {
						
						$('#modaleditar #TablaVehiculosPropietarios tbody')
						    .append($('<tr>')
								.append($('<td>').append($('<button>')
									             .attr('id',data[1][k].m_nucodig+'editarTablaVehiculosPropietarios')
									             .attr('type','button')
									             .attr('class','btn btn-primary')
									             .addClass('fa fa-edit')
									             .attr('style','font-size:18px;text-shadow:2px 2px 4px #000000;')
									             .attr('title','Editar registro')
								               	 .attr('onclick','editarTablaVehiculosPropietarios(this)')
									             .attr('data-myval',JSON.stringify(data[1][k]))
									            )
												 .append($('<button>')
									             .attr('id',data[1][k].m_nucodig+'eliminarTablaVehiculosPropietarios')
									             .attr('type','button')
									             .attr('class','btn btn-danger')
									             .addClass('fa fa-trash')
									             .attr('style','font-size:18px;text-shadow:2px 2px 4px #000000; margin-left: 10px;')
									             .attr('title','Eliminar registro')
									            ))
						       	.append($('<td>').html(data[1][k].m_caplaca))
    							.append($('<td>').html(data[1][k].m_canuint))
						    );
					}

                }               
            })
		}
		$(".boton").click(function(){
		   $("#m_canombr").focus();
		});

		function editartablaVehiculosPropietarios(val) {
  			var dataResult = JSON.parse(val.dataset.myval)
  			$('#modaleditar #m_caplaca').val(dataResult.m_caplaca);
  			$('#modaleditar #m_canuint').val(dataResult.m_canuint);
  			//traer los datos de data-userRegis en ese registro buscar el id y el nombre 
		}

		function datosC(id){
			//alert(id);
			$.ajax({
		        url: "{{route('datos-ciudad')}}",
		        data:{id: id },
		        type: "get",
		        success:function(datados){
		            console.log(datados);
		            $('#modaleditar #datoDepa').val(datados[1]);
		            $('#modaleditar #datoPais').val(datados[2]);
		            $('#modaleditar #datoInd1').val(datados[5]);
		            $('#modaleditar #datoInd2').val(datados[6]);
		            //$('#modaleditar #m_nudiver').val(data.m_nudiver);

		        }               
		    })
		}

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
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbspPROCEDIMIENTOS PROPIETARIO
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
		    	<div class="container-fluid">
					<object width="100%" height="50px" data="{{ asset('document/propietario.pdf') }}"></object>
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
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-filter"></span>&nbsp&nbspFILTROS PROPIETARIO
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
					{!!Form::open(['route'=>'propietarios.index','method'=>'get'])!!}
			    	<div class="container-fluid">
			    		<!-- CAJA DE TEXTO BUSQUEDA: NUIP -->
			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">Nuip:</label>
			    			<div class="col-sm-9">
			    				<div class="icon-addon addon-lg">
				    				{!! Form::text('m_canuipe',null, [
											'class'=>'form-control',
											'id'=>'m_canuipe',
											'placeholder'=>'N° DE IDENTIFICACION PERSONAL...',
											'pattern'=>"[0-9]{5,15}",
											'title'=>"Número único de identificación personal (5 a 15 dígitos)",
											'maxlength'=>'15',
											'onkeyup'=>'this.value=this.value.toUpperCase()'
										]) 
									!!}
									<label for="m_canuipe" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
									</label>
								</div>
			    			</div>
			    		</div>
			    		<!-- CAJA DE TEXTO BUSQUEDA: RAZON SOCIAL -->
			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">Nombre:</label>
			    			<div class="col-md-9">
			    				{!! Form::text('m_canombr',null, [
										'class'=>'form-control',
										'id'=>'m_canombr',
										'placeholder'=>'NOMBRE...',
										'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
										'title'=>"Nombre (5 a 50 caracteres - A-Z 0-9 #-.&/)",
										'maxlength'=>'50',
										'onkeyup'=>'this.value=this.value.toUpperCase()'
									]) 
								!!}
			    			</div>
			    		</div>
			    		<!-- LISTA: CIUDADES -->
						<div class="row form-group">
							<label class="col-sm-3 text-right control-label">Ciudad:</label>
						    <div class="col-md-9">
						    	<div class="icon-addon addon-md">
									{!!Form::select('m_nucociu',$ciudades,null, [
											'class'=>'form-control',
											'id'=>'m_nucociu',
											'placeholder'=>'CIUDAD...',
											'title'=>"Lista de seleccción Ciudades",
										])
									!!}
									<label for="m_nucociu" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad">
									</label>
								</div>
							</div>
						</div>
			    		<!-- CAJA DE TEXTO BUSQUEDA: CONTACTO -->
			    		{{--
 			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">Contacto:</label>
			    			<div class="col-md-9">
			    				<div class="icon-addon addon-md">
				    				{!! Form::text('m_cadacon',null, [
											'class'=>'form-control',
											'id'=>'m_cadacon',
											'placeholder'=>'NOMBRE CONTACTO...',
											'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
											'title'=>"Nombre y apellidos Contacto (5 a 50 caracteres - A-Z 0-9 #-./&)",
											'maxlength'=>'50',
											'onkeyup'=>'this.value=this.value.toUpperCase()'
										]) 
									!!}
									<label for="m_cadacon" class="glyphicon glyphicon-user" rel="tooltip" title="Contacto">
									</label>
								</div>
			    			</div>
			    		</div>
			    		--}}
			    		<!-- CAJA DE TEXTO BUSQUEDA: CODIGO NACIONAL -->
			    		{{--
			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">Código Nacional:</label>
			    			<div class="col-md-9">
			    				<div class="icon-addon addon-md">
				    				{!! Form::text('m_cacodna',null, [
											'class'=>'form-control',
											'id'=>'m_cacodna',
											'placeholder'=>'CODIGO NACIONAL...',
											'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
											'title'=>"Código Nacional (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
											'maxlength'=>'10',
											'onkeyup'=>'this.value=this.value.toUpperCase()'
										]) 
									!!}
									<label for="m_cacodna" class="glyphicon glyphicon-certificate" rel="tooltip" title="Código Nacional">
									</label>
								</div>
			    			</div>
			    		</div>
			    		--}}
						<!-- LISTA: ESTADO -->
						<div class="row form-group">
							<label class="col-sm-3 text-right control-label">Estado:</label>
						    <div class="col-md-9">
						    	<div class="icon-addon addon-md">
									{!! Form::select('m_caestad', ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'], null,[ 
											'class'=>'form-control',
											'id'=>'m_caestad',
											'placeholder'=>'ESTADO...',
											'title'=>"Lista de selección Estado"
										])
									!!}
									<label for="m_caestad" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado">
									</label>
								</div>
							</div>
						</div>
						<!-- LISTA: USUARIO REGISTRA -->
						<div class="row form-group">
							<label class="col-sm-3 text-right control-label">Registrado por:</label>
						    <div class="col-md-9">
						    	<div class="icon-addon addon-md">
									{!! Form::select('m_causreg', $usuarios, null, [
											'class'=>'form-control',
											'id'=>'m_causreg',
											'placeholder'=>'USUARIO...',
											'title'=>"Lista de selección Usuario"
										])
									!!}
									<label for="m_causreg" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Usuario">
									</label>
								</div>
							</div>
						</div>
						<!-- LISTA: USUARIO ACTUALIZA -->
						<div class="row form-group">
							<label class="col-sm-3 text-right control-label">Actualizado por:</label>
						    <div class="col-md-9">
						    	<div class="icon-addon addon-md">
									{!! Form::select('m_causact', $usuarios, null, [
											'class'=>'form-control',
											'id'=>'m_causact',
											'placeholder'=>'USUARIO...',
											'title'=>"Lista de selección Usuario"
										])
									!!}
									<label for="m_causact" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Usuario">
									</label>
								</div>
							</div>
						</div>
						<!-- ORDENAMIENTO -->
						<!-- ASCENDENTE - DESCENTE -->
						<input type="hidden" name="m_canombr_ordene"
										value="<?php if(isset($_GET['m_canombr_ordene']))
											{ if($_GET['m_canombr_ordene']=="asc")echo "asc";
											if($_GET['m_canombr_ordene']=="desc")echo "desc";}
											else{echo "desc";}?>">
						<!-- NOMBRE CAMPO -->
						<input type="hidden" name="m_canombr_campos"
									value="<?php if(isset($_GET['m_canombr_campos']))
										echo $_GET['m_canombr_campos'];
										else{echo "m_canombr";}?>">
			    		<!-- LISTA: ORDENAMIENTOS -->
			    		<div class="row form-group">
							<!-- TITULO ORDENAR ASCENDENTE - DESCENDENTE-->
							@if($m_canombr_ordene=="asc")
								<label 
									class="col-sm-12 text-center control-label"><span class="glyphicon glyphicon-sort-by-alphabet"></span>&nbsp&nbspORDENAMIENTO REGISTROS (Ascendente)
								</label>
							@else
								<label class="col-sm-12 text-center control-label"><span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>&nbsp&nbspORDENAMIENTO REGISTROS (Descendente)
								</label>
							@endif
			    			<label class="col-sm-3 text-right control-label">Columnas:</label>
			    			<div class="col-md-9">
								<div class="icon-addon addon-md">
									{!! Form::select('m_canombr_campos', [
											'm_canuipe'=>'NUIP',
											'm_canombr'=>'Nombre',
											'm_nucociu'=>'Ciudad',
											'm_cadacon'=>'Contacto',
											'm_cacodna'=>'Código nacional',
											'm_caestad'=>'Estado',
											'created_at'=>'Fecha registro',
											'm_causreg'=>'Usuario Registra',
											'updated_at'=>'Fecha actualización',
											'm_causact'=>'Usuario actualiza'], null,[
											'class'=>'form-control',
											'id'=>'m_canombr_campos',
											'placeholder'=>'ORDENAR POR...',
											'title'=>"Lista de selección Ordenamiento"
											]) 
										!!}
									<label for="m_canombr_campos" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ordenamiento">
									</label>
								</div>
							</div>
			    		</div>
			    	</div>
			    </div>
		    	<!-- Pie -->
				<div class="modal-footer">
					<div class="text-center">
						<div class="row text-center">
							<!-- BOTON CANCELAR -->
							<a class="btn btn-warning"
								data-dismiss="modal"
								href="#"
								style="text-shadow:2px 2px 4px #000000;">
								<i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCancelar
							</a>
							<!-- BOTON GENERAR -->
							<button class="btn btn-success" type="submit" style="text-shadow:2px 2px 4px #000000;"><i class="glyphicon glyphicon-export" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspGenerar
							</button>
						</div>
					</div>
				</div>
				{!!Form::close()!!}

				<div class="row">
					<div class="col-md-6 text-right" style="padding-right: 0px">
						<!-- BOTON EXPORTAR PDF -->
						@if(Auth::user()->m_capreep=="SI")
							<form action="{{ route('propietarios-pdf') }}" method="get">
								<!-- ORDENAMIENTO -->
								<!-- ASCENDENTE - DESCENDENTE -->
								<input type="hidden" name="m_canombr_ordene"
												value="<?php if(isset($_GET['m_canombr_ordene']))
													{ if($_GET['m_canombr_ordene']=="asc")echo "asc";
													if($_GET['m_canombr_ordene']=="desc")echo "desc";}
													else{echo "asc";}?>">
								<!-- NOMBRE CAMPO -->
								<input type="hidden" name="m_canombr_campos"
											value="<?php if(isset($_GET['m_canombr_campos']))
												echo $_GET['m_canombr_campos'];
												else{echo "m_canombr";}?>">
								<!-- FILTROS -->
								<input type="hidden" name="m_canuipe" value="<?php if(isset($_GET['m_canuipe'])) echo $_GET['m_canuipe']; ?>">
								<input type="hidden" name="m_canombr" value="<?php if(isset($_GET['m_canombr'])) echo $_GET['m_canombr']; ?>">
								<input type="hidden" name="m_nucociu" value="<?php if(isset($_GET['m_nucociu'])) echo $_GET['m_nucociu']; ?>">
								<input type="hidden" name="m_cadacon" value="<?php if(isset($_GET['m_cadacon'])) echo $_GET['m_cadacon']; ?>">
								<input type="hidden" name="m_cacodna" value="<?php if(isset($_GET['m_cacodna'])) echo $_GET['m_cacodna']; ?>">
								<input type="hidden" name="m_caestad" value="<?php if(isset($_GET['m_caestad'])) echo $_GET['m_caestad']; ?>">
								<input type="hidden" name="m_causreg" value="<?php if(isset($_GET['m_causreg'])) echo $_GET['m_causreg']; ?>">
								<input type="hidden" name="m_causact" value="<?php if(isset($_GET['m_causact'])) echo $_GET['m_causact']; ?>">
								<button
									class="btn btn-primary boton"
									type="submit"
									style="text-shadow:2px 2px 4px #000000;"
									data-toggle="collapse" data-target="#mibarra"
									onclick="avance_tarea()">
									<i class="fa fa-file-pdf-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbsp Exportar PDF
								</button>
							</form>
						@else
							<a class="btn btn-warning boton" data-toggle="tooltip" title="Propiedad Inactiva" type="submit" href="#" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-pdf-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbsp Exportar PDF
							</a>
						@endif
					</div>
					<div class="col-md-6 text-left" style="padding-left: 8px">
						<!-- BOTON EXPORTAR HOJA DE CALCULO -->
						@if(Auth::user()->m_capreex=="SI")
							<form action="{{ route('propietarios-excel') }}" method="get">
								<!-- ORDENAMIENTO -->
								<!-- ASCENDENTE - DESCENDENTE -->
								<input type="hidden" name="m_canombr_ordene"
												value="<?php if(isset($_GET['m_canombr_ordene']))
													{ if($_GET['m_canombr_ordene']=="asc")echo "asc";
													if($_GET['m_canombr_ordene']=="desc")echo "desc";}
													else{echo "asc";}?>">
								<!-- NOMBRE CAMPO -->
								<input type="hidden" name="m_canombr_campos"
											value="<?php if(isset($_GET['m_canombr_campos']))
												echo $_GET['m_canombr_campos'];
												else{echo "m_canombr";}?>">
								<!-- FILTROS -->
								<input type="hidden" name="m_canuipe" value="<?php if(isset($_GET['m_canuipe'])) echo $_GET['m_canuipe']; ?>">
								<input type="hidden" name="m_canombr" value="<?php if(isset($_GET['m_canombr'])) echo $_GET['m_canombr']; ?>">
								<input type="hidden" name="m_nucociu" value="<?php if(isset($_GET['m_nucociu'])) echo $_GET['m_nucociu']; ?>">
								<input type="hidden" name="m_cadacon" value="<?php if(isset($_GET['m_cadacon'])) echo $_GET['m_cadacon']; ?>">
								<input type="hidden" name="m_cacodna" value="<?php if(isset($_GET['m_cacodna'])) echo $_GET['m_cacodna']; ?>">
								<input type="hidden" name="m_caestad" value="<?php if(isset($_GET['m_caestad'])) echo $_GET['m_caestad']; ?>">
								<input type="hidden" name="m_causreg" value="<?php if(isset($_GET['m_causreg'])) echo $_GET['m_causreg']; ?>">
								<input type="hidden" name="m_causact" value="<?php if(isset($_GET['m_causact'])) echo $_GET['m_causact']; ?>">
								<button
									class="btn btn-primary boton"
									type="submit"
									style="text-shadow:2px 2px 4px #000000;"
									data-toggle="collapse" data-target="#mibarra"
									onclick="avance_tarea()">
									<i class="fa fa-file-excel-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbspExportar a hoja de calculo
								</button>
							</form>
						@else
							<a class="btn btn-warning boton" data-toggle="tooltip" title="Propiedad Inactiva" type="submit" href="#" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-file-excel-o fa-1x"style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>&nbsp&nbspExportar a hoja de calculo
							</a>
						@endif					
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-4">
					</div>
					<div class="col-md-5">
						<div id="mibarra" class="collapse">
							<div class="progress">
								<div id="myBar" class="progress-bar"
									style="height:34px;width:0%;min-width:0px;">
								</div>
							</div>
							<p id="registros_porcent01">0%</p>
							<p >Registros</p>
							<p id="registros_procesa01">0</p>
							<p id="registros_restant01">0</p>
						</div>
					</div>
				</div>
				<br>
		    </div>
		</div>
	</div>
	<!-- FIN MODAL: FILTROS -->

	<!-- INICIO FUNCION: BARRA DE PROGRESO -->
	<!-- location.reload(); -->
	<script>

		function avance_tarea() {

		var ele_mys_bar = document.getElementById("myBar");
		var anc_bar_pro = 0;
		var tot_reg_hal = {{$propietarios->total()}};
		var tot_reg_pen = {{$propietarios->total()}};
		var inc_rem_e01 = tot_reg_hal / 20;

		var inc_rem_ent = setInterval(frame, 50);

		function frame() {
		if (anc_bar_pro >= 100 || tot_reg_pen <= 0) {
			clearInterval(inc_rem_ent);
			anc_bar_pro = 0;
			ele_mys_bar.style.width = anc_bar_pro + '%';
			document.getElementById("registros_porcent01").innerHTML = 'Terminado Satisfactoriamente';
			document.getElementById("registros_procesa01").innerHTML = 'Exportados ' + tot_reg_hal;
			document.getElementById("registros_restant01").innerHTML = '';

			
			$('#modalfiltros').modal('hide')

		} else {
		  anc_bar_pro++;
		  tot_reg_pen = tot_reg_pen - 1;
		  ele_mys_bar.style.width = anc_bar_pro + '%';
		  document.getElementById("registros_porcent01").innerHTML = anc_bar_pro * 1  + '% Completado';
		  document.getElementById("registros_procesa01").innerHTML = 'Total ' + tot_reg_hal;
		  document.getElementById("registros_restant01").innerHTML = 'Restantes ' + tot_reg_pen * 1;
				}
			}
		}

	</script>
	<!-- FIN FUNCION: BARRA DE PROGRESO -->

@endsection
