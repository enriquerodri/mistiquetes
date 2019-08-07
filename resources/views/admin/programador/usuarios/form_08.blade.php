<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propiedades Tiquetes
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO PROPIEDADES TIQUETES -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspTIQUETES
</h4>

<!--PROPIEDADES TIQUETES -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -35px;"
		title="Propiedades Tiquetes">
		<img src="{{ asset('images/flaticon-png/small/mis_tiquetes_99.png') }}" width="50" alt=""><b>&nbsp&nbspPropiedades Tiquetes:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap855"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Tiquetes"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 0px;"
				onclick="mostarOcultarPropiedadesTiquetes(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES TIQUETES -->
<div class="form-group">
	<!--PROPIEDADES REGISTROS -->
	<div class="mos_ocu_tiq_ete" hidden="hidden">
		<div class="form-group">
			<!--REGISTROS TIQUETES -->
			<label class="col-sm-4 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Abrir tiquetes">
				<img src="{{ asset('images/flaticon-png/small/propiedades_81_registros_tiquetes_abrir.jpg') }}" width="40" alt=""><b>&nbsp&nbspAbrir tiquetes:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capabti', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capabti',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capabti" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS EGRESOS -->
			<label class="col-sm-4 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Reasignar tiquetes">
				<img src="{{ asset('images/flaticon-png/small/propiedades_82_registros_tiquetes_reasignar.png') }}" width="35" alt=""><b>&nbsp&nbspReasignar tiquetes:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capreti', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capreti',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capreti" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--REGISTROS LIBROS DE VIAJE -->
			<label class="col-sm-4 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Libros de viaje">
				<img src="{{ asset('images/flaticon-png/small/propiedades_83_registros_libros_de_viaje.jpg') }}" width="35" alt=""><b>&nbsp&nbspAnular Libros de viaje:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capaldv', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capaldv',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capaldv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
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
	//	FUNCION OCULTAR PROPIEDADES TIQUETES
	function mostarOcultarPropiedadesTiquetes()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_tiq_ete').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_tiq_ete").show();
			$("#modalcrear #m_capap855").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap855").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap855").attr({"title": "Ocultar Propiedades Tiquetes"});
			//	EDITAR
			$(".mos_ocu_tiq_ete").show();
			$("#modaleditar #m_capap855").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap855").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap855").attr({"title": "Ocultar Propiedades Tiquetes"});
		} else {
			//	CREAR
			$(".mos_ocu_tiq_ete").hide();
			$("#modalcrear #m_capap855").css({"color": "#1880C5"});
			$("#modalcrear #m_capap855").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap855").attr({"title": "Mostrar Propiedades Tiquetes"});
			//	EDITAR
			$(".mos_ocu_tiq_ete").hide();
			$("#modaleditar #m_capap855").css({"color": "#1880C5"});
			$("#modaleditar #m_capap855").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap855").attr({"title": "Mostrar Propiedades Tiquetes"});
		}		
	}
</script>
