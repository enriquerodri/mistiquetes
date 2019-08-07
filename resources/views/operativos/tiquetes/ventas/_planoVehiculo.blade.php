<style>

</style>

<div class="row claseIda">
	<div class="col-sm-4 contenedorVehiculoIda">
        <div class="row form-group"
        	style="margin-left: -25px;margin-bottom: 0px;">
			<label class="col-sm-12 control-label" style="text-align: center; font-size: 14px;"><b>VEHICULO DE IDA</b>
			</label>
		</div>
		<table align="center" id="tablaPlanoVehiculoIda" width="90%">		
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="form-group">
	<div class="col-sm-4">
		<ul>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-12 control-label" style="text-align: center; font-size: 14px;"><b>VIAJE DE IDA</b>
				</label>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-3 control-label" style="text-align: right">Fecha:</label>
				<div class="col-sm-9">
					<b><li id="fechaSalidaIda" style="text-align: left"></li></b>
				</div>
			</div>
            <div class="row form-group"
	            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-3 control-label" style="text-align: right">Hora:</label>
				<div class="col-sm-9">
					<b><li id="horaSalidaIda" style="text-align: left"></li></b>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<a class="col-sm-3 control-label"
					id="mapa_ruta_ida"
					style="font-size:14px; color: black" 
					href="#"
					target="_blank">
					<img src="{{ asset('images/flaticon-png/small/mis_rutas_01.png') }}" width="20" alt=""><b>&nbsp&nbspRuta:</b>
				</a>
				<div class="col-sm-9">
					<li id="rutaSalidaIda" style="text-align: left"></li>
				</div>
			</div>
			<!-- NOMBRE RUTA OCULTO -->
			<div class="form-group" style="display:none;">
				<a class="col-sm-2 control-label"
					id="mapa_ruta_ida"
					style="font-size:16px; color: black" 
					href="#"
					target="_blank">
					<img src="{{ asset('images/flaticon-png/small/mapa_ruta_02.jpg') }}" width="30" alt=""><b>&nbsp&nbspRuta:</b>
				</a>
				<div class="col-sm-10">
					<div class="icon-addon addon-lg">
						{!!Form::text('m_camapas_rutaida',null, [
								'class'=>'form-control',
								'id'=>'m_camapas_rutaida',
								'required'=>'required',
								'placeholder'=>'MAPA RUTA...',
								'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
								'title'=>"Marca (5 a 200 caracteres - A-Z Ñ 0-9 #-_.&/)",
								'readonly'=>'readonly',
								'style'=>'background-color:#fcfdff; color:#000105',
								'maxlength'=>'50'
							]) 
						!!}
						<label for="m_camapas_rutaida" class="fa fa-road" rel="tooltip" title="Ruta">
						</label>
					</div>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<a class="col-sm-3 control-label"
					id="mapa_trayecto_ida"
					style="font-size:14px; color: black" 
					href="#"
					target="_blank">
					<img src="{{ asset('images/flaticon-png/small/mis_rutas_03.png') }}" width="20" alt=""><b>&nbsp&nbspTray:</b>
				</a>
				<div class="col-sm-9">
					<li id="trayectoSalidaIda" style="text-align: left" title=" Trayecto "></li>
				</div>
			</div>
			<!-- NOMBRE TRAYECTO OCULTO -->
			<div class="form-group" style="display:none;">
				<a class="col-sm-2 control-label"
					id="mapa_trayecto_ida"
					style="font-size:16px; color: black" 
					href="#"
					target="_blank">
					<img src="{{ asset('images/flaticon-png/small/mapa_ruta_02.jpg') }}" width="30" alt=""><b>&nbsp&nbspTrayecto:</b>
				</a>
				<div class="col-sm-10">
					<div class="icon-addon addon-lg">
						{!!Form::text('m_camapas_trayectoida',null, [
								'class'=>'form-control',
								'id'=>'m_camapas_trayectoida',
								'required'=>'required',
								'placeholder'=>'MAPA TRAYECTO...',
								'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
								'title'=>"Marca (5 a 200 caracteres - A-Z Ñ 0-9 #-_.&/)",
								'readonly'=>'readonly',
								'style'=>'background-color:#fcfdff; color:#000105',
								'maxlength'=>'50'
							]) 
						!!}
						<label for="m_camapas_trayectoida" class="fa fa-road" rel="tooltip" title="Ruta">
						</label>
					</div>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px; margin-top: 10px">
				<label class="col-sm-3 control-label" style="text-align: right">Vehículo:</label>
				<div class="col-sm-9">
					<li id="vehiculoSalidaIda" style="text-align: left"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-3 control-label" style="text-align: right">Servicio:</label>
				<div class="col-sm-9">
					<li id="servicioVehiculoIda" style="text-align: left"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-3 control-label" style="text-align: right">Conduc 1:</label>
				<div class="col-sm-9">
					<li id="nombreConductor1Ida" style="text-align: left"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-3 control-label" style="text-align: right">Conduc 2:</label>
				<div class="col-sm-9">
					<li id="nombreConductor2Ida" style="text-align: left"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-12 control-label" style="text-align: center; font-size: 14px;"><b>RESUMEN SILLETERIA</b>
				</label>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_22.png') }}"
		            	width="30px">
		            	&nbspCapacidad:
	            </div>
				<div class="col-sm-7">
					<li id="capacidadVehiculoIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_21.jpg') }}"
		            	width="30px">
		            	&nbspSillas vendidas:
	            </div>
				<div class="col-sm-7">
					<li id="sillasVendidasIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_1.png') }}"
		            	width="30px">
		            	&nbspDisponibles:
	            </div>
				<div class="col-sm-7">
					<li id="sillasPorVenderIda"></li>
				</div>
			</div>
            <div class="row form-group" id="sillasLocalesIda_row" hidden="hidden"
	        	style="margin-left: -25px;margin-bottom: 5px;">
	        	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_2.png') }}"
		            	width="30px">
		            	&nbspLocal:
	            </div>
				<div class="col-sm-7">
					<li id="sillasLocalesIda"></li>
				</div>
			</div>
            <div class="row form-group" id="sillasConveniIda_row" hidden="hidden"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_9.png') }}"
		            	width="30px">
		            	&nbspConvenio:
	            </div>
				<div class="col-sm-7">
					<li id="sillasConveniIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_3.png') }}"
		            	width="30px">
		            	&nbspCortesía:
	            </div>
				<div class="col-sm-7">
					<li id="sillasCortesiIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_4.png') }}"
		            	width="30px">
		            	&nbspCrédito:
	            </div>
				<div class="col-sm-7">
					<li id="sillasCreditoIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_10.png') }}"
		            	width="30px">
		            	&nbspReserva:
	            </div>
				<div class="col-sm-7">
					<li id="sillasReservaIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_5.png') }}"
		            	width="30px">
		            	&nbspRevertido:
	            </div>
				<div class="col-sm-7">
					<li id="sillasRevertiIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_8.png') }}"
		            	width="30px">
		            	&nbspVip:
	            </div>
				<div class="col-sm-7">
					<li id="sillasVipvtasIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 5px;">
            	<div class="col-sm-5" style="text-align: left;">
		            <img src="{{ asset('images/flaticon-png/small/sc_7.png') }}"
		            	width="30px">
		            	&nbspWeb:
	            </div>
				<div class="col-sm-7">
					<li id="sillasWebvtasIda"></li>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-12 control-label" style="text-align: center; font-size: 14px;"><b>DETALLES VENTA</b>
				</label>
			</div>
            <!-- VALOR UNITARIO IDA MUESTRA -->
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Valor Unitario:</b></label>
				<div class="col-sm-7">
					<b><li id="valorTiqueteIdaMuestra" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
            <!-- VALOR UNITARIO IDA PROCESA -->
            <div class="row form-group" hidden="hidden"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Valor Unitario:</b></label>
				<div class="col-sm-7">
					<b><li id="valorTiqueteIda" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
            <!-- TARIFA MINIMA IDA MUESTRA -->
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Tarifa mínima:</b></label>
				<div class="col-sm-7">
					<b><li id="valorMinimoTiqueteIdaMuestra" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
            <!-- TARIFA MINIMA IDA PROCESA -->
            <div class="row form-group" hidden="hidden"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Tarifa mínima:</b></label>
				<div class="col-sm-7">
					<b><li id="valorMinimoTiqueteIda" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Cantidad:</b></label>
				<div class="col-sm-7">
					<b><li id="CantidadTiqueteIda" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
			<!-- TOTAL VENTA IDA MUESTRA -->
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Total Venta:</b></label>
				<div class="col-sm-7">
					<b><li id="valorTotalTiquetesIdaMuestra" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
			<!-- TOTAL VENTA IDA PROCESA -->
            <div class="row form-group" hidden="hidden"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Total Venta:</b></label>
				<div class="col-sm-7">
					<b><li id="valorTotalTiquetesIda" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
			<!-- VALOR MAXIMO DESCUENTO IDA MUESTRA -->
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Vr. máx. dcto:</b></label>
				<div class="col-sm-7">
					<b><li id="valorMaximoDescuentoTiquetesIdaMuestra" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
			<!-- VALOR MAXIMO DESCUENTO IDA PROCESA -->
            <div class="row form-group" hidden="hidden"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Vr. máx. dcto:</b></label>
				<div class="col-sm-7">
					<b><li id="valorMaximoDescuentoTiquetesIda" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
			<!-- VALOR DESCUENTO IDA MUESTRA -->
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
            	<div class="col-sm-6"
            		style="text-align: left; cursor: pointer; font-size: 18px; font-weight: bold;"
            		title="Clic aquí para registrar descuento">
		            <img src="{{ asset('images/flaticon-png/small/descuento_activo_01.png') }}"
		            	width="30px"
		            	onclick="mostrar_descuento(this.id)">
		            	&nbspDescuento:
	            </div>
				<div class="col-sm-6">
					<b><li id="vrDescuentoIdaMuestra" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
			<!-- VALOR DESCUENTO IDA PROCESA -->
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b></b></label>
				<div class="col-sm-7">
					<input type="text"
							id="vrDescuentoIda"
							style="font-weight:bold; font-size: 18px; text-align: right; margin-left: -5px;"
							hidden="hidden">
				</div>
			</div>
            <!-- VALOR NETO IDA MUESTRA -->
            <div class="row form-group"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Vr. neto:</b></label>
				<div class="col-sm-7">
					<b><li id="valorNetoTiquetesIdaMuestra" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
            <!-- VALOR NETO IDA PROCESA -->
            <div class="row form-group" hidden="hidden"
            	style="margin-left: -25px;margin-bottom: 0px;">
				<label class="col-sm-5 control-label" style="text-align: right; font-size: 18px;"><b>Vr. neto:</b></label>
				<div class="col-sm-7">
					<b><li id="valorNetoTiquetesIda" style="text-align: right; font-size: 18px;"></li></b>
				</div>
			</div>
		</ul>
	</div>
	</div>

	<div class="col-sm-4">
		<div >
			<!-- TODO: utilizar este plugins para poner un scroll vertical de una medida fija http://webapplayers.com/inspinia_admin-v2.9.2/js/plugins/slimscroll/jquery.slimscroll.min.js-->
			<form class="scrollPasajeros">
				<input type="text" name="sillaActualFocus" id="sillaActualFocus" value="">
				<input type="text" name="sillaSeleccionadasIda" id="sillaSeleccionadasIda" value="">

				<div id="numeroViajeros">				 		
				</div>

				<div id="numeroViajerosBtnEnviar">
				</div>
			 
			</form>

		</div> 
	</div>

