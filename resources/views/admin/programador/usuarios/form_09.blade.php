<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propiedades Rodamientos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO PROPIEDADES RODAMIENTOS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspRODAMIENTOS
</h4>

<!--PROPIEDADES RODAMIENTOS -->
<div class="form-group">
	<label class="col-sm-5 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -35px;"
		title="Propiedades Rodamientos">
		<img src="{{ asset('images/flaticon-png/small/propiedades_90_registros_rodamientos.png') }}" width="50" alt=""><b>&nbsp&nbspPropiedades Rodamientos:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap955"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Rodamientos"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarPropiedadesRodamientos(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES RODAMIENTOS -->
<div class="form-group">
	<!--PROPIEDADES REGISTROS -->
	<div class="mos_ocu_rod_ami" hidden="hidden">
		<div class="form-group">
			<!-- ADMINISTRAR PLANTILLAS DE OFICINAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Administrar Plantillas de Oficinas">
				<img src="{{ asset('images/flaticon-png/small/propiedades_91_registros_rodamientos_administrar_plantillas.png') }}" width="35" alt=""><b>&nbsp&nbspAdministrar Plantillas de Oficinas:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprpoa', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprpoa',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprpoa" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--PROGRAMAR PLANTILLAS DE OFICINAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Programar Plantillas de Oficinas">
				<img src="{{ asset('images/flaticon-png/small/propiedades_92_registros_rodamientos_programar_plantillas.png') }}" width="35" alt=""><b>&nbsp&nbspProgramar Plantillas de Oficinas:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprpop', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprpop',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprpop" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!-- ADMINISTRAR PLANTILLAS DE VEHICULOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Administrar Plantillas de Vehículos">
				<img src="{{ asset('images/flaticon-png/small/propiedades_93_registros_rodamientos_administrar_plantillas.png') }}" width="35" alt=""><b>&nbsp&nbspAdministrar Plantillas de Vehículos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprpva', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprpva',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprpva" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!-- PROGRAMAR PLANTILLAS DE VEHICULOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Programar Plantillas de Vehículos">
				<img src="{{ asset('images/flaticon-png/small/propiedades_94_registros_rodamientos_programar_plantillas.png') }}" width="35" alt=""><b>&nbsp&nbspProgramar Plantillas de Vehículos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprpvp', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprpvp',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprpvp" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!-- PROGRAMAR PLANTILLAS DE LOCALES -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Programar Plantillas Locales">
				<img src="{{ asset('images/flaticon-png/small/propiedades_95_registros_rodamientos_programar_plantillas.png') }}" width="35" alt=""><b>&nbsp&nbspProgramar Plantillas Locales:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprplo', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprplo',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprplo" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTRAR GASTOS DE VIAJE -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Registrar Gastos de Viaje">
				<img src="{{ asset('images/flaticon-png/small/propiedades_96_registros_rodamientos_gastos_de_viaje.jpg') }}" width="35" alt=""><b>&nbsp&nbspRegistrar Gastos de Viaje:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprrgv', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprrgv',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprrgv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!-- TRANSBORDOS EN LINEA -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Transbordos en Línea">
				<img src="{{ asset('images/flaticon-png/small/propiedades_97_registros_rodamientos_transbordos_linea.png') }}" width="35" alt=""><b>&nbsp&nbspTransbordos en Línea:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprtli', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprtli',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprtli" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--TRANSBORDOS LOCALES -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Transbordos en Locales">
				<img src="{{ asset('images/flaticon-png/small/propiedades_98_registros_rodamientos_transbordos_locales.png') }}" width="35" alt=""><b>&nbsp&nbspTransbordos en Locales:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_caprtlo', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_caprtlo',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_caprtlo" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
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
	//	FUNCION OCULTAR PROPIEDADES RODAMIENTOS
	function mostarOcultarPropiedadesRodamientos()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_rod_ami').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_rod_ami").show();
			$("#modalcrear #m_capap955").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap955").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap955").attr({"title": "Ocultar Propiedades Rodamientos"});
			//	EDITAR
			$(".mos_ocu_rod_ami").show();
			$("#modaleditar #m_capap955").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap955").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap955").attr({"title": "Ocultar Propiedades Rodamientos"});
		} else {
			//	CREAR
			$(".mos_ocu_rod_ami").hide();
			$("#modalcrear #m_capap955").css({"color": "#1880C5"});
			$("#modalcrear #m_capap955").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap955").attr({"title": "Mostrar Propiedades Rodamientos"});
			//	EDITAR
			$(".mos_ocu_rod_ami").hide();
			$("#modaleditar #m_capap955").css({"color": "#1880C5"});
			$("#modaleditar #m_capap955").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap955").attr({"title": "Mostrar Propiedades Rodamientos"});
		}		
	}
</script>
