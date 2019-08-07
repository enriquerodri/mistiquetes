<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Vehiculos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
--> 

@extends('template')
@section('title','Vehículos')
@include('sweet::alert')
@include('partials.mensajes')

@section('content')
<!-- MENU ADMINISTRATIVOS: VEHICULOS -->
@include('partials.menu-vehiculos')
	<div class="container text-center">
		<!-- ADMINISTRATIVOS - VEHICULOS -->
		<hr class="separador">
    		<h3>VEHICULOS</h3>
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
			</div>
			<div class="col-md-3">
				<!-- FORM BOTONES REFRESCAR Y TOTAL REGISTROS -->
				<form action="{{ route('vehiculos.index') }}" method="get">
					<!-- ORDENAMIENTO -->
					<!-- ASCENDENTE - DESCENTE -->
					<input type="hidden" name="m_canuint_ordene"
								value="<?php if(isset($_GET['m_canuint_ordene']))
									{ if($_GET['m_canuint_ordene']=="asc")echo "desc";
									if($_GET['m_canuint_ordene']=="desc")echo "asc";}
									else{echo "desc";}?>">
					<!-- NOMBRE CAMPO -->
					<input type="hidden" name="m_canuint_campos" value="<?php if(isset($_GET['m_canuint_campos'])) echo $_GET['m_canuint_campos']; ?>">
					<!-- FILTROS -->
					<input type="hidden" name="m_canuint" value="<?php if(isset($_GET['m_canuint'])) echo $_GET['m_canuint']; ?>">
					<input type="hidden" name="m_cacodna" value="<?php if(isset($_GET['m_cacodna'])) echo $_GET['m_cacodna']; ?>">
					<input type="hidden" name="m_caestad" value="<?php if(isset($_GET['m_caestad'])) echo $_GET['m_caestad']; ?>">
					<input type="hidden" name="m_causreg" value="<?php if(isset($_GET['m_causreg'])) echo $_GET['m_causreg']; ?>">
					<input type="hidden" name="m_causact" value="<?php if(isset($_GET['m_causact'])) echo $_GET['m_causact']; ?>">
					<!-- BOTON ORDENAR DESCENDENTE-->
					@if($m_canuint_ordene=="asc")
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
							</i>&nbsp&nbsp&nbsp(&nbsp&nbspTotal Registros {{count($vehiculos)}} de {{$vehiculos->total()}}&nbsp&nbsp)
						</button>
					</div>
				</form>
			</div>
			<!-- PAGINADO SUPERIOR -->
			@if($vehiculos->total()>160)
				<div class="col-md-12 text-right">
			@else
				<div class="col-md-4 text-right">
			@endif
				{{$vehiculos->appends([
				'm_caplaca'=>$m_caplaca_filtro,
				'm_canuint'=>$m_canuint_filtro,
				'm_caestad'=>$m_caestad_filtro,
				'm_causreg'=>$m_causreg_filtro,
				'm_causact'=>$m_causact_filtro,
				'm_canuint_ordene'=>$m_canuint_ordene,
				'm_canuint_campos'=>$m_canuint_campos,])->links()}}
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
					<td>Placa</td>
					<td>N° Interno</td>
					<td>Centro de costos</td>
					<td>Modelo</td>
					<td>Estado</td>
					<td>Propietario</td>
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
				@foreach($vehiculos as $vehiculo)
					<tr>
						<td>
							<!-- INICIO BOTON EDITAR -->
							@if(Auth::user()->m_capreed=="SI")
								<a onclick="consultar({{$vehiculo->m_nucodig}});" id="btneditar" class="btn btn-primary" data-toggle="modal" data-target="#modaleditar" title="Editar registro" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@else
								<a onclick="" id="btneditar" class="btn btn-warning" data-toggle="modal" data-target="#" title="Propiedad Inactiva" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@endif
							<!-- FIN BOTON EDITAR -->
						</td>
						<td class="text-left">{{$vehiculo->m_caplaca}}</td>
						<td>{{$vehiculo->m_canuint}}</td>
						<td>{{$vehiculo->m_cacenco}}</td>
						<td>{{$vehiculo->m_numodel}}</td>
						<td>{{$vehiculo->m_caestad}}</td>
						<td>{{$vehiculo->m_caidpac}}</td>
						<td>{{$vehiculo->created_at}} </td>
						<td>{{$vehiculo->usuario_registra->name}} </td>
						<td>{{$vehiculo->updated_at}} </td>
						<td>{{$vehiculo->usuario_actualiza->name}} </td>
					</tr>
					<?php $j++; ?>
				@endforeach
			</tbody>
			<!-- FIN CONTENIDO -->
		</table>
		</div>
		<!-- FIN TABLA -->
		<!-- PAGINADO INFERIOR -->
		{{$vehiculos->appends([
			'm_caplaca'=>$m_caplaca_filtro,
			'm_canuint'=>$m_canuint_filtro,
			'm_caestad'=>$m_caestad_filtro,
			'm_causreg'=>$m_causreg_filtro,
			'm_canuint_ordene'=>$m_canuint_ordene,
			'm_canuint_campos'=>$m_canuint_campos,])->links()}}
	</div>

	<!-- INICIO MODAL: CREAR -->
	<div id="modalcrear" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Encabezado -->
				<div class="modal-header" style="background-color: #3498db">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-check"></span>&nbsp&nbspCREAR VEHICULO
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
					<!-- ERRORES -->

					{!!Form::open(['route'=>'vehiculos.store','class'=>'form-horizontal']) !!}
					@include('admin.vehiculos.vehiculos.vehiculos.form')
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
	@if(isset($vehiculo))
		<div id="modaleditar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- Encabezado -->
					<div class="modal-header" style="background-color: #3498db">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITANDO VEHICULO
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
							@include('admin.vehiculos.vehiculos.vehiculos.formb')
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

	<!-- INICIO FUNCION: ELIMINAR data[0].m_canuint -->   
	<script>
		function eliminar() {
			var titulo = $('#modaleditar #m_canuint').val();
			var codigo = $('#modaleditar #m_cacodna').val();
			var id = $('#modaleditar #m_id').val();

			swal({
			  title: 'Eliminar Vehículo:',
			  html: ('<b>'+titulo+'</b> <br>'+codigo+'<br><br><br> <span class="fa fa-bullhorn"></span>&nbsp&nbsp {{Auth::user()->m_caprnom}} &nbsp{{Auth::user()->m_casenom}} <br><br> Está @if(Auth::user()->m_catisex=="M") seguro @else segura @endif de eliminar este Registro?<br><form action="vehiculos/'+id+'" id="formeliminar" method="post">@csrf<input type="hidden" name="_method" value="delete"><br><br><a href="{{route('vehiculos.index')}}" class="btn btn-danger btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspNo</a>&nbsp&nbsp    <button class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspSi</button></form>'),
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
                url: "vehiculos/"+id+"/edit",
                type: "get",
                success:function(data){
                	$("#modalcrear").attr('disabled','disabled');
                	$("#modalcrear").children().attr("disabled","disabled");
            
                    $("#formeditar").attr("action","vehiculos/"+id+"");
                    $('#modaleditar #m_id').val(data[0].m_nucodig);
                    $('#modaleditar #m_caplaca').val(data[0].m_caplaca);
                    $('#modaleditar #m_canuint').val(data[0].m_canuint);
                    $('#modaleditar #m_cacenco').val(data[0].m_cacenco);
                    $('#modaleditar #m_caestad').val(data[0].m_caestad);
                    $('#modaleditar #m_caviemp').val(data[0].m_caviemp);
                    $('#modaleditar #m_casenom').val(data[0].m_casenom);
                    $('#modaleditar #m_caprape').val(data[0].m_caprape);
                    $('#modaleditar #m_caseape').val(data[0].m_caseape);
                    $('#modaleditar #m_cadirec').val(data[0].m_cadirec);
                    $('#modaleditar #m_nucociu').val(data[0].m_nucociu);
                    $('#modaleditar #m_catelfi').val(data[0].m_catelfi);
                    $('#modaleditar #m_camovil').val(data[0].m_camovil);
                    $('#modaleditar #m_casitew').val(data[0].m_casitew);
                    $('#modaleditar #m_cacorel').val(data[0].m_cacorel);
                    $('#modaleditar #m_caenvco').val(data[0].m_caenvco);
                    $('#modaleditar #m_cadacon').val(data[0].m_cadacon);
                    $('#modaleditar #m_caautna').val(data[0].m_caautna);
                    $('#modaleditar #m_cacodna').val(data[0].m_cacodna);
                    $('#modaleditar #m_caestad').val(data[0].m_caestad);
                    $('#modaleditar #m_fenacim').val(data[0].m_fenacim);
                    $('#modaleditar #m_nuedada').val(data[0].m_nuedada);
                    $('#modaleditar #m_catipsa').val(data[0].m_catipsa);
                    $('#modaleditar #m_catisex').val(data[0].m_catisex);
                    $('#modaleditar #m_nuofici').val(data[0].m_nuofici);
                    $('#modaleditar #m_caviemp').val(data[0].m_caviemp);
                    $('#modaleditar #m_caasoci').val(data[0].m_caasoci);
                    $('#modaleditar #m_fevinas').val(data[0].m_fevinas);
                    $('#modaleditar #m_caestas').val(data[0].m_caestas);
                    $('#modaleditar #m_feestas').val(data[0].m_feestas);
                    $('#modaleditar #m_cadeeas').val(data[0].m_cadeeas);
                    $('#modaleditar #m_caorpas').val(data[0].m_caorpas);
                    $('#modaleditar #m_capropi').val(data[0].m_capropi);
                    $('#modaleditar #m_fevinpr').val(data[0].m_fevinpr);
                    $('#modaleditar #m_caestpr').val(data[0].m_caestpr);
                    $('#modaleditar #m_feestpr').val(data[0].m_feestpr);
                    $('#modaleditar #m_cadeepr').val(data[0].m_cadeepr);
                    $('#modaleditar #m_caorppr').val(data[0].m_caorppr);
                    $('#modaleditar #m_cacondu').val(data[0].m_cacondu);
                    $('#modaleditar #m_fevinco').val(data[0].m_fevinco);
                    $('#modaleditar #m_caestco').val(data[0].m_caestco);
                    $('#modaleditar #m_feestco').val(data[0].m_feestco);
                    $('#modaleditar #m_cadeeco').val(data[0].m_cadeeco);
                    $('#modaleditar #m_caorpco').val(data[0].m_caorpco);
                    $('#modaleditar #m_feinsco').val(data[0].m_feinsco);
                    $('#modaleditar #m_fetesco').val(data[0].m_fetesco);
                    $('#modaleditar #m_feincon').val(data[0].m_feincon);
                    $('#modaleditar #m_nuexper').val(data[0].m_nuexper);
                    $('#modaleditar #m_nucocar').val(data[0].m_nucocar);
                    $('#modaleditar #m_nucogrt').val(data[0].m_nucogrt);
                    $('#modaleditar #m_nucocol').val(data[0].m_nucocol);
                  
                    $('#modaleditar #m_fevehac').val(data[0].m_fevehac);
                    $('#modaleditar #m_camovac').val(data[0].m_camovac);
                    $('#modaleditar #m_caorvco').val(data[0].m_caorvco);
                    $('#modaleditar #m_cavehac').val(data[0].m_cavehac);
                    //$('#modaleditar #m_canuint').val(data[8][0].m_canuint);

                    $('#tituloeditar').html(data[0].m_canuint);
                    $('#tituloeliminar').html(data[0].m_caplaca + ' - ' + data[0].m_canuint);
                    $("#formeliminar").attr("action","vehiculos/"+id+"");

					//	DOCUMENTOS
					$('#modaleditar #tablaDocumentosPersonas tbody').empty()
					for(var k in data[1]) {
						
						$('#modaleditar #tablaDocumentosPersonas tbody')
						    .append($('<tr>')
								.append($('<td>').append($('<button>')
									             .attr('id',data[1][k].m_nucodig+'editarTablaDocumentosPersonas')
									             .attr('type','button')
									             .attr('class','btn btn-primary')
									             .addClass('fa fa-edit')
									             .attr('style','font-size:18px;text-shadow:2px 2px 4px #000000;')
									             .attr('title','Editar registro')
								               	 .attr('onclick','editartablaDocumentosPersonas(this)')
									             .attr('data-myval',JSON.stringify(data[1][k]))
									             .attr('data-usuregdocper',JSON.stringify(data[4]))
									             .attr('data-usuactdocper',JSON.stringify(data[5]))
									            )
												 .append($('<button>')
									             .attr('id',data[1][k].m_nucodig+'eliminarTablaDocumentosPersonas')
									             .attr('type','button')
									             .attr('class','btn btn-danger')
									             .addClass('fa fa-trash')
									             .attr('style','font-size:18px;text-shadow:2px 2px 4px #000000; margin-left: 10px;')
									             .attr('title','Eliminar registro')
									            ))
						       	.append($('<td>').html(data[1][k].m_canombr))
    							.append($('<td>').html(data[1][k].m_feexped))
    							.append($('<td>').html(data[1][k].m_feinici))
    							.append($('<td>').html(data[1][k].m_fevenci))
						    );
					}

					//	SEGUROS
					$('#modaleditar #tablaSegurosPersonas tbody').empty()
					for(var k in data[2]) {
						$('#modaleditar #tablaSegurosPersonas tbody')
						    .append($('<tr>')
								.append($('<td>').append($('<button>')
									             .attr('id',data[2][k].m_nucodig+'tablaSegurosPersonas')
									             .attr('type','button')
									             .attr('class','btn btn-primary')
									             .addClass('fa fa-edit')
									             .attr('style','font-size:18px;text-shadow:2px 2px 4px #000000;')
									             .attr('title','Editar registro')
								               	 .attr('onclick','editarTablaSegurosPersonas(this)')
									             .attr('data-myval',JSON.stringify(data[2][k]))
									             .attr('data-usuregsegper',JSON.stringify(data[6]))
									             .attr('data-usuactsegper',JSON.stringify(data[7]))
									            )
												 .append($('<button>')
									             .attr('id',data[2][k].m_nucodig+'tablaSegurosPersonas')
									             .attr('type','button')
									             .attr('class','btn btn-danger')
									             .addClass('fa fa-trash')
									             .attr('style','font-size:18px;text-shadow:2px 2px 4px #000000; margin-left: 10px;')
									             .attr('title','Eliminar registro')
								               	 .attr('onclick','editarTablaSegurosPersonas(this)')
									             .attr('data-myval',JSON.stringify(data[2][k]))
									            ))
						       	.append($('<td>').html(data[2][k].m_canombr))
    							.append($('<td>').html(data[2][k].m_feexped))
    							.append($('<td>').html(data[2][k].m_feinici))
    							.append($('<td>').html(data[2][k].m_fevenci))
						    );
					}

					//$('#modaleditar #m_nucodiv').val(data[3][0].nombreDivision);
					//$('#modaleditar #m_canuint').val(data[8][0].m_canuint);
					//$('#modaleditar #Prueba34').html(JSON.stringify(data[1]));
                }               
            })
		}
		$(".boton").click(function(){
		   $("#m_canuint").focus();
		});

		function editartablaDocumentosPersonas(val) {
  			var dataResult = JSON.parse(val.dataset.myval)
  			$('#modaleditar #m_nucodig_d').val(dataResult.m_nucodig);
  			$('#modaleditar #m_canombr_d').val(dataResult.m_canombr);
  			$('#modaleditar #m_canumer_d').val(dataResult.m_canumer);
  			$('#modaleditar #m_feexped_d').val(dataResult.m_feexped);
  			$('#modaleditar #m_feinici_d').val(dataResult.m_feinici);
  			$('#modaleditar #m_fevenci_d').val(dataResult.m_fevenci);
  			$('#modaleditar #m_nucocie_d').val(dataResult.m_nucocie);
  			$('#modaleditar #m_cadetal_d').val(dataResult.m_cadetal);
  			$('#modaleditar #m_cacateg_d').val(dataResult.m_cacateg);
  			$('#modaleditar #created_at_d').val(dataResult.created_at);
  			$('#modaleditar #m_causreg_d').val(dataResult.m_causreg);
  			//$('#modaleditar #m_causreg_d').val($('#modaleditar #1editarTablaDocumentosPersonas').data('usuregdocper')[0].name);
  			$('#modaleditar #updated_at_d').val(dataResult.updated_at);
  			//$('#modaleditar #m_causact_d').val($('#modaleditar #1editarTablaDocumentosPersonas').data('usuactdocper')[0].name);
  			$('#modaleditar #m_causact_d').val(dataResult.m_causact);
  			//traer los datos de data-userRegis en ese registro buscar el id y el nombre 
		}

		function editarTablaSegurosPersonas(val) {
  			var dataResult = JSON.parse(val.dataset.myval)
  			$('#modaleditar #m_nucodig_s').val(dataResult.m_nucodig);
  			$('#modaleditar #m_canombr_s').val(dataResult.m_canombr);
  			$('#modaleditar #m_canumer_s').val(dataResult.m_canumer);
  			$('#modaleditar #m_feexped_s').val(dataResult.m_feexped);
  			$('#modaleditar #m_feinici_s').val(dataResult.m_feinici);
  			$('#modaleditar #m_fevenci_s').val(dataResult.m_fevenci);
  			$('#modaleditar #m_nucocie_s').val(dataResult.m_nucocie);
  			$('#modaleditar #m_cadetal_s').val(dataResult.m_cadetal);
  			$('#modaleditar #m_cacateg_s').val(dataResult.m_cacateg);
  			$('#modaleditar #created_at_s').val(dataResult.created_at);
  			$('#modaleditar #updated_at_s').val(dataResult.updated_at);
  			$('#modaleditar #m_causreg_s').val(dataResult.m_causreg);
  			$('#modaleditar #m_causact_s').val(dataResult.m_causact);
  			//$('#modaleditar #m_causreg_s').val($('#modaleditar #1editarTablaSegurosPersonas').data('usuregsegper')[0].name);
  			//$('#modaleditar #m_causact_s').val($('#modaleditar #1editarTablaSegurosPersonas').data('usuactsegper')[0].name);
		}

		function datosC(id){
			//alert(id);
			$.ajax({
		        url: "{{route('datos-ciudad')}}",
		        data:{id: id },
		        type: "get",
		        success:function(datados){
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
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbspPROCEDIMIENTOS VEHICULO
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
		    	<div class="container-fluid">
					<object width="100%" height="50px" data="{{ asset('document/vehiculo.pdf') }}"></object>
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
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-filter"></span>&nbsp&nbspFILTROS VEHICULO
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
					{!!Form::open(['route'=>'vehiculos.index','method'=>'get'])!!}
			    	<div class="container-fluid">
			    		<!-- CAJA DE TEXTO BUSQUEDA: PLACA -->
			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">Placa:</label>
			    			<div class="col-sm-9">
			    				<div class="icon-addon addon-lg">
				    				{!! Form::text('m_caplaca',null, [
											'class'=>'form-control',
											'id'=>'m_caplaca',
											'placeholder'=>'N° DE PLACA...',
											'pattern'=>"[A-Z 0-9 -]{6,10}",
											'title'=>"Número único de Placa (6 a 10 dígitos)",
											'maxlength'=>'10',
											'onkeyup'=>'this.value=this.value.toUpperCase()'
										]) 
									!!}
									<label for="m_caplaca" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
									</label>
								</div>
			    			</div>
			    		</div>
			    		<!-- CAJA DE TEXTO BUSQUEDA: RAZON SOCIAL -->
			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">N° Interno:</label>
			    			<div class="col-md-9">
			    				{!! Form::text('m_canuint',null, [
										'class'=>'form-control',
										'id'=>'m_canuint',
										'placeholder'=>'N° INTERNO...',
										'pattern'=>"[A-Z 0-9 -]{1,20}",
										'title'=>"Número Interno (1 a 20 caracteres - A-Z 0-9 -)",
										'maxlength'=>'50',
										'onkeyup'=>'this.value=this.value.toUpperCase()'
									]) 
								!!}
			    			</div>
			    		</div>
			    		<!-- CAJA DE TEXTO BUSQUEDA: CENTRO DE COSTOS -->
			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">Centro Costos:</label>
			    			<div class="col-md-9">
			    				{!! Form::text('m_cacenco',null, [
										'class'=>'form-control',
										'id'=>'m_cacenco',
										'placeholder'=>'CENTRO DE COSTOS...',
										'pattern'=>"[A-Z 0-9 -]{1,20}",
										'title'=>"Centro de Costos (1 a 20 caracteres - A-Z 0-9 -)",
										'maxlength'=>'50',
										'onkeyup'=>'this.value=this.value.toUpperCase()'
									]) 
								!!}
			    			</div>
			    		</div>
						<!-- LISTA: ESTADO -->
						<div class="row form-group">
							<label class="col-sm-3 text-right control-label">Estado:</label>
						    <div class="col-md-9">
						    	<div class="icon-addon addon-md">
									{!! Form::select('m_caestad',
											['ACTIVO'=>'ACTIVO',
											'INACTIVO'=>'INACTIVO',
											'RETIRADO'=>'RETIRADO',], null,[ 
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
						<input type="hidden" name="m_canuint_ordene"
										value="<?php if(isset($_GET['m_canuint_ordene']))
											{ if($_GET['m_canuint_ordene']=="asc")echo "asc";
											if($_GET['m_canuint_ordene']=="desc")echo "desc";}
											else{echo "desc";}?>">
						<!-- NOMBRE CAMPO -->
						<input type="hidden" name="m_canuint_campos"
									value="<?php if(isset($_GET['m_canuint_campos']))
										echo $_GET['m_canuint_campos'];
										else{echo "m_canuint";}?>">
			    		<!-- LISTA: ORDENAMIENTOS -->
			    		<div class="row form-group">
							<!-- TITULO ORDENAR ASCENDENTE - DESCENDENTE-->
							@if($m_canuint_ordene=="asc")
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
									{!! Form::select('m_canuint_campos', [
											'm_caplaca'=>'PLACA',
											'm_canuint'=>'N° Interno',
											'm_cacenco'=>'Centro de Costos',
											'm_caestad'=>'Estado',
											'created_at'=>'Fecha registro',
											'm_causreg'=>'Usuario Registra',
											'updated_at'=>'Fecha actualización',
											'm_causact'=>'Usuario actualiza'], null,[
											'class'=>'form-control',
											'id'=>'m_canuint_campos',
											'placeholder'=>'ORDENAR POR...',
											'title'=>"Lista de selección Ordenamiento"
											]) 
										!!}
									<label for="m_canuint_campos" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ordenamiento">
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
							<form action="{{ route('vehiculos-pdf') }}" method="get">
								<!-- ORDENAMIENTO -->
								<!-- ASCENDENTE - DESCENDENTE -->
								<input type="hidden" name="m_canuint_ordene"
												value="<?php if(isset($_GET['m_canuint_ordene']))
													{ if($_GET['m_canuint_ordene']=="asc")echo "asc";
													if($_GET['m_canuint_ordene']=="desc")echo "desc";}
													else{echo "asc";}?>">
								<!-- NOMBRE CAMPO -->
								<input type="hidden" name="m_canuint_campos"
											value="<?php if(isset($_GET['m_canuint_campos']))
												echo $_GET['m_canuint_campos'];
												else{echo "m_canuint";}?>">
								<!-- FILTROS -->
								<input type="hidden" name="m_caplaca" value="<?php if(isset($_GET['m_caplaca'])) echo $_GET['m_caplaca']; ?>">
								<input type="hidden" name="m_canuint" value="<?php if(isset($_GET['m_canuint'])) echo $_GET['m_canuint']; ?>">
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
							<form action="{{ route('vehiculos-excel') }}" method="get">
								<!-- ORDENAMIENTO -->
								<!-- ASCENDENTE - DESCENDENTE -->
								<input type="hidden" name="m_canuint_ordene"
												value="<?php if(isset($_GET['m_canuint_ordene']))
													{ if($_GET['m_canuint_ordene']=="asc")echo "asc";
													if($_GET['m_canuint_ordene']=="desc")echo "desc";}
													else{echo "asc";}?>">
								<!-- NOMBRE CAMPO -->
								<input type="hidden" name="m_canuint_campos"
											value="<?php if(isset($_GET['m_canuint_campos']))
												echo $_GET['m_canuint_campos'];
												else{echo "m_canuint";}?>">
								<!-- FILTROS -->
								<input type="hidden" name="m_caplaca" value="<?php if(isset($_GET['m_caplaca'])) echo $_GET['m_caplaca']; ?>">
								<input type="hidden" name="m_canuint" value="<?php if(isset($_GET['m_canuint'])) echo $_GET['m_canuint']; ?>">
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
		var tot_reg_hal = {{$vehiculos->total()}};
		var tot_reg_pen = {{$vehiculos->total()}};
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