</div>
<div class="row claseRegreso">
	<div class="col-sm-4 contenedorVehiculoIda">
        <div class="row form-group"
        	style="margin-left: -25px;margin-bottom: 0px;">
			<label class="col-sm-12 control-label" style="text-align: center; font-size: 14px;"><b>VEHICULO DE REGRESO</b>
			</label>
		</div>
	</div>

</div>


<script type="text/javascript">
	function consultar_rod_origen(obj){
	

		//	1- FECHA RODAMIENTO
		//var fecha_rod_ori = new Date('2019-09-25');
		var fecha_rod_ori = new Date(obj.m_feferod);
		var fecha_rod_con = fecha_rod_ori.setMinutes(fecha_rod_ori.getMinutes() + fecha_rod_ori.getTimezoneOffset())
		//	2- FECHA HOY
		var fecha_hoy_ori = new Date();
		var fecha_hoy_con = fecha_hoy_ori.setMinutes(fecha_hoy_ori.getMinutes() + fecha_hoy_ori.getTimezoneOffset())
		//	3- OBTIENE RESULTADOS
		var fecha_tex_tie = "Futuro "
		var fecha_res_tbo = fecha_hoy_con - fecha_rod_con
		//var fecha_res_obt = parseInt(Math.round(fecha_res_tbo/(1000*60*60*24)))
		//var fecha_res_obt = Number(fecha_res_tbo/(1000*60*60*24))
		var fecha_res_obt = Number(fecha_res_tbo/(1000*60*60*24))

		//	4- VALIDA RESULTADOS
		if (fecha_res_obt > 2) {
			//	MAS DE 2 DIAS DE ANTERIORIDAD
			var fecha_tex_tie = "ERROR! - FECHA DE VIAJE NO VALIDA - "
		} else {
			if (fecha_res_obt == 2) {
				//	FECHA DE AYER
				var fecha_tex_tie = "Ayer "
			} else {
				if (fecha_res_obt > 0  && fecha_res_obt < 2) {
					//	FECHA DE HOY
					var fecha_tex_tie = "Hoy "
					//alert(fecha_tex_tie)
				} else {
					if (fecha_res_obt == 0) {
						//	FECHA DE MAÑANA
						var fecha_tex_tie = "Mañana "
					} else {
						if (fecha_res_obt <= -1) {
							//	CUALQUIER DIA LUEGO DE MAÑANA
							var fecha_tex_tie = "Próximo "
						} else {
							//	NO PUEDE PASAR PERO...
							var fecha_tex_tie = "ERROR! ERROR! "
						}
					}
				}
			}
		}
		
		var meses = [
		"Enero", "Febrero", "Marzo",
		"Abril", "Mayo", "Junio", "Julio",
		"Agosto", "Septiembre", "Octubre",
		"Noviembre", "Diciembre"
		]

		var dias = [
		"Domingo", "Lunes", "Martes",
		"Miércoles", "Jueves", "Viernes", "Sábado"
		]

		//var fecha_orig = new Date('2019-09-25');
		var fecha_orig = new Date(obj.m_feferod);
		var fecha_conv = fecha_orig.setMinutes(fecha_orig.getMinutes() + fecha_orig.getTimezoneOffset())
		var date = new Date(fecha_conv);
		var dia = date.getDate();
		var diah = date.getDay();
		var mes = date.getMonth();
		var yyy = date.getFullYear();
		var fecha_formateada = fecha_tex_tie + dias[diah] + ', ' + dia + ' de ' + meses[mes] + ' del ' + yyy;
		$("#fechaSalidaIda").html(fecha_formateada)
		//$("#fechaSalidaIda").html(obj.m_feferod)
		$("#horaSalidaIda").html(obj.m_canomho)
		$("#rutaSalidaIda").html(obj.m_canomru)
		//	OBTIENE RUTA
		var dato_05 = obj.m_canomru
	    //	REEMPLAZA - POR /
	    var dato_60 = dato_05.replace(/[-]/gi,'/')
	    //	ASIGNA MAPA RUTA
		$("#m_camapas_rutaida").val(dato_60);
		//	ETIQUETA RUTA
		$('#mapa_ruta_ida').attr({
		   'title': 'RUTA: ' + dato_05,
		   'href': "https://www.google.com/maps/dir/" + dato_60,
		   'style': 'color: #ED7A44; font-size:14px;'
		});

		//	TRAYECTO
		var tra_ida_ori = $(".divCiudadOrigenIda").text()
		var tra_ida_des = $(".divCiudadDestinoIda").text()
		//	OBTIENE TRAYECTO
		var tra_ida_oyd = tra_ida_ori + ' - ' + tra_ida_des
		var dato_70 = tra_ida_oyd
		$("#trayectoSalidaIda").html(tra_ida_oyd)
	    //	REEMPLAZA - POR /
	    var dato_80 = dato_70.replace(/[-]/gi,'/')
	    //	ASIGNA MAPA TRAYECTO
		$("#m_camapas_trayectoida").val(dato_80);
		//	ETIQUETA RUTA
		$('#mapa_trayecto_ida').attr({
		   'title': 'TRAYECTO: ' + dato_70,
		   'href': "https://www.google.com/maps/dir/" + dato_80,
		   'style': 'color: #ED7A44; font-size:14px;'
		});

		$("#vehiculoSalidaIda").html(obj.m_canuint + ' - Placa: ' + obj.m_caplaca)
		$("#servicioVehiculoIda").html(obj.m_canosrv)
		$("#capacidadVehiculoIda").html(obj.m_nucapac)
		$("#sillasVendidasIda").html(obj.sillas_vendida_ida)
		$("#sillasPorVenderIda").html(obj.sillas_disponi_ida)

		$("#sillasLocalesIda").html(obj.sillas_locales_ida)
		$("#sillasConveniIda").html(obj.sillas_conveni_ida)
		$("#sillasCortesiIda").html(obj.sillas_cortesi_ida)
		$("#sillasCreditoIda").html(obj.sillas_credito_ida)
		
		//	LOCAL
		//if (obj.sillas_locales_ida >0) {
		//	//pinta y muestra el abuelo o muesta el pariente superior row mas cercano
		//	$("#sillasLocalesIda_row").show()
		//	$("#sillasLocalesIda").html(obj.sillas_locales_ida)
		//}else{
		//	$("#sillasLocalesIda_row").hidden()
		//}
		$("#sillasReservaIda").html(obj.sillas_reserva_ida)
		$("#sillasRevertiIda").html(obj.sillas_reverti_ida)
		$("#sillasVipvtasIda").html(obj.sillas_vipvtas_ida)
		$("#sillasWebvtasIda").html(obj.sillas_webvtas_ida)

		$("#nombreConductor1Ida").html(obj.m_canomc1)
		$("#nombreConductor2Ida").html(obj.m_canomc2)
		
		
		


		//	VALOR UNITARIO IDA MUESTRA
		var valorMuestraTiqueteIda = (Number(obj.tarifa_tiquete_ida) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
		$("#valorTiqueteIdaMuestra").html(valorMuestraTiqueteIda)
		//	VALOR UNITARIO IDA PROCESA
		$("#valorTiqueteIda").html(parseInt(obj.tarifa_tiquete_ida, 10).toLocaleString('de-DE'))

		//	VALOR MINIMO IDA MUESTRA
		var valorMuestraMinimoTiqueteIda = (Number(obj.tarifa_tiquete_ida_minima) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
		$("#valorMinimoTiqueteIdaMuestra").html(valorMuestraMinimoTiqueteIda)
		//	VALOR MINIMO IDA PROCESA valorMinimoTiqueteIdaMuestra
		$("#valorMinimoTiqueteIda").html(parseInt(obj.tarifa_tiquete_ida_minima, 10).toLocaleString('de-DE'))

	


		$('#tablaPlanoVehiculoIda tbody').empty();

		var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
		
		if (true) {
			var data={
				obj,
				_token:token
			};

			var host = "/ticket/public"					

			$.ajax({ 
	                url: host + '/obtenerPlano_vehiculo_ida',
	                type: 'POST',
	                data: data,
	                dataType: 'JSON',
	                success: function (data) {
	                	var myData = data;

						var $table = $('#tablaPlanoVehiculoIda tbody');
						var start = 0;
						var filaCount = 0;
						var columnCount = 0;
						var fila = null;
						var celdas = [];
						var sillas = [];

						$.each(myData[0], function(key, data) {
						  start +=1;
						  if(start>=11){
						    columnCount +=1;					
						    if(columnCount==1){
						      fila = $('<tr>');
						      celdas = [];
						    }
						    if(columnCount<=6){
						      if(data==='0' || data==='P'){
						        celdas.push($('<td>')
						        	.attr('style','width: 38px').html(''));
						      }else{
						        celdas.push(
						        	$('<td>').append(
						        		$('<input>')
						        			.attr('type','button')
						        			.attr('style','width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						        			.attr('id','sillaIda' + data)
						        			.attr('class','btn btn-success')
						        			.attr('value',data)
				        			 	 	.attr('onclick','getSillasVehiculoIda(this)')
						        		)
						        	);
						        sillas.push(data);
						      }
						    }
						    if(columnCount==5){
						      columnCount=0;
						      fila.append(celdas);
						      $table.append(fila);     
						    }
						    if(sillas.length==myData.m_nucapci){
						      columnCount=0;
						      fila.append(celdas);
						      $table.append(fila);  
						      sillas = [];
						      return false;
						    }
						  }
						});		

						$.each(myData[1], function(key, data) {  
						  //$('<li>' + data + '</li>').appendTo($grouplist); 

						  for(var obj in data){
								
							if(obj == "m_casiasg"){						    	
						      var sillas = data[obj].split('-');
						      for(var silla in sillas){
						      	switch(data.m_catitiq) {
						          case "LOCAL":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-danger')
						            	.attr('style','background-Color: #996633; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Local N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          case "CONVENIO":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-danger')
						            	.attr('style','background-Color: #FFCC99; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Convenio N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          case "CORTESIA":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-danger')
						            	.attr('style','background-Color: #B3B2B2; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Cortesía N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          case "CREDITO":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-danger')
						            	.attr('style','background-Color: #7030A0; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Crédito N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          case "RESERVA":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-danger')
						            	.attr('style','background-Color: #FF6A00; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Reserva N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          case "REVERTIDO":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-danger')
						            	.attr('style','background-Color: #5C9BD5; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Revertido N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          case "VIP":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-danger')
						            	.attr('style','background-Color: #FFC000; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Vip N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          case "WEB":
						            $("#sillaIda" + sillas[silla]).attr('class', 'btn btn-primary')
						            	.attr('style','background-Color: #FF66CC; width: 60px; color: #000000; font-weight: bold; font-size: 18px; margin-bottom: 10px; border: none')
						            	.attr('title','Web N° ' + data.m_nucodig + ' - Id ' + data.m_canuivi + ' - ' + data.m_canovij + ' - Trayecto ' + data.m_canotor + ' - ' + data.m_canotde)
						            	.attr("disabled", true);
						            break;
						          default:
						        }
						      }
						    }      
						  }    
						});	
	                }
	        });

	       
		}else{
	       
		}		
	}

	var sillasIdaSeleccionadas = []

	function getSillasVehiculoIda(val) {
		var valorTiqueteIda = parseInt(($("#valorTiqueteIda").text()).replace(/\D/g,''), 10)

		var valorTotalTiquetesIda = 0

		var idButton = $(val).attr('id')
		var buttonValue = $(val).attr('value')
		
		if ($("#" + idButton).hasClass( "btn-danger" )) {
			$("#" + idButton).attr('class', 'btn btn-success')				
			sillasIdaSeleccionadas.splice($.inArray(idButton, sillasIdaSeleccionadas), 1);
		
		} else {
			$("#" + idButton).attr('class', 'btn btn-danger')	
			sillasIdaSeleccionadas.push(idButton);			
		}		

		//valorMinimoTiqueteIda hacer el calclulo
		var valorMinimoTiqueteIda = parseInt(( $("#valorMinimoTiqueteIda").html()).replace(/\D/g,''), 10)
		var maximoDescuentoIda = (valorTiqueteIda - valorMinimoTiqueteIda) * sillasIdaSeleccionadas.length

		valorTotalTiquetesIda = sillasIdaSeleccionadas.length * valorTiqueteIda

		var vrDescuentoIda = (parseInt($("#vrDescuentoIda").val()) || 0)

		var vrMaxDescuentoIda =  Math.min(maximoDescuentoIda, vrDescuentoIda)

		valorNetoTiquetesIda = valorTotalTiquetesIda - vrMaxDescuentoIda

		if (vrDescuentoIda > vrMaxDescuentoIda) {
			//alert("el descuento que esta poniendo exede el monto")
			//var vrDescuentoIdaerror = new Intl.NumberFormat("es-ES").format(vrDescuentoIda);
			//	MUESTRA VALOR DESCUENTO ERROR
			var vrDescuentoIdaerror = (Number(vrDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			//	MUESTRA VALOR MAXIMO PERMITIDO ERROR
			//var maximoDescuentoIdaError = new Intl.NumberFormat("es-ES").format(vrMaxDescuentoIda);
			var maximoDescuentoIdaError = (Number(vrMaxDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			//	INICIO RECALCULA VALORES
			//valorTotalTiquetesIda = sillasIdaSeleccionadas.length * valorTiqueteIda
			//	VALOR NETO IDA PROCESA
			//$("#CantidadTiqueteIda").html(sillasIdaSeleccionadas.length)

			var vrDescuentoIdaCeroMuestra = 0;
			var vrDescuentoIdaMuestra = (Number(vrDescuentoIdaCeroMuestra) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			//	VALOR DESCUENTO IDA MUESTRA
			$("#vrDescuentoIdaMuestra").html(vrDescuentoIdaMuestra)
			
			//	VALOR DESCUENTO IDA PROCESA
			var vrDescuentoIdaCero = '';
			$("#vrDescuentoIda").val(vrDescuentoIdaCero);
			
			//valorMinimoTiqueteIda hacer el calclulo
			var valorMinimoTiqueteIda = parseInt(( $("#valorMinimoTiqueteIda").html()).replace(/\D/g,''), 10)
			var maximoDescuentoIda = (valorTiqueteIda - valorMinimoTiqueteIda) * sillasIdaSeleccionadas.length

			valorTotalTiquetesIda = sillasIdaSeleccionadas.length * valorTiqueteIda

			var vrDescuentoIda = (parseInt($("#vrDescuentoIda").val()) || 0)

			var vrMaxDescuentoIda =  Math.min(maximoDescuentoIda, vrDescuentoIda)

			valorNetoTiquetesIda = valorTotalTiquetesIda - vrMaxDescuentoIda

			//	VALOR NETO IDA MUESTRA
			var valorMuestraNetoTiquetesIda = (Number(valorNetoTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			$("#valorNetoTiquetesIdaMuestra").html(valorMuestraNetoTiquetesIda)
			//	VALOR NETO IDA PROCESA
			$("#valorNetoTiquetesIda").html(Math.max(0,valorNetoTiquetesIda).toLocaleString('es-ES'))
			//	FIN RECALCULA VALORES
			swal({
				type: 'error',
				title: ('Valor descuento'),
				html: ('<b>El valor a descontar '+ vrDescuentoIdaerror +' no es válido</br></br>El valor máximo permitido es <br><br>' + maximoDescuentoIdaError + '<br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
				confirmButtonText: 'Listo',
				confirmButtonColor: '#5CB85C',
				showConfirmButton: false
			})
			//	TOTAL VENTA IDA MUESTRA
			var valorMuestraTotalTiquetesIda = (Number(valorTotalTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			$("#valorTotalTiquetesIdaMuestra").html(valorMuestraTotalTiquetesIda)
			//	TOTAL VENTA IDA PROCESA
			$("#valorTotalTiquetesIda").html(valorTotalTiquetesIda.toLocaleString('es-ES'))
			//	VALOR MAXIMO DESCUENTO IDA MUESTRA
			var valorMuestraMaximoDescuentoTiquetesIda = (Number(maximoDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			$("#valorMaximoDescuentoTiquetesIdaMuestra").html(valorMuestraMaximoDescuentoTiquetesIda)
			//	VALOR MAXIMO DESCUENTO IDA PROCESA
			$("#valorMaximoDescuentoTiquetesIda").html(maximoDescuentoIda.toLocaleString('es-ES'))
			//	VALOR NETO IDA MUESTRA
			var valorMuestraNetoTiquetesIda = (Number(valorNetoTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			$("#valorNetoTiquetesIdaMuestra").html(valorMuestraNetoTiquetesIda)
			//	VALOR NETO IDA PROCESA
			$("#valorNetoTiquetesIda").html(Math.max(0,valorNetoTiquetesIda).toLocaleString('es-ES'))
		}

		//	TOTAL VENTA IDA MUESTRA
		var valorMuestraTotalTiquetesIda = (Number(valorTotalTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
		$("#valorTotalTiquetesIdaMuestra").html(valorMuestraTotalTiquetesIda)
		//	TOTAL VENTA IDA PROCESA
		$("#valorTotalTiquetesIda").html(valorTotalTiquetesIda.toLocaleString('es-ES'))
		//	VALOR MAXIMO DESCUENTO IDA MUESTRA
		var valorMuestraMaximoDescuentoTiquetesIda = (Number(maximoDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
		$("#valorMaximoDescuentoTiquetesIdaMuestra").html(valorMuestraMaximoDescuentoTiquetesIda)
		//	VALOR MAXIMO DESCUENTO IDA PROCESA
		$("#valorMaximoDescuentoTiquetesIda").html(maximoDescuentoIda.toLocaleString('es-ES'))
		//	VALOR NETO IDA MUESTRA
		var valorMuestraNetoTiquetesIda = (Number(valorNetoTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
		$("#valorNetoTiquetesIdaMuestra").html(valorMuestraNetoTiquetesIda)
		//	VALOR NETO IDA PROCESA
		$("#valorNetoTiquetesIda").html(Math.max(0,valorNetoTiquetesIda).toLocaleString('es-ES'))

		$("#CantidadTiqueteIda").html(sillasIdaSeleccionadas.length)

		$('#numeroViajeros').empty();
		$('#numeroViajerosBtnEnviar').empty();
    	var dataCustomers = $('#numeroViajeros') 
    	
    	$("#sillaSeleccionadasIda").val(sillasIdaSeleccionadas)   	

      	for(var silla in sillasIdaSeleccionadas){			
			dataCustomers.append(				
				$('<fieldset>')
					.attr('style','margin-right: 10px;')
					.append($('<legend>')
						.html('DATOS VIAJERO - SILLA N° ' + sillasIdaSeleccionadas[silla].substring(8, 10))
						.attr('style','color: #FB2407; font-weight: bold; font-size: 14px;')
						)
					.append(
						$('<div>')
							.attr('class','form-group')
							.attr('style','margin-bottom: 10px;')
							.append(
								$('<input>')
									.attr('class','form-control')
									.attr('type','text')
									.attr('id','datacedula-' + sillasIdaSeleccionadas[silla])
									.attr('placeholder','  Data Oculta')
									.attr('Title','  Número Unico de Identificación Personal')
									.attr('required','required')				
							)							
					)
					.append(
						$('<div>')
							.attr('class','form-group')
							.attr('style','margin-bottom: 10px;')
							.append(
								$('<input>')
									.attr('class','form-control nuip')
									.attr('type','text')
									.attr('id','m_canuipe-' + sillasIdaSeleccionadas[silla])
									.attr('placeholder','  Nuip')
									.attr('Title','  Número Unico de Identificación Personal')
									.attr('required','required')				
							)							
					)
					.append(
						$('<div>')
							.attr('class','form-group')
							.attr('style','margin-bottom: 10px;')
							.append(
								$('<input>')
									.attr('class','form-control')
									.attr('type','text')
									.attr('id','m_canombr-' + sillasIdaSeleccionadas[silla])
									.attr('placeholder','  Nombre y Apellidos')
									.attr('Title','  Nombre y apellidos')
									.attr('required','required')				
							)							
					)
					.append(
						$('<div>')
							.attr('class','form-group')
							.attr('style','margin-bottom: 10px;')
							.append(
								$('<input>')
									.attr('class','form-control')
									.attr('type','text')
									.attr('id','m_camovil-' + sillasIdaSeleccionadas[silla])
									.attr('placeholder','  Teléfono')
									.attr('Title','  Número Celular')
									.attr('required','required')				
							)							
					)
			)			
		}

		if (sillasIdaSeleccionadas.length>3) {
			$(".scrollPasajeros").css({"overflow": "scroll", "height": "620px"});
		} else{

			$(".scrollPasajeros").css({"overflow": "hidden", "height": "auto"});
		}

		if (sillasIdaSeleccionadas.length>0) {

			$('#numeroViajerosBtnEnviar')
				.append(
					$('<select>').attr("id", "formaDePagoIda")	
					  	.append($("<option>")
		                    .attr("value","")
		                    .text("Metodo de Pago"))
	  					.append($("<option>")
		                    .attr("value","Efectivo")
		                    .text("Efectivo"))
	  					.append($("<option>")
		                    .attr("value","Tarjeta Debito")
		                    .text("Tarjeta Debito"))
	  					.append($("<option>")
		                    .attr("value","Tarjeta Credito")
		                    .text("Tarjeta Credito"))
				)	


	



			$('#numeroViajerosBtnEnviar').append($('<button>')
			.attr('type','button')
			.attr('class','btn btn-primary fa fa-check')
			.attr('id','guardarTiquetesViajerosIda')
			.attr('style','width: 100px; font-size:18px;text-shadow:2px 2px 4px #000000; margin-bottom: 10px; border: none;')
			.html(' Listo')
			)

			$('#numeroViajerosBtnEnviar').append($('<button>')
			.attr('type','button')
			.attr('class','btn btn-primary fa fa-copy')
			.attr('id','copiarIgualesTodosPasajeros')
			.attr('style','width: 100px; font-size:18px;text-shadow:2px 2px 4px #000000; margin-bottom: 10px; border: none; margin-left: 10px;')
			.html(' Copiar')
			)
		}
	}

	$("body").on('click', '#guardarTiquetesViajerosIda', function(){ 	


		//validar si tiene metodo de pago de lo contario retornar false
		if ($( "#formaDePagoIda" ).val() === "") {
			// AQUI VA EL SWAL
			alert()
			//return false
		} 

				
	




		var sillas = ($("#sillaSeleccionadasIda").val()).split(",");	
		var valorSillas = [];
		var valorSilla = [];
      	for(var silla in sillas){	      		
      		valorSilla = {};
		  			  	
		  	valorSilla.datacedula = $("#datacedula-" + sillas[silla]).val(); 		  	
			valorSilla.m_canuipe = $("#m_canuipe-" + sillas[silla]).val();   
		  	valorSilla.m_canombr = $("#m_canombr-" + sillas[silla]).val();   
		  	valorSilla.m_camovil = $("#m_camovil-" + sillas[silla]).val();  
		  	valorSilla.formaDePagoIda = $( "#formaDePagoIda" ).val();  
		  	valorSilla.m_feferod = $("#m_feferod").val();  		   	

		  	valorSillas.push(valorSilla)
		};	

		var token = '{{csrf_token()}}';

		var data={
			sillas: valorSillas,
			_token:token
		};

		var host = "/ticket/public"					

		$.ajax({ 
            url: host + '/grabartiquetesIda',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
				debugger
            }
        });

	});

	$("body").on('click', '#copiarIgualesTodosPasajeros', function(){ 
		var sillas = ($("#sillaSeleccionadasIda").val()).split(",");	

      	for(var silla in sillas){	      		
		  	$("#datacedula-" + sillasIdaSeleccionadas[silla])
		  		.val($("#datacedula-" + sillasIdaSeleccionadas[0]).val());    
			$("#m_canuipe-" + sillasIdaSeleccionadas[silla])
				.val($("#m_canuipe-" + sillasIdaSeleccionadas[0]).val());    
			$("#m_canombr-" + sillasIdaSeleccionadas[silla])
				.val($("#m_canombr-" + sillasIdaSeleccionadas[0]).val());    
			$("#m_camovil-" + sillasIdaSeleccionadas[silla])
				.val($("#m_camovil-" + sillasIdaSeleccionadas[0]).val());       

		};		
	});

	$("body").on('focusin', '.nuip', function(){ 
		var id = $(this).attr('id')				
		var silla = id.split("-");
		$("#datacedula-" + silla[1]).val('');    
		$("#m_canuipe-" + silla[1]).val('');    
		$("#m_canombr-" + silla[1]).val('');    
		$("#m_camovil-" + silla[1]).val('');    		
	});	

	$("body").on('focusout', '.nuip', function(){    // 2nd (B)
		var id = $(this).attr('id')				
		var silla = id.split("-");
 		$("#sillaActualFocus").val(silla[1]);

	
		if (($("#" + id).val()).split(",").length > 1) {
						
			$("#datacedula-" + silla[1]).val($("#" + id).val())

			var infocedula = ($("#" + id).val()).split(",")
			//	VALIDA INFORMACION
			if (infocedula != 0) {
			    //	DOCUMENTO DE IDENTIFICACION
			    var dato_00 = infocedula[0];
			    var dato_01 = Number(dato_00);

				$("#m_canuipe-" + silla[1]).val(dato_01)
				$("#m_canombr-" + silla[1]).val(infocedula[3] + ' ' +infocedula[4] + ' ' +infocedula[1] + ' ' +infocedula[2])
			}
		} 
	   			
		var token = '{{csrf_token()}}';

		var data={
			m_canuipe:$("#"+id).val(),
			_token:token
		};

		var host = "/ticket/public"					

		$.ajax({ 
            url: host + '/obtenerDatosViajero',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            success: function (data) {
				if(data.length > 0){	
					$("#m_canombr-" + $("#sillaActualFocus").val()).val(data[0].m_canombr)
					$("#m_camovil-" + $("#sillaActualFocus").val()).val(data[0].m_camovil)	
				}
            }
        });
	});

	//	SALE OBJETO DESCUENTO
	$("#vrDescuentoIda").focusout(function() {

		//	REASIGNA CANTIDAD SILLAS IDA
		//$("#CantidadTiqueteIda").html(sillasIdaSeleccionadas.length)
		//	TOTAL VENTA IDA PROCESA
		//$("#valorTotalTiquetesIda").html(valorTotalTiquetesIda.toLocaleString('es-ES'))
		//
		var valorMinimoTiqueteIda = parseInt(( $("#valorMinimoTiqueteIda").html()).replace(/\D/g,''), 10)
		var valorTiqueteIda = parseInt(( $("#valorTiqueteIda").html()).replace(/\D/g,''), 10)
		var CantidadTiqueteIda = (parseInt($("#CantidadTiqueteIda").text()) || 0)
		var vrDescuentoIda = (parseInt($("#vrDescuentoIda").val()) || 0)
		var maximoDescuentoIda = (valorTiqueteIda - valorMinimoTiqueteIda) * CantidadTiqueteIda
		var vrMaxDescuentoIda =  Math.min(maximoDescuentoIda, vrDescuentoIda)
		var valorTotalTiquetesIda = parseInt(( $("#valorTotalTiquetesIda").html()).replace(/\D/g,''), 10)
		var valorNetoTiquetesIda = valorTotalTiquetesIda - vrMaxDescuentoIda
		//	VALOR NETO IDA MUESTRA
		var valorMuestraNetoTiquetesIda = (Number(valorNetoTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
		$("#valorNetoTiquetesIdaMuestra").html(valorMuestraNetoTiquetesIda)
		//	VALOR NETO IDA PROCESA
		$("#valorNetoTiquetesIda").html(Math.max(0,valorNetoTiquetesIda).toLocaleString('es-ES'))

		var vrDescuentoIdaMuestra = (Number(vrDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

		if (vrDescuentoIda > vrMaxDescuentoIda) {
			///alert("el descuento que esta poniendo exede el monto")
			var vrDescuentoIdaCero = 0;
			var vrDescuentoIdaMuestra = (Number(vrDescuentoIdaCero) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

			//var vrDescuentoIdaerror = new Intl.NumberFormat("es-ES").format(vrDescuentoIda);
			//var maximoDescuentoIdaError = new Intl.NumberFormat("es-ES").format(vrMaxDescuentoIda);
			//	MUESTRA VALOR DESCUENTO ERROR
			var vrDescuentoIdaerror = (Number(vrDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			//	MUESTRA VALOR MAXIMO PERMITIDO ERROR
			//var maximoDescuentoIdaError = new Intl.NumberFormat("es-ES").format(vrMaxDescuentoIda);
			var maximoDescuentoIdaError = (Number(vrMaxDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

			//	INICIO RECALCULA VALORES
			//	VALOR DESCUENTO IDA PROCESA
			var vrDescuentoIdaCero = '';
			$("#vrDescuentoIda").val(vrDescuentoIdaCero);
			//	VALOR DESCUENTO IDA MUESTRA
			var vrMuestraDescuentoIda = (Number(vrDescuentoIdaCero) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			$("#vrDescuentoIdaMuestra").html(vrMuestraDescuentoIda)

			var valorMinimoTiqueteIda = parseInt(( $("#valorMinimoTiqueteIda").html()).replace(/\D/g,''), 10)
			var valorTiqueteIda = parseInt(( $("#valorTiqueteIda").html()).replace(/\D/g,''), 10)
			var CantidadTiqueteIda = (parseInt($("#CantidadTiqueteIda").text()) || 0)
			var vrDescuentoIda = (parseInt($("#vrDescuentoIda").val()) || 0)
			var maximoDescuentoIda = (valorTiqueteIda - valorMinimoTiqueteIda) * CantidadTiqueteIda
			var vrMaxDescuentoIda =  Math.min(maximoDescuentoIda, vrDescuentoIda)
			var valorTotalTiquetesIda = parseInt(( $("#valorTotalTiquetesIda").html()).replace(/\D/g,''), 10)
			var valorNetoTiquetesIda = valorTotalTiquetesIda - vrMaxDescuentoIda
			//	VALOR NETO IDA MUESTRA
			var valorMuestraNetoTiquetesIda = (Number(valorNetoTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			$("#valorNetoTiquetesIdaMuestra").html(valorMuestraNetoTiquetesIda)
			//	VALOR NETO IDA PROCESA
			$("#valorNetoTiquetesIda").html(Math.max(0,valorNetoTiquetesIda).toLocaleString('es-ES'))
			//	FIN RECALCULA VALORES
			swal({
				type: 'error',
				title: ('Valor descuento'),
				html: ('<b>El valor a descontar '+ vrDescuentoIdaerror +' no es válido</br></br>El valor máximo permitido es <br><br>' + maximoDescuentoIdaError + '<br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
				confirmButtonText: 'Listo',
				confirmButtonColor: '#5CB85C',
				showConfirmButton: false
			})
			//	VALOR DESCUENTO IDA MUESTRA
			$("#vrDescuentoIdaMuestra").html(vrDescuentoIdaMuestra)
			//	VALOR DESCUENTO IDA PROCESA
			//$("#vrDescuentoIda").val(vrDescuentoIdaMuestra);
		}
		//	VALOR DESCUENTO IDA MUESTRA
		$("#vrDescuentoIdaMuestra").html(vrDescuentoIdaMuestra)
		//	VALOR DESCUENTO IDA PROCESA
		//$("#vrDescuentoIda").val(vrDescuentoIdaMuestra);
		$("#vrDescuentoIda").hide();
	})

	//	ENFOCA OBJETO DESCUENTO
	$("#vrDescuentoIda").focusin(function() {

		//	VALOR DESCUENTO IDA PROCESA
		var vrDescuentoIdaCero = '';
		$("#vrDescuentoIda").val(vrDescuentoIdaCero);
		var valorMinimoTiqueteIda = parseInt(( $("#valorMinimoTiqueteIda").html()).replace(/\D/g,''), 10)
		var valorTiqueteIda = parseInt(( $("#valorTiqueteIda").html()).replace(/\D/g,''), 10)
		var CantidadTiqueteIda = (parseInt($("#CantidadTiqueteIda").text()) || 0)
		var vrDescuentoIda = (parseInt($("#vrDescuentoIda").val()) || 0)
		var maximoDescuentoIda = (valorTiqueteIda - valorMinimoTiqueteIda) * CantidadTiqueteIda
		var vrMaxDescuentoIda =  Math.min(maximoDescuentoIda, vrDescuentoIda)
		var valorTotalTiquetesIda = parseInt(( $("#valorTotalTiquetesIda").html()).replace(/\D/g,''), 10)
		var valorNetoTiquetesIda = valorTotalTiquetesIda - vrMaxDescuentoIda
		//	VALOR NETO IDA MUESTRA
		var valorMuestraNetoTiquetesIda = (Number(valorNetoTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
		$("#valorNetoTiquetesIdaMuestra").html(valorMuestraNetoTiquetesIda)
		//	VALOR NETO IDA PROCESA
		$("#valorNetoTiquetesIda").html(Math.max(0,valorNetoTiquetesIda).toLocaleString('es-ES'))

		var vrDescuentoIdaMuestra = (Number(vrDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

		if (vrDescuentoIda > vrMaxDescuentoIda) {
			///alert("el descuento que esta poniendo exede el monto")
			var vrDescuentoIdaCero = 0;
			var vrDescuentoIdaMuestra = (Number(vrDescuentoIdaCero) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			//var vrDescuentoIdaerror = new Intl.NumberFormat("es-ES").format(vrDescuentoIda);
			//var maximoDescuentoIdaError = new Intl.NumberFormat("es-ES").format(vrMaxDescuentoIda);
			//	MUESTRA VALOR DESCUENTO ERROR
			var vrDescuentoIdaerror = (Number(vrDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			//	MUESTRA VALOR MAXIMO PERMITIDO ERROR
			//var maximoDescuentoIdaError = new Intl.NumberFormat("es-ES").format(vrMaxDescuentoIda);
			var maximoDescuentoIdaError = (Number(vrMaxDescuentoIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });


			//	INICIO RECALCULA VALORES
			//	VALOR DESCUENTO IDA PROCESA
			$("#vrDescuentoIda").val(vrDescuentoIdaMuestra);
			var valorMinimoTiqueteIda = parseInt(( $("#valorMinimoTiqueteIda").html()).replace(/\D/g,''), 10)
			var valorTiqueteIda = parseInt(( $("#valorTiqueteIda").html()).replace(/\D/g,''), 10)
			var CantidadTiqueteIda = (parseInt($("#CantidadTiqueteIda").text()) || 0)
			var vrDescuentoIda = (parseInt($("#vrDescuentoIda").val()) || 0)
			var maximoDescuentoIda = (valorTiqueteIda - valorMinimoTiqueteIda) * CantidadTiqueteIda
			var vrMaxDescuentoIda =  Math.min(maximoDescuentoIda, vrDescuentoIda)
			var valorTotalTiquetesIda = parseInt(( $("#valorTotalTiquetesIda").html()).replace(/\D/g,''), 10)
			var valorNetoTiquetesIda = valorTotalTiquetesIda - vrMaxDescuentoIda
			//	VALOR NETO IDA MUESTRA
			var valorMuestraNetoTiquetesIda = (Number(valorNetoTiquetesIda) ).toLocaleString('es-ES', { style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
			$("#valorNetoTiquetesIdaMuestra").html(valorMuestraNetoTiquetesIda)
			//	VALOR NETO IDA PROCESA
			$("#valorNetoTiquetesIda").html(Math.max(0,valorNetoTiquetesIda).toLocaleString('es-ES'))
			//	FIN RECALCULA VALORES
			swal({
				type: 'error',
				title: ('Valor descuento'),
				html: ('<b>El valor a descontar '+ vrDescuentoIdaerror +' no es válido</br></br>El valor máximo permitido es <br><br>' + maximoDescuentoIdaError + '<br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
				confirmButtonText: 'Listo',
				confirmButtonColor: '#5CB85C',
				showConfirmButton: false
			})
			//	VALOR DESCUENTO IDA MUESTRA
			$("#vrDescuentoIdaMuestra").html(vrDescuentoIdaMuestra)
			//	VALOR DESCUENTO IDA PROCESA
			//$("#vrDescuentoIda").val(vrDescuentoIdaMuestra);
		}
		//	VALOR DESCUENTO IDA MUESTRA
		$("#vrDescuentoIdaMuestra").html(vrDescuentoIdaMuestra)
		//	VALOR DESCUENTO IDA PROCESA
		//$("#vrDescuentoIda").val(vrDescuentoIdaMuestra);
	})

	function mostrar_descuento()
	{
		//alert('aquí');
		$("#vrDescuentoIda").show();
	}

</script>
