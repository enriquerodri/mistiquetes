@if($rodamientos_destino!=null)
	<div id="viajes_regreso" class="viajesIdaRegreso" style="display:block;">
		<!-- TITULO VIAJES DE REGRESO -->
		<div class="container">
			<div class="row">
				<div id="ida_titulo" class="col-sm-12" style="background-color:#3498db; display:block;">
			     	<p style="margin-top: 5px;margin-bottom: 5px;font-size:14px;color:white;text-shadow:2px 2px 4px #000000;">
			     	RESUMEN&nbsp&nbsp&nbsp
			     	VIAJES&nbsp&nbsp&nbsp
			     	DE&nbsp&nbsp&nbsp
			     	REGRESO&nbsp&nbsp&nbsp
			     	(&nbsp&nbsp{{count($rodamientos_destino)}}&nbsp&nbsp)
			     	</p>

		     		<span style="color:white;text-shadow:2px 2px 4px #000000;">TRAYECTO :</span> 
			     	<span class="divCiudadDestinoRegreso" style="color:white;text-shadow:2px 2px 4px #000000;"></span>
			     	<span class="" style="color:white;text-shadow:2px 2px 4px #000000;"> - </span>  
			     	<span class="divCiudadOrigenRegreso" style="color:white;text-shadow:2px 2px 4px #000000;"></span>
			     	
			    </div>
			  </div>
			  <br>
		</div>
		<!-- INICIO TABLA -->
		<!-- VIAJE DE REGRESO -->
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<!-- INICIO ENCABEZADO -->
				<thead>
					<tr class="text-center encabezadotb">
						<td>Seleccionar</td>
						<td>Hora</td>
						<td>Ruta</td>
						<td>Vehículo</td>
						<td>Placa</td>
						<td>Servicio</td>
						<td>Capacidad</td>
						<td>Sillas vendidas</td>
						<td>Sillas disponibles</td>
						<td>Valor tiquete</td>
					</tr>
				</thead>
				<!-- FIN ENCABEZADO -->
				<!-- INICIO CONTENIDO -->
				<tbody>
					<!-- REVISION 12-10-2018 -->
					<?php $j=0; ?>
					@foreach($rodamientos_destino as $rodamiento_destino)
						<tr>
							<td>
								<!-- INICIO BOTON SELECCIONAR -->
								@if($rodamiento_destino->tarifa_tiquete_reg>0)
									<a onclick="consultar_rod_des({{$rodamiento_destino->m_nuident}});"
										id="btnconsultar"
										class="btn btn-primary"
										data-toggle=""
										data-target="#"
										title="Seleccionar rodamiento"
										data-placement="right">
										<i class="fa fa-check"
											style="font-size:18px;text-shadow:2px 2px 4px #000000;">
										</i>
									</a>
								@else
									<a onclick=""
										id="btnconsultar"
										class="btn btn-warning"
										data-toggle="modal"
										data-target="#"
										title="No tiene tarifa registrada"
										data-placement="right">
										<i class="fa fa-check"
											style="font-size:18px;text-shadow:2px 2px 4px #000000;">
										</i>
									</a>
								@endif
								<!-- FIN BOTON SELECCIONAR -->
							</td>
							<td class="text-left">{{$rodamiento_destino->m_canomho}}</td>
							<td>{{$rodamiento_destino->m_canomru}}</td>
							<td>{{$rodamiento_destino->m_canuint}}</td>
							<td>{{$rodamiento_destino->m_caplaca}}</td>
							<td>{{$rodamiento_destino->m_canosrv}}</td>
							<td class="text-center">{{$rodamiento_destino->m_nucapac}}</td>
							<td class="text-center">{{$rodamiento_destino->sillas_vendida_reg}}</td>
							<td class="text-center">{{$rodamiento_destino->sillas_disponi_reg}}</td>
							<td>{{$rodamiento_destino->tarifa_tiquete_reg}}</td>
						</tr>
						<?php $j++; ?>
					@endforeach
				</tbody>
				<!-- FIN CONTENIDO -->
				{{-- <td>{{$aseguradora->departamentos->m_canombr}}</td>
				<td>{{$aseguradora->paises->m_canombr}}</td> --}}
			</table>
		</div>
		<!-- PAGINADO INFERIOR -->
		{{$rodamientos_destino->appends([
			'm_nucoori'=>$m_nucoori,
			'm_nucodes'=>$m_nucodes,])->links()}}
		<!-- FIN TABLA -->
	</div>
@endif