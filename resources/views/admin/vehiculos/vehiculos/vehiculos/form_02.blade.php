<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Documentos Vehiculos
//					Acordeon Vehiculo
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
	<table class="table table-striped table-hover table-bordered" id="tablaDocumentosPersonas">
		<!-- INICIO ENCABEZADO -->
		<thead>
			<tr class="text-center encabezadotb">
				<td>Acciones</td>
				<td>Documento</td>
				<td>Expedición</td>
				<td>Inicio</td>
				<td>Vencimiento</td>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<!-- DOCUMENTO NOMBRE - NUMERO -->
<div class="form-group">
	<!-- <input type_d="" value="" id="m_nucodig_d"> -->
	<!-- DOCUMENTO NOMBRE -->
	<label class="col-sm-1 control-label">Docum:</label>
	<div class="col-sm-5">
		{!!Form::text('m_canombr_d',null, [
				'class'=>'form-control',
				'id'=>'m_canombr_d',
				'placeholder'=>'NOMBRE...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,80}",
				'title'=>"Nombre DOCUMENTO",
				'maxlength'=>'80',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
	<!-- DOCUMENTO NUMERO -->
	<label class="col-sm-1 control-label">N°:</label>
	<div class="col-sm-5">
		{!!Form::text('m_canumer',null, [
				'class'=>'form-control',
				'id'=>'m_canumer_d',
				'placeholder'=>'NUMERO...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{1,20}",
				'title'=>"Número",
				'maxlength'=>'20',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>
<!-- DOCUMENTO FECHA - EXPEDICION - INICIO - VENCIMIENTO --> 
<div class="form-group">
	<!-- DOCUMENTO FECHA - EXPEDICION -->
	<div class="col-sm-3">
		<label>Fecha de Expedición:</label>
		<div class="icon-addon addon-md">
			{!!Form::date('m_feexped',null, [
					'class'=>'form-control',
					'id'=>'m_feexped_d',
					'placeholder'=>'FECHA EXPEDICION...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_feexped_d" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Expedición">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feexped_d"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feexped_d"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
	<!-- DOCUMENTO FECHA - INICIO -->
	<div class="col-sm-3">
		<label>Fecha de Inicio:</label>
		<div class="icon-addon addon-md">
			{!!Form::date('m_feinici',null, [
					'class'=>'form-control',
					'id'=>'m_feinici_d',
					'placeholder'=>'FECHA INICIO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_feinici_d" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Inicio">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feinici_d"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feinici_d"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
	<!-- DOCUMENTO FECHA - VENCIMIENTO -->
	<div class="col-sm-3">
		<label>Fecha de Vencimiento:</label>
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevenci',null, [
					'class'=>'form-control',
					'id'=>'m_fevenci_d',
					'placeholder'=>'FECHA VENCIMIENTO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_fevenci_d" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Vencimiento">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fevenci_d"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fevenci_d"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
</div>

<!-- CIUDAD -->
<div class="form-group">
	<label class="col-sm-1 control-label">Ciudad:</label>
	<div class="col-sm-6">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucocie',$ciudades,null, [
					'class'=>'form-control',
					'id'=>'m_nucocie_d',
					'placeholder'=>'CIUDAD...',
					'title'=>"Lista de seleccción Ciudad",
					'onchange'=>'datosCiudad(this.id)'
				])
			!!}
			<label for="m_nucocie_d" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad">
			</label>
		</div>
	</div>
	<!-- ID DOCUMENTO -->
	<label class="col-sm-1 control-label"></label>
	<div class="col-sm-4">
		{!!Form::text('m_nucodig_d',null, [
				'class'=>'form-control',
				'id'=>'m_nucodig_d',
				'placeholder'=>'ID DOCUMENTO...',
				'title'=>"Id Documento",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
</div>

<!-- DEPARTAMENTO -->
<div class="form-group">
	<label class="col-sm-1 control-label">Depto:</label>
	<div class="col-sm-6">
		{!!Form::text('datoDepa',null, [
				'class'=>'form-control',
				'id'=>'datoDepa',
				'title'=>"Departamento",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- PAIS -->
	<label class="col-sm-2 control-label">Pais:</label>
	<div class="col-sm-3">
		{!! Form::text('datoPais', null, [
				'class'=>'form-control',
				'id'=>'datoPais',
				'title'=>"País",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
</div>

<!-- DOCUMENTO DETALLE - CATEGORIA -->
<div class="form-group">
	<!-- DOCUMENTO DETALLE -->
	<label class="col-sm-1 control-label">Detalle:</label>
	<div class="col-sm-6">
		{!!Form::text('m_cadetal',null, [
				'class'=>'form-control',
				'id'=>'m_cadetal_d',
				'placeholder'=>'DETALLE...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{1,50}",
				'title'=>"Detalle",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- DOCUMENTO CATEGORIA -->
	<label class="col-sm-2 control-label">Categoría:</label>
	<div class="col-sm-3">
		{!!Form::text('m_cacateg',null, [
				'class'=>'form-control',
				'id'=>'m_cacateg_d',
				'placeholder'=>'CATEGORIA...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{1,10}",
				'title'=>"Categoría",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- DOCUMENTO FECHA HORA REGISTRO - USUARIO -->
<div class="form-group">
	<!-- DOCUMENTO FECHA HORA REGISTRO -->
	<label class="col-sm-1 control-label">Registro:</label>
	<div class="col-sm-3">
		{!!Form::datetime('created_at',null, [
				'class'=>'form-control',
				'id'=>'created_at_d',
				'placeholder'=>'FECHA REGISTRO...',
				'title'=>"Fecha y hora de registro",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- DOCUMENTO USUARIO -->
	<label class="col-sm-2 control-label">Usuario:</label>
	<div class="col-sm-6">
		{!!Form::text('m_causreg',null, [
				'class'=>'form-control',
				'id'=>'m_causreg_d',
				'placeholder'=>'USUARIO REGISTRA...',
				'title'=>"Usuario Registra",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>

<!-- DOCUMENTO FECHA HORA ACTUALIZA - USUARIO -->
<div class="form-group">
	<!-- DOCUMENTO FECHA HORA ACTUALIZA -->
	<label class="col-sm-1 control-label">Actualiza:</label>
	<div class="col-sm-3">
		{!!Form::datetime('updated_at',null, [
				'class'=>'form-control',
				'id'=>'updated_at_d',
				'placeholder'=>'FECHA ACTUALIZA...',
				'title'=>"Fecha y hora de actualización",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- DOCUMENTO USUARIO -->
	<label class="col-sm-2 control-label">Usuario:</label>
	<div class="col-sm-6">
		{!!Form::text('m_causact',null, [
				'class'=>'form-control',
				'id'=>'m_causact_d',
				'placeholder'=>'USUARIO ACTUALIZA...',
				'title'=>"Usuario actualiza",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>

<hr class="separador">
<!-- <button type="button" id="guardarDocumentoPersona">guardar</button> -->
<div class="text-center">
	<!-- BOTON GUARDAR -->
	<button type="button"
		id="guardarDocumentoPersona"
		class="btn btn-primary"
		style="text-shadow:2px 2px 4px #000000;">
		<i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspGuardar</button>
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

<script>

	$( "#modaleditar #guardarDocumentoPersona" ).click(function(e) {
	   //alert(this.id);

 	 	e.preventDefault();
        
        //AGREGRAR TODOS LOS CAMPOS DE LA TABLA DOCUMENTOS
        var m_nucodig = $('#modaleditar #m_nucodig_d').val()
        var m_canombr = $('#modaleditar #m_canombr_d').val()
		var m_feexped = $('#modaleditar #m_feexped_d').val()
        var m_feinici = $('#modaleditar #m_feinici_d').val()
		var m_fevenci = $('#modaleditar #m_fevenci_d').val()
        var m_canumer = $('#modaleditar #m_canumer_d').val()
        var m_cacateg = $('#modaleditar #m_cacateg_d').val()
        var m_cadetal = $('#modaleditar #m_cadetal_d').val()
        var m_nucocie = $('#modaleditar #m_nucocie_d').val()

		var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
		
		var data={
			m_nucodig: m_nucodig,
			m_canombr: m_canombr,
			m_feinici: m_feinici, 
			m_feexped: m_feexped,
			m_fevenci: m_fevenci,
			m_canumer: m_canumer,
			m_cacateg: m_cacateg,
			m_cadetal: m_cadetal,
			m_nucocie: m_nucocie,_token:token};

			var host = "/ticket/public"
  	
		$.ajax({
                url: host + '/guardarDocumentoPersona',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (data) { 
               		
               		consultar($('#modaleditar #m_id').val())

                   	swal({
						title: ('Documento'),
						html: ('<b>'+ m_canombr +' <br><br>Actualizado Satisfactoriamente</b><br><br> <a onclick="swal.close();" class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
						type: 'success',
						showCancelButton: false,
						showConfirmButton: false
					}).then((result) => {
						if (result.value) {
							swal(
					    		'Deleted!',
					    		'Your file has been deleted.',
					    		'success'
					    )
					  }
					})
                }
        });
	});
</script>
