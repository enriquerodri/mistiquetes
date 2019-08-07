<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Documentos Conductores
//					Acordeon Conductor
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO DOCUMENTOS CONDUCTOR -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspDOCUMENTOS CONDUCTOR
</h4>
<!-- BOTON AGREGAR -->
<div class="form-group">
	<div class="col-sm-2">
		<a id="btnagregardocumento"
			class="btn btn-success"
			onclick="agregarDocumentoPersona()"
			style="margin-left: 50px; margin-top: -5px; margin-bottom: -10px;"
			data-toggle=""
			data-target="#">
			<i class="fa fa-plus"
				style="font-size:18px;text-shadow:2px 2px 4px #000000;"
				data-toggle="tooltip"
				title="Agregar Documento Seleccionado..."
				data-placement="right">
			</i>
		</a>
	</div> 
	<label class="col-sm-3 control-label">Agregar Documento:</label>
	<div class="col-sm-7">
		<div class="icon-addon addon-md">
			{!!Form::select('m_canombr_documento',$maestrodocumentos,null, [
					'class'=>'form-control',
					'id'=>'m_nucodigo_d',
					'placeholder'=>'DOCUMENTO...',
					'title'=>"Lista de seleccción Documento",
					'onchange'=>'datosComplementariosDocumento(this.id)'
				])
			!!}
			<label for="m_nucodigo_d" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Documento">
			</label>
		</div>
	</div>
</div>

