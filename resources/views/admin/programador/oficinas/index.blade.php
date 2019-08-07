<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Oficinas
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

@extends('template')
@section('title','Oficinas')
@include('sweet::alert')
@include('partials.mensajes')

@section('content')
<!-- MENU ADMINISTRATIVOS: OFICINAS -->
@include('partials.menu-programador')
	<div class="container text-center">
		<!-- ADMINISTRATIVOS - OFICINAS -->
		<hr class="separador">
    		<h3>OFICINAS</h3>
    	<hr class="separador">

	    <!-- INICIO FORMULARIO DE BOTONES -->
		<div class="row text-center">
			<div class="col-md-5">
				<!-- BOTON REGRESAR -->
		        <a href="{{ route('admin-programador') }}" class="btn btn-primary boton btn-lg" data-toggle="tooltip" title="Regresar...">
		        	<span class="fa fa-mail-reply" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
		        		<font face="verdana" color="White" style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspPROGRAMADOR</font>
		        	</span>
		        </a>&nbsp&nbsp
	          	<!-- REGISTROS - NUEVO -->
	          	@if(Auth::user()->m_caprenu=="SI")
	        		<a id="btncrear"
	        			class="btn btn-success"
	        			data-toggle="modal"
	        			data-target="#modalcrear"
	        			onclick="nuevo_preparar_registros()">
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
				<form action="{{ route('oficinas.index') }}" method="get">
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
							</i>&nbsp&nbsp&nbsp(&nbsp&nbspTotal Registros {{count($oficinas)}} de {{$oficinas->total()}}&nbsp&nbsp)
						</button>
					</div>
				</form>
			</div>
			<!-- PAGINADO SUPERIOR -->
			@if($oficinas->total()>160)
				<div class="col-md-12 text-right">
			@else
				<div class="col-md-4 text-right">
			@endif
				{{$oficinas->appends([
				'm_nucecon'=>$m_nucecon_filtro,
				'm_canombr'=>$m_canombr_filtro,
				'm_nucociu'=>$m_nucociu_filtro,
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
					<td>Centro de Costos</td>
					<td>Oficina</td>
					<td>Dirección</td>
					<td>Ciudad</td>
					<td>Teléfono fijo</td>
					<td>Teléfono móvil</td>					
					<td>Jefe</td>
					<td>Revisor</td>
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
				@foreach($oficinas as $oficina)
					<tr>
						<td>
							<!-- INICIO BOTON EDITAR -->
							@if(Auth::user()->m_capreed=="SI")
								<a onclick="consultar({{$oficina->m_nucodig}});datosC({{$oficina->m_nucociu}});" id="btneditar" class="btn btn-primary" data-toggle="modal" data-target="#modaleditar" title="Editar registro" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@else
								<a onclick="" id="btneditar" class="btn btn-warning" data-toggle="modal" data-target="#" title="Propiedad Inactiva" data-placement="right"><i class="fa fa-edit" style="font-size:18px;text-shadow:2px 2px 4px #000000;" ></i>
								</a>
							@endif
							<!-- FIN BOTON EDITAR -->
						</td>
						<td class="text-left">{{$oficina->m_nucecon}}</td>
						<td>{{$oficina->m_canombr}}</td>
						<td>{{$oficina->m_cadirec}}</td>
						<td>{{$oficina->ciudades->m_canombr}} - {{$departamento_x[$j]}} - {{$pais_x[$j]}}</td>
						<td>{{$oficina->m_catelfi}}</td>
						<td>{{$oficina->m_camovil}}</td>
						<td>{{$oficina->jefe_oficina->name}}</td>
						<td>{{$oficina->revisor_oficina->name}}</td>
						<td>{{$oficina->m_caestad}}</td>
						<td>{{$oficina->created_at}} </td>
						<td>{{$oficina->usuario_registra->name}} </td>
						<td>{{$oficina->updated_at}} </td>
						<td>{{$oficina->usuario_actualiza->name}} </td>
					</tr>
					<?php $j++; ?>
				@endforeach
			</tbody>
			<!-- FIN CONTENIDO -->
			{{-- <td>{{$oficina->departamentos->m_canombr}}</td>
			<td>{{$oficina->paises->m_canombr}}</td> --}}
		</table>
		</div>
		<!-- FIN TABLA -->
		<!-- PAGINADO INFERIOR -->
		{{$oficinas->appends([
			'm_nucecon'=>$m_nucecon_filtro,
			'm_canombr'=>$m_canombr_filtro,
			'm_nucociu'=>$m_nucociu_filtro,
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
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-check"></span>&nbsp&nbspCREAR OFICINA
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
					<!-- ERRORES -->

					{!!Form::open(['route'=>'oficinas.store','class'=>'form-horizontal']) !!}
					@include('admin.programador.oficinas.form')
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
	@if(isset($oficina))
		<div id="modaleditar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- Encabezado -->
					<div class="modal-header" style="background-color: #3498db">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITANDO OFICINA
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
							@include('admin.programador.oficinas.formb')
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
			  title: 'Eliminar Oficina:',
			  html: ('<b>'+titulo+'</b> <br>'+codigo+'<br><br><br> <span class="fa fa-bullhorn"></span>&nbsp&nbsp {{Auth::user()->m_caprnom}} &nbsp{{Auth::user()->m_casenom}} <br><br> Está @if(Auth::user()->m_catisex=="M") seguro @else segura @endif de eliminar este Registro?<br><form action="oficinas/'+id+'" id="formeliminar" method="post">@csrf<input type="hidden" name="_method" value="delete"><br><br>    <a href="{{route('oficinas.index')}}" class="btn btn-danger btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspNo</a>&nbsp&nbsp    <button class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspSi</button></form>'),
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
                url: "oficinas/"+id+"/edit",
                type: "get",
                success:function(data){
                	$("#modalcrear").attr('disabled','disabled');
                	$("#modalcrear").children().attr("disabled","disabled");
                    console.log(data);
                    $("#formeditar").attr("action","oficinas/"+id+"");
                    $('#modaleditar #m_id').val(data.m_nucodig);
	                $('#modaleditar #m_nucecon').val(data.m_nucecon);
	                $('#modaleditar #m_canombr').val(data.m_canombr);
	                $('#modaleditar #m_canomco').val(data.m_canomco);
	                $('#modaleditar #m_cadirec').val(data.m_cadirec);
	                $('#modaleditar #m_nucociu').val(data.m_nucociu);
	                $('#modaleditar #m_catelfi').val(data.m_catelfi);
	                $('#modaleditar #m_camovil').val(data.m_camovil);
	                $('#modaleditar #m_cacorel').val(data.m_cacorel);
	                $('#modaleditar #m_nuidjof').val(data.m_nuidjof);
	                $('#modaleditar #m_nuidrev').val(data.m_nuidrev);
	                $('#modaleditar #m_cacoco1').val(data.m_cacoco1);
	                $('#modaleditar #m_cacoco2').val(data.m_cacoco2);
	                $('#modaleditar #m_cacoco3').val(data.m_cacoco3);
	                $('#modaleditar #m_cacoco4').val(data.m_cacoco4);
	                $('#modaleditar #m_cacoco5').val(data.m_cacoco5);
	                $('#modaleditar #m_nucoter').val(data.m_nucoter);
	                $('#modaleditar #m_cacoter').val(data.m_cacoter);
	                $('#modaleditar #m_catoken').val(data.m_catoken);
	                $('#modaleditar #m_caizter').val(data.m_caizter);
	                $('#modaleditar #m_catiofi').val(data.m_catiofi);
	                $('#modaleditar #m_caclofi').val(data.m_caclofi);
	                $('#modaleditar #m_caproce').val(data.m_caproce);
	                $('#modaleditar #m_cacodna').val(data.m_cacodna);
	                $('#modaleditar #m_caestad').val(data.m_caestad);
	                $('#modaleditar #m_causreg').val(data.m_causreg);
	                $('#modaleditar #m_causact').val(data.m_causact);
	                $('#modaleditar #m_caencon').val(data.m_caencon);
	                $('#modaleditar #m_caencob').val(data.m_caencob);
	                $('#modaleditar #m_caencre').val(data.m_caencre);
	                $('#modaleditar #m_caencoi').val(data.m_caencoi);
	                $('#modaleditar #m_cagienv').val(data.m_cagienv);
	                $('#modaleditar #m_cagirec').val(data.m_cagirec);
	                $('#modaleditar #m_caticon').val(data.m_caticon);
	                $('#modaleditar #m_caticre').val(data.m_caticre);
	                $('#modaleditar #m_caticor').val(data.m_caticor);
	                $('#modaleditar #m_catirem').val(data.m_catirem);
	                $('#modaleditar #m_catiweb').val(data.m_catiweb);
	                $('#modaleditar #m_cativip').val(data.m_cativip);
	                $('#modaleditar #m_catides').val(data.m_catides);
	                $('#modaleditar #m_catimic').val(data.m_catimic);
	                $('#modaleditar #m_catires').val(data.m_catires);
	                $('#modaleditar #m_cativig').val(data.m_cativig);
	                $('#modaleditar #m_catiabo').val(data.m_catiabo);
	                $('#modaleditar #m_catidco').val(data.m_catidco);
	                $('#modaleditar #m_cacagdv').val(data.m_cacagdv);
	                $('#modaleditar #m_cacaegr').val(data.m_cacaegr);
	                $('#modaleditar #m_cacaing').val(data.m_cacaing);
	                $('#modaleditar #m_cacancr').val(data.m_cacancr);
	                $('#modaleditar #m_cacandb').val(data.m_cacandb);
	                $('#modaleditar #m_cacadma').val(data.m_cacadma);
	                $('#modaleditar #m_capradp').val(data.m_capradp);
	                $('#modaleditar #m_caprcco').val(data.m_caprcco);
	                $('#modaleditar #m_caprccu').val(data.m_caprccu);
	                $('#modaleditar #m_caprcgd').val(data.m_caprcgd);
	                $('#modaleditar #m_caprigi').val(data.m_caprigi);
	                $('#modaleditar #m_caprtan').val(data.m_caprtan);
	                $('#modaleditar #m_catttab').val(data.m_catttab);
	                $('#modaleditar #m_caprtdv').val(data.m_caprtdv);
	                $('#modaleditar #m_caprtdm').val(data.m_caprtdm);
	                $('#modaleditar #m_caprtcv').val(data.m_caprtcv);
	                $('#modaleditar #m_caprtpp').val(data.m_caprtpp);
	                $('#modaleditar #m_cappdav').val(data.m_cappdav);
	                $('#modaleditar #m_cappdaw').val(data.m_cappdaw);
	                $('#modaleditar #m_capdbal').val(data.m_capdbal);
	                $('#modaleditar #m_capdcam').val(data.m_capdcam);
	                $('#modaleditar #m_capdlhu').val(data.m_capdlhu);
	                $('#modaleditar #m_capdlrf').val(data.m_capdlrf);
	                $('#modaleditar #m_capdlnu').val(data.m_capdlnu);
	                $('#modaleditar #m_cargeco').val(data.m_cargeco);
	                $('#modaleditar #m_cargecb').val(data.m_cargecb);
	                $('#modaleditar #m_cargecr').val(data.m_cargecr);
	                $('#modaleditar #m_cargtco').val(data.m_cargtco);
	                $('#modaleditar #m_cargtcr').val(data.m_cargtcr);
	                $('#modaleditar #m_cargtrm').val(data.m_cargtrm);
	                $('#modaleditar #m_cargtwb').val(data.m_cargtwb);
	                $('#modaleditar #m_carggen').val(data.m_carggen);
	                $('#modaleditar #m_carggpa').val(data.m_carggpa);
	                $('#modaleditar #m_caimrea').val(data.m_caimrea);
	                $('#modaleditar #m_nuimrea').val(data.m_nuimrea);
	                $('#modaleditar #m_caimstb').val(data.m_caimstb);
	                $('#modaleditar #m_nuimstb').val(data.m_nuimstb);
	                $('#modaleditar #m_cacbcgv').val(data.m_cacbcgv);
	                $('#modaleditar #m_cacbceg').val(data.m_cacbceg);
	                $('#modaleditar #m_cacbcin').val(data.m_cacbcin);
	                $('#modaleditar #m_cacbcnc').val(data.m_cacbcnc);
	                $('#modaleditar #m_cacbcnd').val(data.m_cacbcnd);
	                $('#modaleditar #m_cacbeco').val(data.m_cacbeco);
	                $('#modaleditar #m_cacbecb').val(data.m_cacbecb);
	                $('#modaleditar #m_cacbecr').val(data.m_cacbecr);
	                $('#modaleditar #m_cacbeci').val(data.m_cacbeci);
	                $('#modaleditar #m_cacbepc').val(data.m_cacbepc);
	                $('#modaleditar #m_cacbtco').val(data.m_cacbtco);
	                $('#modaleditar #m_cacbtcr').val(data.m_cacbtcr);
	                $('#modaleditar #m_cacbtcs').val(data.m_cacbtcs);
	                $('#modaleditar #m_cacbtrm').val(data.m_cacbtrm);
	                $('#modaleditar #m_cacbtwb').val(data.m_cacbtwb);
	                $('#modaleditar #m_cacbtvp').val(data.m_cacbtvp);
	                $('#modaleditar #m_cacbtlv').val(data.m_cacbtlv);
	                $('#modaleditar #m_cacbpda').val(data.m_cacbpda);
                    $('#tituloeditar').html(data.m_canombr);
                    $('#tituloeliminar').html(data.m_nucecon + ' - ' + data.m_canombr);
                    $("#formeliminar").attr("action","oficinas/"+id+"");

                }               
            })
		}
		$(".boton").click(function(){
		   $("#m_canombr").focus();
		});


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
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbspPROCEDIMIENTOS OFICINA
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
		    	<div class="container-fluid">
					<object width="100%" height="50px" data="{{ asset('document/oficina.pdf') }}"></object>
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
					<h3 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="glyphicon glyphicon-filter"></span>&nbsp&nbspFILTROS OFICINA
					</h3>
				</div>
				<!-- Contenido -->
				<div class="modal-body">
					{!!Form::open(['route'=>'oficinas.index','method'=>'get'])!!}
			    	<div class="container-fluid">
			    		<!-- CAJA DE TEXTO BUSQUEDA: NUIP -->
			    		<div class="row form-group">
			    			<label class="col-sm-3 text-right control-label">Nuip:</label>
			    			<div class="col-sm-9">
			    				<div class="icon-addon addon-lg">
				    				{!! Form::text('m_nucecon',null, [
											'class'=>'form-control',
											'id'=>'m_nucecon',
											'placeholder'=>'N° DE IDENTIFICACION PERSONAL...',
											'pattern'=>"[0-9]{5,15}",
											'title'=>"Número único de identificación personal (5 a 15 dígitos)",
											'maxlength'=>'15',
											'onkeyup'=>'this.value=this.value.toUpperCase()'
										]) 
									!!}
									<label for="m_nucecon" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
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
											'm_nucecon'=>'NUIP',
											'm_canombr'=>'Nombre',
											'm_nucociu'=>'Ciudad',
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
							<form action="{{ route('oficinas-pdf') }}" method="get">
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
								<input type="hidden" name="m_nucecon" value="<?php if(isset($_GET['m_nucecon'])) echo $_GET['m_nucecon']; ?>">
								<input type="hidden" name="m_canombr" value="<?php if(isset($_GET['m_canombr'])) echo $_GET['m_canombr']; ?>">
								<input type="hidden" name="m_nucociu" value="<?php if(isset($_GET['m_nucociu'])) echo $_GET['m_nucociu']; ?>">
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
							<form action="{{ route('oficinas-excel') }}" method="get">
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
								<input type="hidden" name="m_nucecon" value="<?php if(isset($_GET['m_nucecon'])) echo $_GET['m_nucecon']; ?>">
								<input type="hidden" name="m_canombr" value="<?php if(isset($_GET['m_canombr'])) echo $_GET['m_canombr']; ?>">
								<input type="hidden" name="m_nucociu" value="<?php if(isset($_GET['m_nucociu'])) echo $_GET['m_nucociu']; ?>">
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
		var tot_reg_hal = {{$oficinas->total()}};
		var tot_reg_pen = {{$oficinas->total()}};
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

	<script>
		function nuevo_preparar_registros(){
			//alert('ENTRANDO A NUEVO');

	        //	DATOS GENERALES - ACORDEON 02 - MODULOS
	        var dat_nue_000 = "NO";
	        var dat_nue_095 = "";
	        var dat_nue_096 = 169;
	        var dat_nue_097 = "ACTIVO";
	        var dat_nue_098 = 1;
	        var dat_nue_099 = 0;
	        //	CARGA VALORES PREDETERMINADOS
            //	DATOS GENERALES - ACORDEON 02 - MODULOS
            //$('#modalcrear #m_nucecon').val(dat_nue_099);
            $('#modalcrear #m_canombr').val(dat_nue_095);
            $('#modalcrear #m_canomco').val(dat_nue_095);
            $('#modalcrear #m_cadirec').val(dat_nue_095);
            $('#modalcrear #m_nucociu').val(dat_nue_096);
            $('#modalcrear #m_catelfi').val(dat_nue_095);
            $('#modalcrear #m_camovil').val(dat_nue_095);
            $('#modalcrear #m_cacorel').val(dat_nue_095);
            $('#modalcrear #m_nuidjof').val(dat_nue_095);
            $('#modalcrear #m_nuidrev').val(dat_nue_095);
            $('#modalcrear #m_cacoco1').val(dat_nue_095);
            $('#modalcrear #m_cacoco2').val(dat_nue_095);
            $('#modalcrear #m_cacoco3').val(dat_nue_095);
            $('#modalcrear #m_cacoco4').val(dat_nue_095);
            $('#modalcrear #m_cacoco5').val(dat_nue_095);
            $('#modalcrear #m_nucoter').val(dat_nue_095);
            $('#modalcrear #m_cacoter').val(dat_nue_095);
            $('#modalcrear #m_catoken').val(dat_nue_095);
            $('#modalcrear #m_caizter').val(dat_nue_000);
            $('#modalcrear #m_catiofi').val(dat_nue_095);
            $('#modalcrear #m_caclofi').val(dat_nue_095);
            $('#modalcrear #m_caproce').val(dat_nue_095);
            $('#modalcrear #m_cacodna').val(dat_nue_095);
            $('#modalcrear #m_caestad').val(dat_nue_097);
            $('#modalcrear #m_caencon').val(dat_nue_000);
            $('#modalcrear #m_caencob').val(dat_nue_000);
            $('#modalcrear #m_caencre').val(dat_nue_000);
            $('#modalcrear #m_caencoi').val(dat_nue_000);
            $('#modalcrear #m_cagienv').val(dat_nue_000);
            $('#modalcrear #m_cagirec').val(dat_nue_000);
            $('#modalcrear #m_caticon').val(dat_nue_000);
            $('#modalcrear #m_caticre').val(dat_nue_000);
            $('#modalcrear #m_caticor').val(dat_nue_000);
            $('#modalcrear #m_catirem').val(dat_nue_000);
            $('#modalcrear #m_catiweb').val(dat_nue_000);
            $('#modalcrear #m_cativip').val(dat_nue_000);
            $('#modalcrear #m_catides').val(dat_nue_000);
            $('#modalcrear #m_catimic').val(dat_nue_000);
            $('#modalcrear #m_catires').val(dat_nue_000);
            $('#modalcrear #m_cativig').val(dat_nue_000);
            $('#modalcrear #m_catiabo').val(dat_nue_000);
            $('#modalcrear #m_catidco').val(dat_nue_000);
            $('#modalcrear #m_cacagdv').val(dat_nue_000);
            $('#modalcrear #m_cacaegr').val(dat_nue_000);
            $('#modalcrear #m_cacaing').val(dat_nue_000);
            $('#modalcrear #m_cacancr').val(dat_nue_000);
            $('#modalcrear #m_cacandb').val(dat_nue_000);
            $('#modalcrear #m_cacadma').val(dat_nue_000);
            $('#modalcrear #m_capradp').val(dat_nue_000);
            $('#modalcrear #m_caprcco').val(dat_nue_000);
            $('#modalcrear #m_caprccu').val(dat_nue_000);
            $('#modalcrear #m_caprcgd').val(dat_nue_000);
            $('#modalcrear #m_caprigi').val(dat_nue_000);
            $('#modalcrear #m_caprtan').val(dat_nue_000);
            $('#modalcrear #m_catttab').val(dat_nue_000);
            $('#modalcrear #m_caprtdv').val(dat_nue_000);
            $('#modalcrear #m_caprtdm').val(dat_nue_000);
            $('#modalcrear #m_caprtcv').val(dat_nue_000);
            $('#modalcrear #m_caprtpp').val(dat_nue_000);
            $('#modalcrear #m_cappdav').val(dat_nue_000);
            $('#modalcrear #m_cappdaw').val(dat_nue_000);
            $('#modalcrear #m_capdbal').val(dat_nue_000);
            $('#modalcrear #m_capdcam').val(dat_nue_000);
            $('#modalcrear #m_capdlhu').val(dat_nue_000);
            $('#modalcrear #m_capdlrf').val(dat_nue_000);
            $('#modalcrear #m_capdlnu').val(dat_nue_000);
            $('#modalcrear #m_cargeco').val(dat_nue_000);
            $('#modalcrear #m_cargecb').val(dat_nue_000);
            $('#modalcrear #m_cargecr').val(dat_nue_000);
            $('#modalcrear #m_cargtco').val(dat_nue_000);
            $('#modalcrear #m_cargtcr').val(dat_nue_000);
            $('#modalcrear #m_cargtrm').val(dat_nue_000);
            $('#modalcrear #m_cargtwb').val(dat_nue_000);
            $('#modalcrear #m_carggen').val(dat_nue_000);
            $('#modalcrear #m_carggpa').val(dat_nue_000);
            $('#modalcrear #m_caimrea').val(dat_nue_000);
            $('#modalcrear #m_nuimrea').val(dat_nue_000);
            $('#modalcrear #m_caimstb').val(dat_nue_000);
            $('#modalcrear #m_nuimstb').val(dat_nue_000);
            $('#modalcrear #m_cacbcgv').val(dat_nue_000);
            $('#modalcrear #m_cacbceg').val(dat_nue_000);
            $('#modalcrear #m_cacbcin').val(dat_nue_000);
            $('#modalcrear #m_cacbcnc').val(dat_nue_000);
            $('#modalcrear #m_cacbcnd').val(dat_nue_000);
            $('#modalcrear #m_cacbeco').val(dat_nue_000);
            $('#modalcrear #m_cacbecb').val(dat_nue_000);
            $('#modalcrear #m_cacbecr').val(dat_nue_000);
            $('#modalcrear #m_cacbeci').val(dat_nue_000);
            $('#modalcrear #m_cacbepc').val(dat_nue_000);
            $('#modalcrear #m_cacbtco').val(dat_nue_000);
            $('#modalcrear #m_cacbtcr').val(dat_nue_000);
            $('#modalcrear #m_cacbtcs').val(dat_nue_000);
            $('#modalcrear #m_cacbtrm').val(dat_nue_000);
            $('#modalcrear #m_cacbtwb').val(dat_nue_000);
            $('#modalcrear #m_cacbtvp').val(dat_nue_000);
            $('#modalcrear #m_cacbtlv').val(dat_nue_000);
            $('#modalcrear #m_cacbpda').val(dat_nue_000);

		}
	</script>

@endsection
