<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propiedades Administrativas
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO PROPIEDADES ADMINISTRATIVAS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspPROPIEDADES ADMINISTRATIVAS
</h4>

<!--MODULOS AUTORIZACIONES -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -70px;"
		title="Propiedades Administrativas">
		<img src="{{ asset('images/flaticon-png/small/propiedades_50_registros_autorizaciones.jpg') }}" width="50" alt=""><b>&nbsp&nbspAutorizaciones:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap455"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Autorizaciones"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarPropiedadesAdministrativas(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES REGISTROS -->
<div class="form-group">
	<!--PROPIEDADES REGISTROS -->
	<div class="mos_ocu_pro_adm" hidden="hidden">
		<div class="form-group">
			<!--REGISTROS USUARIOS TAQUILLAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Administrar Propiedades Usuarios Taquillas">
				<img src="{{ asset('images/flaticon-png/small/propiedades_02_registros_nuevo.jpg') }}" width="35" alt=""><b>&nbsp&nbspUsuarios taquillas:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capapus', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capapus',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capapus" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS AUTORIZAR CORTESIAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Autorizar Tiquetes Cortesías">
				<img src="{{ asset('images/flaticon-png/small/propiedades_51_registros_cortesias.jpg') }}" width="35" alt=""><b>&nbsp&nbspCortesías:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capauco', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capauco',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capauco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
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
	//	FUNCION OCULTAR APLICATIVOS NOSOTROS
	function mostarOcultarPropiedadesAdministrativas()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_pro_adm').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_pro_adm").show();
			$("#modalcrear #m_capap455").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap455").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap455").attr({"title": "Ocultar Propiedades Autorizaciones"});
			//	EDITAR
			$(".mos_ocu_pro_adm").show();
			$("#modaleditar #m_capap455").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap455").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap455").attr({"title": "Ocultar Propiedades Autorizaciones"});
		} else {
			//	CREAR
			$(".mos_ocu_pro_adm").hide();
			$("#modalcrear #m_capap455").css({"color": "#1880C5"});
			$("#modalcrear #m_capap455").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap455").attr({"title": "Mostrar Propiedades Autorizaciones"});modalcrear
			//	EDITAR
			$(".mos_ocu_pro_adm").hide();
			$("#modaleditar #m_capap455").css({"color": "#1880C5"});
			$("#modaleditar #m_capap455").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap455").attr({"title": "Mostrar Propiedades Autorizaciones"});
		}		
	}
</script>