<!-- DATOS COMPLEMENTARIOS -->
<!-- DOCUMENTO CONTROLA VENCIMIENTO - DIAS DE ALERTA -->
<div class="form-group">
	<!-- CONTROLA VENCIMIENTO -->
	<label class="col-sm-1 control-label">Inactiva:</label>
	<div class="col-sm-5">
		{!!Form::text('m_cainact',null, [
				'class'=>'form-control',
				'id'=>'m_cainact_dorigen',
				'placeholder'=>'INACTIVA...',
				'title'=>"Inactiva [SI - NO]",
				'maxlength'=>'2',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
	<!-- DIAS DE ALERTA -->
	<label class="col-sm-1 control-label">Días:</label>
	<div class="col-sm-5">
		{!!Form::text('m_nudiapv',null, [
				'class'=>'form-control',
				'id'=>'m_nudiapv_dorigen',
				'placeholder'=>'DIAS DE ALERTA...',
				'pattern'=>"0-9{0,3}",
				'title'=>"Días de alerta por vencimiento",
				'maxlength'=>'3',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>
<hr class="separador">
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
		<!-- TABLA FIN ENCABEZADO -->
		<tbody></tbody>
	</table>
</div>
<!-- FIN TABLA -->

<div class="editartablaDocumentosPersonas" hidden="hidden">
	<!-- DOCUMENTO NOMBRE -->
	<h4 class="modal-title"
		id="myModalLabel"
		style="text-align: center; font-size:16px; color: #0E2FF5;">
		<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITANDO DOCUMENTO
	</h4>
	<!-- DOCUMENTO OCULTAR -->
	<a onclick="ocultarDocumento()"
		id="btnocultar"
		class="btn btn-warning"
		title="Ocultar registro"
		data-placement="right"
		style="margin-left: 10px; margin-bottom: 10px;">
		<i class="fa fa-eye" style="font-size:20px;text-shadow:2px 2px 4px #000000;" ></i>
	</a>
	<h5 class="modal-title"
		id="myModalLabel"
		style="text-align: left; font-size:18px; color: #F50E19; margin-bottom: 10px; text-decoration: overline;">
		<span class="fa fa-lock"></span>&nbsp&nbspDatos protegidos
	</h5>
	<div class="form-group">
		<label class="col-sm-1 control-label">Nombre:</label>
		<div class="col-sm-7">
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
		<!-- ID DOCUMENTO -->
		<label class="col-sm-1 control-label">Id:</label>
		<div class="col-sm-3">
			{!!Form::text('m_nucodig_d',null, [
					'class'=>'form-control',
					'id'=>'m_nucodig_d',
					'placeholder'=>'ID DOCUMENTO...',
					'title'=>"Identificador Documento",
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105'
				]) 
			!!}
		</div>
	</div>

	<!-- NUEVO -->
	<!-- DOCUMENTO CONTROLA VENCIMIENTO - DIAS DE ALERTA -->
	<div class="form-group">
		<!-- CONTROLA VENCIMIENTO -->
		<label class="col-sm-1 control-label">Inactiva:</label>
		<div class="col-sm-7">
			{!!Form::text('m_cainact',null, [
					'class'=>'form-control',
					'id'=>'m_cainact_d',
					'placeholder'=>'CONTROLA VENCIMIENTO...',
					'pattern'=>"A-Z {0,2}",
					'title'=>"Controla vencimiento DOCUMENTO [SI - NO]",
					'maxlength'=>'2',
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105'
				])
			!!}
		</div>
		<!-- DIAS DE ALERTA -->
		<label class="col-sm-1 control-label">Días:</label>
		<div class="col-sm-3">
			{!!Form::text('m_nudiapv',null, [
					'class'=>'form-control',
					'id'=>'m_nudiapv_d',
					'placeholder'=>'DIAS DE ALERTA...',
					'pattern'=>"0-9{0,3}",
					'title'=>"Días de alerta por vencimiento",
					'maxlength'=>'3',
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105'
				])
			!!}
		</div>
	</div>

	<!-- TITULO DATOS PARA ACTUALIZAR -->
	<h5 class="modal-title"
		id="myModalLabel"
		style="text-align: left; font-size:18px; color: #319709; margin-top: 10px;margin-bottom: 10px; text-decoration: overline;">
		<span class="fa fa-list-alt"></span>&nbsp&nbspDatos actualizables
	</h5>

	<!-- DOCUMENTO NUMERO -->
	<div class="form-group">
		<!-- DOCUMENTO NUMERO -->
		<label class="col-sm-1 control-label">N°:</label>
		<div class="col-sm-7">
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
		<div class="col-sm-11">
			<div class="icon-addon addon-md">
				{!!Form::select('m_nucocie',$ciudades,null, [
						'class'=>'form-control',
						'id'=>'m_nucocie_d',
						'placeholder'=>'CIUDAD...',
						'title'=>"Lista de seleccción Ciudad",
						'onchange'=>'datosCiudadDocumentos(this.id)'
					])
				!!}
				<label for="m_nucocie_d" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad">
				</label>
			</div>
		</div>
	</div>
	<!-- DEPARTAMENTO -->
	<div class="form-group">
		<label class="col-sm-1 control-label">Depto:</label>
		<div class="col-sm-6">
			{!!Form::text('datoDepa_d',null, [
					'class'=>'form-control',
					'id'=>'datoDepa_d',
					'title'=>"Departamento",
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105'
				]) 
			!!}
		</div>
		<!-- PAIS -->
		<label class="col-sm-2 control-label">Pais:</label>
		<div class="col-sm-3">
			{!! Form::text('datoPais_d', null, [
					'class'=>'form-control',
					'id'=>'datoPais_d',
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
	<div class="text-center">
		<!-- DOCUMENTO OCULTAR -->
		<a onclick="ocultarDocumento()"
			id="btnocultar"
			class="btn btn-warning"
			title=""
			data-placement="right"
			style="margin-left: 10px;">
			<i class="fa fa-eye"
				style="font-size:20px;text-shadow:2px 2px 4px #000000;">
			</i>
			<i style="font-size:13px;text-shadow:2px 2px 4px #000000; font-style: normal;">&nbsp&nbspOcultar Documento</i>
		</a>&nbsp
		<!-- BOTON GUARDAR -->
		<button type="button"
			id="guardarDocumentoPersona"
			class="btn btn-primary"
			style="text-shadow:2px 2px 4px #000000;">
			<i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspGuardar Documento</button>&nbsp
		<!-- BOTON ELIMINAR -->
		<button type="button"
			id="eliminarDocumentoPersona"
			class="btn btn-danger"
			style="text-shadow:2px 2px 4px #000000;">
			<i class="fa fa-trash" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspEliminar Documento</button>
	</div>
</div>

<script>

	//	FUNCIONES
	//	DOCUMENTOS: #accordion12b

	$('#accordion12b').on('show.bs.collapse hide.bs.collapse', function (e) {
	  if (e.type == 'show') {
	   //alert("abierto")
	  } else {
		$(".editartablaDocumentosPersonas").hide()
	  }
	})

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
	function datosCiudadDocumentos(id)
	{
		
		//	MODAL CREAR
		var x = $("#modalcrear #"+id+"").val();

		if (x!="") {
				$.ajax({
		        url: "{{route('datos-ciudad')}}",
		        data:{id: x },
		        type: "get",
		        success:function(data){
		            $('#modalcrear #datoDepa_d').val(data[1]);
		            $('#modalcrear #datoPais_d').val(data[2]);
		            $('#modalcrear #datoInd1_d').val(data[5]);
		            $('#modalcrear #datoInd2_d').val(data[6]);
		        }               
		    })
			return
		}
	
	    //	MODAL EDITAR
	    var x = $("#modaleditar #"+id+"").val();
		if (x!="") {
			$.ajax({
		        url: "{{route('datos-ciudad')}}",
		        data:{id: x },
		        type: "get",
		        success:function(data){
		            $('#modaleditar #datoDepa_d').val(data[1]);
		            $('#modaleditar #datoPais_d').val(data[2]);
		            $('#modaleditar #datoInd1_d').val(data[5]);
		            $('#modaleditar #datoInd2_d').val(data[6]);
		        }               
		    })
			return
		}
	}
	
</script>

<script>

	$( "#modaleditar #guardarDocumentoPersona" ).click(function(e) {
	   //alert(this.id);

 	 	e.preventDefault();
        
        //AGREGRAR TODOS LOS CAMPOS DE LA TABLA DOCUMENTOS
        //NOMBRE CONDUCTOR
        var nombre_conductor_d = $('#modaleditar #m_canombr').val()
        //
        var m_nucodig = $('#modaleditar #m_nucodig_d').val()
        var m_canombr = $('#modaleditar #m_canombr_d').val()
		var m_feexped = $('#modaleditar #m_feexped_d').val()
        var m_feinici = $('#modaleditar #m_feinici_d').val()
		var m_fevenci = $('#modaleditar #m_fevenci_d').val()
        var m_canumer = $('#modaleditar #m_canumer_d').val()
        var m_cacateg = $('#modaleditar #m_cacateg_d').val()
        var m_cadetal = $('#modaleditar #m_cadetal_d').val()
        var m_nucocie = $('#modaleditar #m_nucocie_d').val()
        var m_cainact = $('#modaleditar #m_cainact_d').val()
        var m_nudiapv = $('#modaleditar #m_nudiapv_d').val()
		var agregarDocumentoPersona = false;

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
			agregarDocumentoPersona: agregarDocumentoPersona,
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
					html: ('<b>'+ m_canombr +'<br><br>'+ nombre_conductor_d +' <br><br>Actualizado Satisfactoriamente</b><br><br> <a onclick="swal.close();" class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
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

	function agregarDocumentoPersona(){

		var codigoDocumento = $("#modaleditar #m_nucodigo_d").val();
		var inactivaDocumento = $("#modaleditar #m_cainact_dorigen").val();
		var diasAlertaDocumento = $("#modaleditar #m_nudiapv_dorigen").val();
		var codigoPersona   = $("#modaleditar #m_id").val();
		var nombreDocumento = $("#modaleditar #m_nucodigo_d option:selected").text();
		var agregarDocumentoPersona = true;
        //NOMBRE CONDUCTOR
        var nombre_conductor_d = $('#modaleditar #m_canombr').val()
        //
		var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
		
		if (nombreDocumento!='DOCUMENTO...') {
			var data={
				m_nucodigo_d: codigoDocumento,
				m_cainact: inactivaDocumento,
				m_nudiapv:diasAlertaDocumento,
				m_id: codigoPersona,
				nombreDocumento: nombreDocumento,
				agregarDocumentoPersona: agregarDocumentoPersona,
				_token:token
			};

			var host = "/ticket/public"

			$.ajax({
	                url: host + '/guardarDocumentoPersona',
	                type: 'POST',
	                data: data,
	                dataType: 'JSON',
	                success: function (data) {

						if(typeof data[0].m_nucodig !== "undefined" ){

								$('#modaleditar #tablaDocumentosPersonas tbody')
								    .append($('<tr>')
										.append($('<td>').append($('<button>')
											             .attr('id',data[0].m_nucodig+'editarTablaDocumentosPersonas')
											             .attr('type','button')
											             .attr('class','btn btn-primary')
											             .addClass('fa fa-edit')
											             .attr('style','font-size:18px;text-shadow:2px 2px 4px #000000;')
											             .attr('title','Editar registro')
										               	 .attr('onclick','editartablaDocumentosPersonas(this)')
									               	   	 .attr('data-myval',JSON.stringify(data[0]))		
									               	   	 .attr('validarnuevo',"true")					             
											            ))
								       	.append($('<td>').html(data[0].m_canombr))
		    							.append($('<td>').html(data[0].m_feexped))
		    							.append($('<td>').html(data[0].m_feinici))
		    							.append($('<td>').html(data[0].m_fevenci))
    							)

						    swal({
						        title: ('Documento'),
						        html: ('<b>' + nombreDocumento + '<br><br>' + nombre_conductor_d + ' <br><br>Agregado Satisfactoriamente</b><br><br> <a onclick="swal.close();" class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
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
						} else {
						    //alert("este registro ya esta guardado ")
						    swal({
						        title: ('Documento'),
						        html: ('<b>' + nombreDocumento + '<br><br>' + nombre_conductor_d + ' <br><br>Ya Existe!</b><br><br> <a onclick="swal.close();" class="btn btn-danger btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
						        type: 'error',
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
	                }
	        });
		}else{
	       	swal({
				title: ('Advertencia'),
				html: ('<b><br>Seleccione primero un Documento de la Lista</b><br><br> <a onclick="swal.close();" class="btn btn-warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
				type: 'warning',
				showCancelButton: false,
				showConfirmButton: false,
				//timer:2500
			}).then((result) => {
				if (result.value) {
					swal(
			    		'Deleted!',
			    		'Your file has been deleted.',
			    		'success'
			    )
			  }
			})
			//ENFOCA LISTA DE SELECCION DOCUMENTOS
			//$("#modaleditar #m_nucodigo_d").focus();
			//document.getElementById('#modaleditar #m_nucodigo_d').focus();
		}
		
	}

	$( "#modaleditar #eliminarDocumentoPersona" ).click(function(e) {
	   //alert(this.id);

 	 	e.preventDefault();
        var id = $('#modaleditar #m_nucodig_d').val()
        var nombre_documento = $('#modaleditar #m_canombr_d').val()
        var nombre_conductor_d = $('#modaleditar #m_canombr').val()

		if (id=="") {
			return
		}

		var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
		
		var data={id: id,_token:token};

		var host = "/ticket/public"
  	
		swal({
			title: 'Eliminar Documento:',
			html: '<h2 <b>'+nombre_documento+'</b> </h2>'+nombre_conductor_d+'<br><br><br> <span class="fa fa-bullhorn"></span>&nbsp&nbsp {{Auth::user()->m_caprnom}} &nbsp{{Auth::user()->m_casenom}} <br><br> Está @if(Auth::user()->m_catisex=="M") seguro @else segura @endif de eliminar este documento?',
			type: 'warning',
			showCancelButton: true,
			reverseButtons: true,
			cancelButtonColor: "#DD6B55",
			cancelButtonClass: "btn btn-danger btn-lg",
			cancelButtonText: '<i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i><i style="font-family:Arial;font-style: normal;font-size:15px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspNo</i>',
			confirmButtonColor: "#5cb85c",
			confirmButtonClass: "btn btn-success btn-lg",
			confirmButtonText: '<i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i><i style="font-family:Arial;font-style: normal;font-size:15px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspSi</i>',
		}).then((result) => {
			if (result) {
				$.ajax({
					url: host + '/eliminarDocumentoPersona',
					type: 'POST',
					data: data,
					dataType: 'JSON',
					success: function (data) {

						$("#" + id + "editarTablaDocumentosPersonas").parents("tr").remove();
	        			$('#modaleditar #m_nucodig_d').val("")
	        			//IGUAL EL RESTO
	        			$('#modaleditar #m_canombr_d').val("")
						$('#modaleditar #m_feexped_d').val("")
	        			$('#modaleditar #m_feinici_d').val("")
						$('#modaleditar #m_fevenci_d').val("")
	        			$('#modaleditar #m_canumer_d').val("")
	        			$('#modaleditar #m_cacateg_d').val("")
	        			$('#modaleditar #m_cadetal_d').val("")
	        			$('#modaleditar #m_nucocie_d').val("")
	        			//IGUAL EL RESTO
	                    //wal("Done!","It was succesfully deleted!","success");
	             		swal({
							title: ('Documento'),
							html: ('<b>'+ data[0].m_canombr +' <br><br>'+ nombre_conductor_d +'<br><br>Eliminado Satisfactoriamente</b><br><br> <a onclick="swal.close();" class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
							type: 'success',
							showCancelButton: false,
							showConfirmButton: false
						})
	                }
	            });
			}
		})
	});
</script>

<script>
	
	function datosComplementariosDocumento(id)
	{
		var arreglo = ($( "#modaleditar #m_nucodigo_d option:selected" ).val()).split(",");
		var m_nucodig = arreglo[0]
		var m_nudiapv = arreglo[1]
		var m_cacoven = arreglo[2]
		var m_nuorden = arreglo[3]

		$("#modaleditar #m_cainact_dorigen").val(m_cacoven);
		$("#modaleditar #m_nudiapv_dorigen").val(m_nudiapv);
	}

	function ocultarDocumento()
	{
		//alert('entra')
		$(".editartablaDocumentosPersonas").hide()
	}

</script>
