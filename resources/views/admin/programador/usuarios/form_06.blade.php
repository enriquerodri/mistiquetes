<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propiedades Encomiendas
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO PROPIEDADES ENCOMIENDAS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspANULAR ENCOMIENDAS
</h4>

<!--PROPIEDADES ENCOMIENDAS -->
<div class="form-group">
	<label class="col-sm-5 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -40px;"
		title="Propiedades Encomiendas">
		<img src="{{ asset('images/flaticon-png/small/propiedades_60_registros_encomiendas.png') }}" width="50" alt=""><b>&nbsp&nbspPropiedades Encomiendas:</b>
	</label>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap655"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Propiedades Encomiendas"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarPropiedadesEncomiendas(this.id)">
		</label>
	</div>
</div>

<!--PROPIEDADES ENCOMIENDAS -->
<div class="form-group">
	<!--PROPIEDADES REGISTROS -->
	<div class="mos_ocu_enc_omi" hidden="hidden">
		<div class="form-group">
			<!--REGISTROS ENCOMIENDAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Encomiendas de Contado">
				<img src="{{ asset('images/flaticon-png/small/propiedades_61_registros_encomiendas_contado.png') }}" width="35" alt=""><b>&nbsp&nbspContado:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capaeco', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capaeco',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capaeco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS ENCOMIENDAS CONTRA ENTREGA -->
			<label class="col-sm-4 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Encomiendas Contra Entrega">
				<img src="{{ asset('images/flaticon-png/small/propiedades_62_registros_encomiendas_contra_entrega.png') }}" width="35" alt=""><b>&nbsp&nbspContra Entrega:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capaecb', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capaecb',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capaecb" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--REGISTROS CREDITO -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Encomiendas Crédito">
				<img src="{{ asset('images/flaticon-png/small/propiedades_63_registros_encomiendas_credito.jpg') }}" width="35" alt=""><b>&nbsp&nbspCrédito:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capaecr', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capaecr',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capaecr" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--REGISTROS CORRESPONDENCIA INTERNA -->
			<label class="col-sm-4 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Encomiendas Correspondencia Interna">
				<img src="{{ asset('images/flaticon-png/small/propiedades_64_registros_encomiendas_correspondencia_interna.jpg') }}" width="35" alt=""><b>&nbsp&nbspCorrespondencia Interna:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capaeci', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capaeci',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capaeci" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--REGISTROS NOTAS DEBITO -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Anular Planillas de Carga">
				<img src="{{ asset('images/flaticon-png/small/propiedades_65_registros_encomiendas_planillas_de_carga.png') }}" width="35" alt=""><b>&nbsp&nbspPlanillas de Carga:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capaepc', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capaepc',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capaepc" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
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
	//	FUNCION OCULTAR PROPIEDADES ENCOMIENDAS
	function mostarOcultarPropiedadesEncomiendas()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_enc_omi').css('display') == 'none'){
			//	CREAR
			$(".mos_ocu_enc_omi").show();
			$("#modalcrear #m_capap655").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap655").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap655").attr({"title": "Ocultar Propiedades Encomiendas"});modalcrear
			//	EDITAR
			$(".mos_ocu_enc_omi").show();
			$("#modaleditar #m_capap655").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap655").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap655").attr({"title": "Ocultar Propiedades Encomiendas"});
		} else {
			//	CREAR
			$(".mos_ocu_enc_omi").hide();
			$("#modalcrear #m_capap655").css({"color": "#1880C5"});
			$("#modalcrear #m_capap655").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap655").attr({"title": "Mostrar Propiedades Encomiendas"});modalcrear
			//	EDITAR			$(".mos_ocu_enc_omi").hide();
			$("#modaleditar #m_capap655").css({"color": "#1880C5"});
			$("#modaleditar #m_capap655").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap655").attr({"title": "Mostrar Propiedades Encomiendas"});modalcrear
			$(".mos_ocu_enc_omi").hide();
			$("#modaleditar #m_capap655").css({"color": "#1880C5"});
			$("#modaleditar #m_capap655").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap655").attr({"title": "Mostrar Propiedades Encomiendas"});
		}		
	}
</script>
