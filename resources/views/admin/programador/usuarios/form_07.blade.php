<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propiedades Giros
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO PROPIEDADES GIROS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspANULAR GIROS
</h4>

<!--PROPIEDADES GIROS -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -35px;"
		title="Propiedades Giros">
		<img src="{{ asset('images/flaticon-png/small/propiedades_70_registros_giros.png') }}" width="50" alt=""><b>&nbsp&nbspPropiedades Giros:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap755"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Giros"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarPropiedadesGiros(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES GIROS -->
<div class="form-group">
	<!--PROPIEDADES REGISTROS -->
	<div class="mos_ocu_gir_osa" hidden="hidden">
		<div class="form-group">
			<!--REGISTROS GIROS ENVIADOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Giros Enviados">
				<img src="{{ asset('images/flaticon-png/small/propiedades_71_registros_giros_enviar.png') }}" width="35" alt=""><b>&nbsp&nbspEnviados:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capagen', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capagen',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capagen" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS GIROS PAGADOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Giros Pagados">
				<img src="{{ asset('images/flaticon-png/small/propiedades_72_registros_giros_pagar.png') }}" width="35" alt=""><b>&nbsp&nbspPagados:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capagpa', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capagpa',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capagpa" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
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
	//	FUNCION OCULTAR PROPIEDADES GIROS
	function mostarOcultarPropiedadesGiros()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_gir_osa').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_gir_osa").show();
			$("#modalcrear #m_capap755").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap755").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap755").attr({"title": "Ocultar Propiedades Giros"});modalcrear
			//	EDITAR
			$(".mos_ocu_gir_osa").show();
			$("#modaleditar #m_capap755").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap755").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap755").attr({"title": "Ocultar Propiedades Giros"});
		} else {
			//	CREAR
			$(".mos_ocu_gir_osa").hide();
			$("#modalcrear #m_capap755").css({"color": "#1880C5"});
			$("#modalcrear #m_capap755").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap755").attr({"title": "Mostrar Propiedades Giros"});
			//	EDITAR
			$(".mos_ocu_gir_osa").hide();
			$("#modaleditar #m_capap755").css({"color": "#1880C5"});
			$("#modaleditar #m_capap755").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap755").attr({"title": "Mostrar Propiedades Giros"});
		}		
	}
</script>
