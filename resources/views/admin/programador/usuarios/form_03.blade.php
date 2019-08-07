<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Administracion Registros
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO ADMINISTRACION REGISTROS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspADMINISTRACION REGISTROS
</h4>

<!--PROPIEDADES REGISTROS -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -70px;"
		title="Propiedades Registros">
		<img src="{{ asset('images/flaticon-png/small/propiedades_01_registros.png') }}" width="50" alt=""><b>&nbsp&nbspRegistros:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap355"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Registros"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarPropiedadesRegistros(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES REGISTROS -->
<div class="form-group">
	<!--PROPIEDADES REGISTROS -->
	<div class="mos_ocu_pro_reg" hidden="hidden">
		<div class="form-group">
			<!--REGISTROS AGREGAR -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Agregar Registros">
				<img src="{{ asset('images/flaticon-png/small/propiedades_02_registros_nuevo.jpg') }}" width="35" alt=""><b>&nbsp&nbspNuevo:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprenu', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprenu',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprenu" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS EDITAR -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Editar Registros">
				<img src="{{ asset('images/flaticon-png/small/propiedades_03_registros_editar.jpg') }}" width="35" alt=""><b>&nbsp&nbspEditar:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capreed', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capreed',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capreed" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--REGISTROS ELIMINAR -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Eliminar Registros">
				<img src="{{ asset('images/flaticon-png/small/propiedades_04_registros_eliminar.png') }}" width="35" alt=""><b>&nbsp&nbspEliminar:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capreel', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capreel',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capreel" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS EXPORTAR HOJA DE CALCULO -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Exportar Registros a Hoja de Cálculo">
				<img src="{{ asset('images/flaticon-png/small/propiedades_05_registros_exportar_hoja_de_calculo.png') }}" width="35" alt=""><b>&nbsp&nbspHoja de cálculo:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capreex', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capreex',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capreex" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<!--REGISTROS EXPORTAR PDF -->
		<div class="form-group">
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Exportar Registros a Pdf">
				<img src="{{ asset('images/flaticon-png/small/propiedades_05_registros_exportar_pdf.png') }}" width="35" alt=""><b>&nbsp&nbspPdf:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capreep', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capreep',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capreep" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
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
	function mostarOcultarPropiedadesRegistros()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_pro_reg').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_pro_reg").show();
			$("#modalcrear #m_capap355").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap355").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap355").attr({"title": "Ocultar Propiedades Registros"});
			//	EDITAR
			$(".mos_ocu_pro_reg").show();
			$("#modaleditar #m_capap355").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap355").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap355").attr({"title": "Ocultar Propiedades Registros"});
		} else {
			//	CREAR
			$("#modalcrear #m_capap355").css({"color": "#1880C5"});
			$("#modalcrear #m_capap355").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap355").attr({"title": "Mostrar Propiedades Registros"});
			//	EDITAR
			$(".mos_ocu_pro_reg").hide();
			$("#modaleditar #m_capap355").css({"color": "#1880C5"});
			$("#modaleditar #m_capap355").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap355").attr({"title": "Mostrar Propiedades Registros"});
		}		
	}
</script>
