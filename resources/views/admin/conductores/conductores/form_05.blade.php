<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Propietario
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- TITULO INFORMACION LABORAL -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-copy"></span>&nbsp&nbspINFORMACION LABORAL
</h4>
<!-- CARGO - DIVISION -->
<div class="form-group">
	<!-- CARGO -->
	<label class="col-sm-2 control-label">Cargo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucocar',$cargos,null, [
					'class'=>'form-control',
					'id'=>'m_nucocar',
					'required'=>'required',
					'placeholder'=>'CARGO...',
					'title'=>"Lista de seleccción Cargo",
					'onchange'=>'datosCargo(this.id)'
				])
			!!}
			<label for="m_nucocar" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Cargo">
			</label>
		</div>
	</div>
	<!-- DIVISION -->
	<label class="col-sm-2 control-label">División:</label>
	<div class="col-sm-4">
		{!! Form::text('m_nucodiv',null, [
				'class'=>'form-control',
				'id'=>'m_nucodiv',
				'required'=>'required',
				'placeholder'=>'DIVISION...',
				'title'=>"División",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>

<!-- GRUPO DE TRABAJO - TIPO DE CONTRATO LABORAL -->
<div class="form-group">
	<!-- GRUPO DE TRABAJO -->
	<label class="col-sm-2 control-label">Grupo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucogrt',$grupostrabajos,null, [
					'class'=>'form-control',
					'id'=>'m_nucogrt',
					'required'=>'required',
					'placeholder'=>'GRUPO DE TRABAJO...',
					'title'=>"Lista de seleccción Grupo"
				])
			!!}
			<label for="m_nucogrt" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Grupo">
			</label>
		</div>
	</div>
	<!-- TIPO DE CONTRATO LABORAL -->
	<label class="col-sm-2 control-label">Contrato:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucocol',$tiposcontratos,null, [
					'class'=>'form-control',
					'id'=>'m_nucocol',
					'required'=>'required',
					'placeholder'=>'TIPO CONTRATO...',
					'title'=>"Lista de seleccción Tipo Contrato Laboral"
				])
			!!}
			<label for="m_nucocol" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo Contrato">
			</label>
		</div>
	</div>
</div>

<!-- TITULO VEHICULO PRINCIPAL -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-bus"></span>&nbsp&nbspVEHICULO PRINCIPAL
</h4>
<!-- ESTADO CONDUCTOR-->
<div class="form-group">
	<!-- FECHA VEHICULO ACTUAL -->
	<label class="col-sm-2 control-label">Fecha:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevehac',null, [
					'class'=>'form-control',
					'id'=>'m_fevehac',
					'placeholder'=>'FECHA ESTADO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_fevehac" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Estado [ ACTIVO - INACTIVO ]">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fevehac"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fevehac"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
</div>

<!-- DETALLES ESTADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Detalles:</label>
	<div class="col-sm-10">
		{!!Form::text('m_camovac',null, [
				'class'=>'form-control',
				'id'=>'m_camovac',
				'required'=>'required',
				'placeholder'=>'DETALLES...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Detalles del Estado (5 a 50 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- ORDENADO POR ESTADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Ordenado Por:</label>
	<div class="col-sm-10">
		{!!Form::text('m_caorvco',null, [
				'class'=>'form-control',
				'id'=>'m_caorvco',
				'required'=>'required',
				'placeholder'=>'ORDENADO POR...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,20}",
				'title'=>"Ordenado por - Nombre Funcionario (5 a 20 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'20',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- VEHICULO ACTUAL - PLACA N° INTERNO --> 
<div class="form-group">
	<!-- PLACA -->
	<label class="col-sm-2 control-label">Placa:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::select('m_caplaca',$vehiculoactconductores,null, [
					'class'=>'form-control',
					'id'=>'m_caplaca',
					'required'=>'required',
					'placeholder'=>'PLACA...',
					'title'=>"Lista de seleccción Vehículo actual",
					'onchange'=>'datosVehiculo(this.id)'
				])
			!!}
			<label for="m_caplaca" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Vehículo">
			</label>
		</div>
	</div>
	<!-- NUMERO INTERNO -->
	<label class="col-sm-2 control-label">N°:</label>
	<div class="col-sm-4">
		{!! Form::text('m_canuint',null, [
				'class'=>'form-control',
				'id'=>'m_canuint',
				'required'=>'required',
				'placeholder'=>'N° Interno...',
				'title'=>"N° Interno",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>

<!-- TITULO VEHICULO PRINCIPAL -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-plus"></span>
	<span class="fa fa-bus"></span>&nbsp&nbspOTROS VEHICULO AUTORIZADOS
</h4>

<!-- FUNCIONES -->
<script>
	//	CARGOS - DIVISIONES
	function datosCargo(id)
	{
		//	MODAL CREAR
		var x = $("#modalcrear #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-cargo')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
	            console.log(data);
	            $('#modalcrear #m_nucodiv').val(data[1]);
	        }               
	    })

	    //	MODAL EDITAR 
	    var x = $("#modaleditar #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-cargo')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
	            console.log(data);
	            $('#modaleditar #m_nucodiv').val(data[1]);
	        }               
	    })
	}

	//	CARGOS - DIVISIONES
	function datosVehiculo(id)
	{

		//	MODAL CREAR
		var x = $("#modalcrear #"+id+"").val();
		if (x!="") {
			$.ajax({
		        url: "{{route('datos-vehiculo')}}",
		        data:{id: x },
		        type: "get",
		        success:function(data){
		            $('#modalcrear #m_canuint').val(data[1][0].m_canuint);

		        }               
		    })
		    return
		}
		
	    //	MODAL EDITAR 
	    var x = $("#modaleditar #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-vehiculo')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
                $('#modaleditar #m_canuint').val(data[1][0].m_canuint);
	        }               
	    })
	}


</script>

<script>

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

function asignar_fecha_hoy (id) {
	var hoy_fecha = new Date();
	var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
	// ASIGNA FECHA HOY
	// CREAR
	$("#modalcrear #"+id+"").val(getFormattedDate(hoy_fecha));
	// EDITAR
	$("#modaleditar #"+id+"").val(getFormattedDate(hoy_fecha));
	// ENFOCA
	$("#modalcrear #"+id+"").focus();
	$("#modaleditar #"+id+"").focus();
}

function asignar_fecha_minima (id) {
	var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
	// ASIGNA FECHA MINIMA - 1 AÑO ATRAS
	// CREAR
	$("#modalcrear #"+id+"").val(getFormattedDate(ant_anios));
	// EDITAR
	$("#modaleditar #"+id+"").val(getFormattedDate(ant_anios));
	// ENFOCA
	$("#modalcrear #"+id+"").focus();
	$("#modaleditar #"+id+"").focus();
}

//	borrar_fecha 
function borrar_fecha (id) {
	//var hoy_fecha = new Date();
	// ASIGNA FECHA HOY
	// CREAR
	$("#modalcrear #"+id+"").val("");
	// EDITAR
	$("#modaleditar #"+id+"").val("");
	// ENFOCA
	$("#modalcrear #"+id+"").focus();
	$("#modaleditar #"+id+"").focus();
}
</script>