<!-- CHEQUEA SI HALLO RODAMIENTOS -->
@if($rodamientos_origen!=null)
	<!-- INICIO CONTENIDO: VIAJES DE IDA -->
	<div id="viajes_ida" class="viajesIdaRegreso" style="display:block;">
		<!-- TITULO VIAJES DE IDA --> 
		<div class="container">
		  	<div class="row">
			    <div id="ida_titulo" class="col-sm-12" style="background-color:#3498db; display:block;">
			     	<p style="margin-top: 5px;margin-bottom: 5px;font-size:14px;color:white;text-shadow:2px 2px 4px #000000;">
			     	RESUMEN&nbsp&nbsp&nbsp
			     	VIAJES&nbsp&nbsp&nbsp
			     	DE&nbsp&nbsp&nbsp
			     	IDA&nbsp&nbsp&nbsp
			     	HALLADOS&nbsp&nbsp&nbsp
			     	(&nbsp&nbsp{{count($rodamientos_origen)}}&nbsp&nbsp)
			     	</p>			     				   

			     	<span style="color:white;text-shadow:2px 2px 4px #000000;">TRAYECTO :</span> 
			     	<span class="divCiudadOrigenIda" style="color:white;text-shadow:2px 2px 4px #000000;"></span>
			     	<span class="" style="color:white;text-shadow:2px 2px 4px #000000;"> - </span>  
			     	<span class="divCiudadDestinoIda" style="color:white;text-shadow:2px 2px 4px #000000;"></span>


			     	<div id="viajes_ida_oculto" style="display:none;">
					<div class="form-group">
						<label class="col-sm-3 control-label">Origen:</label>
						<div class="col-sm-9">
							<div class="icon-addon addon-lg">
								{!!Form::text('m_catrori',null, [
										'class'=>'form-control',
										'id'=>'m_catrori',
										'placeholder'=>'ORIGEN...',
										'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
										'title'=>"Nombre Ciudad origen (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
										'maxlength'=>'50',
									]) 
								!!}
								<label for="m_catrori" class="glyphicon glyphicon-wrench" rel="tooltip" title="Trayecto origen">
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Destino:</label>
						<div class="col-sm-9">
							<div class="icon-addon addon-lg">
								{!!Form::text('m_catrdes',null, [
										'class'=>'form-control',
										'id'=>'m_catrdes',
										'placeholder'=>'DESTINO...',
										'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
										'title'=>"Nombre Ciudad destino (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
										'maxlength'=>'50',
									]) 
								!!}
								<label for="m_catrdes" class="glyphicon glyphicon-wrench" rel="tooltip" title="Trayecto destino">
								</label>
							</div>
						</div>
					</div>
					</div>
			    </div>
		  	</div>
		  	<br>
		</div>
		<!-- INICIO TABLA -->
		<!-- VIAJE DE IDA -->
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered">
				<!-- INICIO ENCABEZADO -->
				<thead>
					<tr class="text-center encabezadotb">
						<td>Seleccionar</td>
						<td>¿ Cómo vamos ?</td>
						<td>Código Operación</td>
						<td>Hora</td>
						<td>Ruta</td>
						<td>Vehículo</td>
						<td>Servicio</td>
						<td>Conductor</td>
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
					@foreach($rodamientos_origen as $rodamiento_origen)
						<tr>
							<td>
								<!-- INICIO BOTON SELECCIONAR -->
								@if($rodamiento_origen->tarifa_tiquete_ida>0)
									@if($rodamiento_origen->sillas_vendida_ida<$rodamiento_origen->m_nucapac)
										<a onclick="consultar_rod_origen({{json_encode( $rodamiento_origen )}});"
											id="btnconsultarida"
											class="btn btn-primary"
											data-toggle="modal"
											data-target="#"
											title="Seleccionar rodamiento"
											data-placement="right">
											<i class="fa fa-check"
												style="font-size:18px;text-shadow:2px 2px 4px #000000;">
											</i>
										</a>
										<a onclick="consultar_rod_origen({{json_encode( $rodamiento_origen )}});"
											id="btnconsultarida"
											class="btn btn-success"
											data-toggle="modal"
											data-target="#"
											title="Generar despacho"
											data-placement="right"
											style="border: none; width: 65px; margin-top: 10px">
											<i class="fa fa-external-link"
												style="font-size:20px;text-shadow:2px 2px 4px #000000;">
											</i>
										</a>
									@else
										<a onclick=""
											id="btnconsultarida"
											class="btn btn-success"
											data-toggle="modal"
											data-target="#"
											title="Generar despacho"
											data-placement="right">
											<i class="fa fa-external-link"
												style="font-size:18px;text-shadow:2px 2px 4px #000000;">
											</i>
										</a>
									@endif
								@else
									<a onclick=""
										id="btnconsultarida"
										class="btn btn-warning"
										data-toggle="modal"
										data-target="#"
										title="No tiene tarifa registrada"
										data-placement="right">
										<i class="fa fa-close"
											style="font-size:18px;text-shadow:2px 2px 4px #000000;">
										</i>
									</a>
								@endif
								<!-- FIN BOTON SELECCIONAR -->
							</td>
							<!-- INICIO COMO VAMOS -->
							<td class="text-center">
								<!-- INICIO BOTON 0% -->
								@if(round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)==0)
									<a onclick=""
										class="btn btn-success"
										title="Vacío {{round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)}} %"
										data-placement="right"
										style="background-Color: #000000; border: none; width: 65px">
										<i class="fa fa-battery-0"
											style="font-size:20px;text-shadow:2px 2px 4px #F8F4F4;">
										</i>
									</a>
								@else
									<!-- INICIO BOTON 20% -->
									@if(round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)<=20)
										<a onclick=""
											class="btn btn-success"
											title="Cargando. {{round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)}} %"
											data-placement="right"
											style="background-Color: #F90707; border: none; width: 65px;">
											<i class="fa fa-battery-1"
												style="font-size:20px;text-shadow:2px 2px 4px #000000;">
											</i>
										</a>
									@else
										<!-- INICIO BOTON 40% -->
										@if(round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)<=40)
											<a onclick=""
												class="btn btn-success"
												title="Cargando.. {{round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)}} %"
												data-placement="right"
												style="background-Color: #FF7F27; border: none; width: 65px;">
												<i class="fa fa-battery-2"
													style="font-size:20px;text-shadow:2px 2px 4px #000000;">
												</i>
											</a>
										@else
											<!-- INICIO BOTON 60% -->
											@if(round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)<=60)
												<a onclick=""
													class="btn btn-success"
													title="Cargando... {{round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)}} %"
													data-placement="right"
													style="background-Color: #AA4400; border: none; width: 65px;">
													<i class="fa fa-battery-3"
														style="font-size:20px;text-shadow:2px 2px 4px #000000;">
													</i>
												</a>
											@else
												<!-- INICIO BOTON 95% -->
												@if(round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)<=95)
													<a onclick=""
														class="btn btn-success"
														title="Cargando.... {{round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)}} %"
														data-placement="right"
														style="background-Color: #FFCC00; border: none; width: 65px;">
														<i class="fa fa-battery-4"
															style="font-size:20px;text-shadow:2px 2px 4px #000000;">
														</i>
													</a>
												@else
													<!-- INICIO BOTON 100% -->
													@if(round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)<=100)
														<a onclick=""
															class="btn btn-success"
															title="Excelente {{round($rodamiento_origen->sillas_vendida_ida/$rodamiento_origen->m_nucapac*100,2)}} %"
															data-placement="right"
															style="background-Color: #00A900; border: none; width: 65px;">
															<i class="fa fa-thumbs-o-up"
																style="font-size:20px;text-shadow:2px 2px 4px #000000;">
															</i>
														</a>
													@endif
												@endif
											@endif
										@endif
									@endif
								@endif
							</td>
							<!-- FIN COMO VAMOS -->
							<td>{{$rodamiento_origen->m_nuident}}</td>
							<td class="text-left">{{$rodamiento_origen->m_canomho}}</td>
							<td>{{$rodamiento_origen->m_canomru}}</td>
							<td>{{$rodamiento_origen->m_canuint}} _ {{$rodamiento_origen->m_caplaca}}</td>
							<td>{{$rodamiento_origen->m_canosrv}}</td>
							<td>{{$rodamiento_origen->m_canomc1}}</td>
							<td class="text-center">{{$rodamiento_origen->m_nucapac}}</td>
							<td class="text-center">{{$rodamiento_origen->sillas_vendida_ida}}</td>
							<td class="text-center">{{($rodamiento_origen->m_nucapac - $rodamiento_origen->sillas_vendida_ida)}}</td>
							<td class="text-right">{{number_format($rodamiento_origen->tarifa_tiquete_ida, 2, ",", ".")}}</td>
						</tr>
						<?php $j++; ?>
					@endforeach
				</tbody>
				<!-- FIN CONTENIDO -->
				<!-- $rodamiento_origen->m_nucapac -->
				<!-- $rodamiento_origen->sillas_vendida_ida -->
				<!-- $rodamiento_origen->sillas_disponi_ida -->
				
				{{-- <td>{{$aseguradora->departamentos->m_canombr}}</td>
				<td>{{$aseguradora->paises->m_canombr}}</td> --}}
			</table>
		</div>
		<!-- PAGINADO INFERIOR -->
		{{$rodamientos_origen->appends([
			'm_nucoori'=>$m_nucoori,
			'm_nucodes'=>$m_nucodes,])->links()}}
		<!-- FIN TABLA -->
	</div>
@endif
