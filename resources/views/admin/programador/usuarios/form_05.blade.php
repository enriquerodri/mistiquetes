<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propiedades Comprobantes de Caja
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO PROPIEDADES COMPROBANTES DE CAJA -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspANULAR COMPROBANTES DE CAJA
</h4>

<!--PROPIEDADES COMPROBANTES DE CAJA -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -35px;"
		title="Propiedades Comprobantes de Caja">
		<img src="{{ asset('images/flaticon-png/small/propiedades_100_registros_comprobantes_de_caja.jpg') }}" width="50" alt=""><b>&nbsp&nbspComprobantes Caja:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap555"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Comprobantes de Caja"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarPropiedadesComprobantesCaja(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES COMPROBANTES DE CAJA -->
<div class="form-group">
	<!--PROPIEDADES REGISTROS -->
	<div class="mos_ocu_com_caj" hidden="hidden">
		<div class="form-group">
			<!--REGISTROS GASTOS DE VIAJE -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Gastos de Viaje">
				<img src="{{ asset('images/flaticon-png/small/propiedades_101_registros_comprobantes_gastos_de_viaje.png') }}" width="35" alt=""><b>&nbsp&nbspGastos de Viaje:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capacgv', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capacgv',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capacgv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS EGRESOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Egresos">
				<img src="{{ asset('images/flaticon-png/small/propiedades_102_registros_comprobantes_de_egresos.png') }}" width="35" alt=""><b>&nbsp&nbspEgresos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capaceg', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capaceg',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capaceg" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--REGISTROS INGRESOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Ingresos">
				<img src="{{ asset('images/flaticon-png/small/propiedades_103_registros_comprobantes_de_ingresos.png') }}" width="35" alt=""><b>&nbsp&nbspIngresos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capacin', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capacin',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capacin" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS NOTAS CREDITO -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Notas Crédito">
				<img src="{{ asset('images/flaticon-png/small/propiedades_104_registros_comprobantes_de_nota_credito.png') }}" width="35" alt=""><b>&nbsp&nbspNotas Crédito:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capacnc', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capacnc',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capacnc" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--REGISTROS NOTAS DEBITO -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Notas Debito">
				<img src="{{ asset('images/flaticon-png/small/propiedades_105_registros_comprobantes_de_nota_debito.jpg') }}" width="35" alt=""><b>&nbsp&nbspNotas Debito:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capacnd', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capacnd',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capacnd" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<hr class="separador">
	</div>
</div>

<script>
	//	FUNCIONES
	//	FUNCION MAYUSCULAS - ELIMINAR DOBLE ESPACIO
	function myFunction(id)
	{
		//	MODAL CREAR
	    var x = $("#modalcrear #"+id+"").val();
	    var y = x.toUpperCase();
	    
	    var res = y.replace(/\s{2,}/g, ' ');
	    $("#modalcrear #"+id+"").val(res);

	    //	MODAL EDITAR
	    var x = $("#modaleditar #"+id+"").val();
	    var y = x.toUpperCase();

	    var res = y.replace(/\s{2,}/g, ' ');
	    $("#modaleditar #"+id+"").val(res);
	}
</script>

<script>
	//	FUNCION OCULTAR PROPIEDADES COMPROBANTES DE CAJA
	function mostarOcultarPropiedadesComprobantesCaja()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_com_caj').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_com_caj").show();
			$("#modalcrear #m_capap555").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap555").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap555").attr({"title": "Ocultar Propiedades Comprobantes de Caja"});
			//	EDITAR
			$(".mos_ocu_com_caj").show();
			$("#modaleditar #m_capap555").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap555").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap555").attr({"title": "Ocultar Propiedades Comprobantes de Caja"});
		} else {
			//	CREAR
			$(".mos_ocu_com_caj").hide();
			$("#modalcrear #m_capap555").css({"color": "#1880C5"});
			$("#modalcrear #m_capap555").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap555").attr({"title": "Mostrar Propiedades Comprobantes de Caja"});modalcrear
			//	EDITAR
			$(".mos_ocu_com_caj").hide();
			$("#modaleditar #m_capap555").css({"color": "#1880C5"});
			$("#modaleditar #m_capap555").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap555").attr({"title": "Mostrar Propiedades Comprobantes de Caja"});
		}		
	}
</script>
