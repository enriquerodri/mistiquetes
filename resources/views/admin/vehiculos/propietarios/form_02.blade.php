<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Propietarios vehículos
//					Acordeon Asociado
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- BOTON AGREGAR -->
<div class="form-group">
	<div class="col-sm-12">
		<a id="btncrear"
			class="btn btn-success"
			style="margin-left: 50px; margin-top: -5px; margin-bottom: -10px;"
			data-toggle=""
			data-target="#">
			<i class="fa fa-plus"
				style="font-size:18px;text-shadow:2px 2px 4px #000000;"
				data-toggle="tooltip"
				title="Agregar..."
				data-placement="right">
			</i>
		</a>
	</div>
</div>
<!-- INICIO TABLA -->
<div id="table-responsive">
	<table class="table table-striped table-hover table-bordered" id="tablaVehiculosPropietarios">
		<!-- INICIO ENCABEZADO -->
		<thead>
			<tr class="text-center encabezadotb">
				<td>Acciones</td>
				<td>Placa</td>
				<td>N° Interno</td>
				<td>Grupo</td>
				<td>Estado</td>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>
<!-- DOCUMENTO NOMBRE - NUMERO -->
<div class="form-group">
	<!-- DOCUMENTO NOMBRE -->
	<label class="col-sm-1 control-label">Placa:</label>
	<div class="col-sm-5">
		{!!Form::text('m_caplaca',null, [
				'class'=>'form-control',
				'id'=>'m_caplaca',
				'placeholder'=>'PLACA...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,10}",
				'title'=>"Placa",
				'maxlength'=>'10',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
	<!-- DOCUMENTO NUMERO -->
	<label class="col-sm-1 control-label">N°:</label>
	<div class="col-sm-5">
		{!!Form::text('m_canuint',null, [
				'class'=>'form-control',
				'id'=>'m_canuint',
				'placeholder'=>'NUMERO INTERNO...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{1,20}",
				'title'=>"Número Interno",
				'maxlength'=>'20',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>

<script>

//	CUANDO EL DOCUMENTO INICIE
$(function() {

});
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

	//	FUNCION CIUDAD: NOMBRE DEPARTAMENTO - PAIS
	function datosCiudad(id)
	{
		
		//	MODAL CREAR
		var x = $("#modalcrear #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-ciudad')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
	            console.log(data);
	            $('#modalcrear #datoDepa').val(data[1]);
	            $('#modalcrear #datoPais').val(data[2]);
	            $('#modalcrear #datoInd1').val(data[5]);
	            $('#modalcrear #datoInd2').val(data[6]);
	        }               
	    })

	    //	MODAL EDITAR
	    var x = $("#modaleditar #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-ciudad')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
	            console.log(data);
	            $('#modaleditar #datoDepa').val(data[1]);
	            $('#modaleditar #datoPais').val(data[2]);
	            $('#modaleditar #datoInd1').val(data[5]);
	            $('#modaleditar #datoInd2').val(data[6]);
	        }               
	    })
	}
	
</script>
