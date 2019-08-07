<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propiedades contables
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<style>
	input:invalid {
 		color: red;
	}
</style>

<!-- TITULO PROPIEDADES CONTABLES -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspPARAMETROS CONTABLES
</h4>

<!--PROPIEDADES CONTABLES -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: 10px;"
		title="Propiedades Contables">
		<img src="{{ asset('images/flaticon-png/small/propiedades_110_registros_contabilidad.jpg') }}" width="50" alt=""><b>&nbsp&nbspPropiedades Contables:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap1055"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Contables"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarPropiedadesContables(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES CONTABLES -->
<div class="form-group">
	<!--PROPIEDADES CONTABLES -->
	<div class="mos_ocu_con_tab" hidden="hidden">
		<div class="form-group">
			<!--REGISTROS PARAMETROS CONTABLE I -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Parámetros I">
				<img src="{{ asset('images/flaticon-png/small/propiedades_111_registros_parametros_contables.png') }}" width="35" alt=""><b>&nbsp&nbspParámetros I:</b>
			</label>
			<div class="col-sm-3">
				{!! Form::text('m_capcc01',null, [
						'class'=>'form-control',
						'id'=>'m_capcc01',
						'placeholder'=>'Parámetro I...',
						'pattern'=>"[A-Z 0-9]{1,20}",
						'title'=>"Parámetro I (1 a 20 caracteres - A-Z 0-9)",
						'maxlength'=>'20',
						'onkeyup'=>'myFunction(this.id)'
					])
				!!}
			</div>
			<!--REGISTROS PARAMETROS CONTABLE II -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Parámetros II">
				<img src="{{ asset('images/flaticon-png/small/propiedades_112_registros_parametros_contables.png') }}" width="35" alt=""><b>&nbsp&nbspParámetros II:</b>
			</label>
			<div class="col-sm-3">
				{!! Form::text('m_capcc02',null, [
						'class'=>'form-control',
						'id'=>'m_capcc02',
						'placeholder'=>'Parámetro II...',
						'pattern'=>"[A-Z 0-9]{1,20}",
						'title'=>"Parámetro II (1 a 20 caracteres - A-Z 0-9)",
						'maxlength'=>'20',
						'onkeyup'=>'myFunction(this.id)'
					])
				!!}
			</div>
		</div>
		<div class="form-group">
			<!--REGISTROS PARAMETROS CONTABLE III -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Parámetros III">
				<img src="{{ asset('images/flaticon-png/small/propiedades_113_registros_parametros_contables.png') }}" width="35" alt=""><b>&nbsp&nbspParámetros III:</b>
			</label>
			<div class="col-sm-3">
				{!! Form::text('m_capcc03',null, [
						'class'=>'form-control',
						'id'=>'m_capcc03',
						'placeholder'=>'Parámetro III...',
						'pattern'=>"[A-Z 0-9]{1,20}",
						'title'=>"Parámetro III (1 a 20 caracteres - A-Z 0-9)",
						'maxlength'=>'20',
						'onkeyup'=>'myFunction(this.id)'
					])
				!!}
			</div>
			<!--REGISTROS PARAMETROS CONTABLE IV -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Parámetros IV">
				<img src="{{ asset('images/flaticon-png/small/propiedades_114_registros_parametros_contables.png') }}" width="35" alt=""><b>&nbsp&nbspParámetros IV:</b>
			</label>
			<div class="col-sm-3">
				{!! Form::text('m_capcc04',null, [
						'class'=>'form-control',
						'id'=>'m_capcc04',
						'placeholder'=>'Parámetro IV...',
						'pattern'=>"[A-Z 0-9]{1,20}",
						'title'=>"Parámetro IV (1 a 20 caracteres - A-Z 0-9)",
						'maxlength'=>'20',
						'onkeyup'=>'myFunction(this.id)'
					])
				!!}
			</div>
		</div>
		<div class="form-group">
			<!--AGRUPAR VENTAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Agrupar Ventas">
				<img src="{{ asset('images/flaticon-png/small/propiedades_115_registros_contables_agrupar_ventas.png') }}" width="35" alt=""><b>&nbsp&nbspAgrupar Ventas:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capcavt', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capcavt',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capcavt" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--ID USUARIO AGRUPADOR -->
			<label class="col-sm-4 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Usuario Agrupador">
				<img src="{{ asset('images/flaticon-png/small/propiedades_116_registros_contables_agrupar_ventas.jpg') }}" width="35" alt=""><b>&nbsp&nbspUsuario Agrupador:</b>
			</label>
			<div class="col-sm-3">
				{!!Form::number('m_capcius',null, [
						'class'=>'form-control',
						'id'=>'m_capcius',
						'placeholder'=>'IDENTIFICACION PERSONAL...',
						'pattern'=>"[0-9]{5,15}",
						'title'=>"Número único de identificación personal (5 a 15 dígitos)",
						'maxlength'=>'15',
						'onfocusout'=>'Obtenerdv(this.id)'
					])
				!!}
			</div>
		</div>
		<div class="form-group">
			<!--PORCENTAJE LIQUIDACION ENCOMIENDAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Encomiendas Porcentaje">
				<img src="{{ asset('images/flaticon-png/small/propiedades_60_registros_encomiendas.png') }}" width="35" alt=""><b>&nbsp&nbspEncomiendas %:</b>
			</label>
			<div class="col-sm-3">
				{!!Form::text('m_nuplenc',null, [
						'class'=>'form-control',
						'id'=>'m_nuplenc',
						'placeholder'=>'ENCOMIENDAS %...',
						'pattern'=>"[0-3]+(\.[0-3]{0,5})?%?",
						'title'=>"Porcentaje de liquidación sólo números con 0 ó 2 decimales",
						'maxlength'=>'12',
					])
				!!}
			</div>
			<!--PORCENTAJE LIQUIDACION GIROS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Giros Porcentaje">
				<img src="{{ asset('images/flaticon-png/small/propiedades_70_registros_giros.png') }}" width="35" alt=""><b>&nbsp&nbspGiros %:</b>
			</label>
			<div class="col-sm-3">
				{!!Form::text('m_nuplgir',null, [
						'class'=>'form-control',
						'id'=>'m_nuplgir',
						'placeholder'=>'GIROS %...',
						'pattern'=>"[0-3]+(\.[0-3]{0,5})?%?",
						'title'=>"Porcentaje de liquidación sólo números con 0 ó 2 decimales",
						'maxlength'=>'12',
					])
				!!}
			</div>
		</div>
		<div class="form-group">
			<!--PORCENTAJE LIQUIDACION TIQUETES -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Tiquetes Porcentaje">
				<img src="{{ asset('images/flaticon-png/small/mis_tiquetes_99.png') }}" width="35" alt=""><b>&nbsp&nbspTiquetes %:</b>
			</label>
			<div class="col-sm-3">
				{!!Form::text('m_nupltiq',null, [
						'class'=>'form-control',
						'id'=>'m_nupltiq',
						'placeholder'=>'TIQUETES %...',
						'pattern'=>"[0-3]+(\.[0-3]{0,5})?%?",
						'title'=>"Porcentaje de liquidación sólo números con 0 ó 2 decimales",
						'maxlength'=>'12',
					])
				!!}
			</div>
			<!--PORCENTAJE LIQUIDACION OTROS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Otros Porcentaje">
				<img src="{{ asset('images/flaticon-png/small/propiedades_117_registros_contables_porcentaje_otros.jpg') }}" width="35" alt=""><b>&nbsp&nbspOtros %:</b>
			</label>
			<div class="col-sm-3">
				{!!Form::text('m_nuplotr',null, [
						'class'=>'form-control',
						'id'=>'m_nuplotr',
						'placeholder'=>'OTROS %...',
						'pattern'=>"[0-3]+(\.[0-3]{0,5})?%?",
						'title'=>"Porcentaje de liquidación sólo números con 0 ó 2 decimales",
						'maxlength'=>'12',
					])
				!!}
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
	//	FUNCION OCULTAR PROPIEDADES CONTABLES
	function mostarOcultarPropiedadesContables()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_con_tab').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_con_tab").show();
			$("#modalcrear #m_capap1055").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap1055").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap1055").attr({"title": "Ocultar Propiedades Contables"});
			//	EDITAR
			$(".mos_ocu_con_tab").show();
			$("#modaleditar #m_capap1055").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap1055").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap1055").attr({"title": "Ocultar Propiedades Contables"});
		} else {
			//	CREAR
			$(".mos_ocu_con_tab").hide();
			$("#modalcrear #m_capap1055").css({"color": "#1880C5"});
			$("#modalcrear #m_capap1055").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap1055").attr({"title": "Mostrar Propiedades CONTABLES"});
			//	EDITAR
			$(".mos_ocu_con_tab").hide();
			$("#modaleditar #m_capap1055").css({"color": "#1880C5"});
			$("#modaleditar #m_capap1055").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap1055").attr({"title": "Mostrar Propiedades CONTABLES"});			$(".mos_ocu_con_tab").hide();
			$("#modaleditar #m_capap1055").css({"color": "#1880C5"});
			$("#modaleditar #m_capap1055").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap1055").attr({"title": "Mostrar Propiedades CONTABLES"});
		}		
	}
</script>
