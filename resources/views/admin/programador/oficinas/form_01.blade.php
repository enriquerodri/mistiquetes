<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Oficinas
//					Acordeon Datos Generales
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO INFORMACION GENERAL OFICINA -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspINFORMACION GENERAL
</h4>
<!-- NUIP -->
<div class="form-group">
	<label class="col-sm-2 control-label">Código:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-lg">
			{!!Form::number('m_nucecon',null, [
					'class'=>'form-control',
					'id'=>'m_nucecon',
					'required'=>'required',
					'placeholder'=>'CENTRO DE COSTOS...',
					'pattern'=>"[0-9]{1,4}",
					'title'=>"Centro de costos (1 a 4 dígitos)",
					'maxlength'=>'4'
				])
			!!}
			<label for="m_nucecon" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>
	<label class="col-sm-3 control-label">Estado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caestad', ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'], null, [
					'class'=>'form-control',
					'id'=>'m_caestad',
					'required'=>'required',
					'placeholder'=>'ESTADO',
					'title'=>"Lista de selección Estado [ ACTIVO - INACTIVO ]"
				])
			!!}
			<label for="m_caestad" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado [ ACTIVO - INACTIVO ]">
			</label>
		</div>
	</div>
</div>

<!-- NOMBRE -->
<div class="form-group">
	<label class="col-sm-2 control-label">Nombre:</label>
	<div class="col-sm-10">
		{!!Form::text('m_canombr',null, [
				'class'=>'form-control',
				'id'=>'m_canombr',
				'required'=>'required',
				'placeholder'=>'NOMBRE...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,80}",
				'title'=>"Nombre (5 a 50 caracteres - A-Z 0-9 #-.&/)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- NOMBRE CORTO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Nombre Abr.:</label>
	<div class="col-sm-10">
		{!!Form::text('m_canomco',null, [
				'class'=>'form-control',
				'id'=>'m_canomco',
				'required'=>'required',
				'placeholder'=>'NOMBRE CORTO...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,80}",
				'title'=>"Nombre (5 a 50 caracteres - A-Z 0-9 #-.&/)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- DIRECCION -->
<div class="form-group">
	<label class="col-sm-2 control-label">Dirección:</label>
	<div class="col-sm-10">
		{!!Form::text('m_cadirec',null, [
				'class'=>'form-control',
				'id'=>'m_cadirec',
				'required'=>'required',
				'placeholder'=>'DIRECCION...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Dirección (5 a 50 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- CIUDAD -->
<div class="form-group">
	<label class="col-sm-2 control-label">Ciudad:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucociu',$ciudades,null, [
					'class'=>'form-control',
					'id'=>'m_nucociu',
					'required'=>'required',
					'placeholder'=>'CIUDAD...',
					'title'=>"Lista de seleccción Ciudad",
					'onchange'=>'datosCiudad(this.id)'
				])
			!!}
			<label for="m_nucociu" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad">
			</label>
		</div>
	</div>
</div>

<!-- DEPARTAMENTO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Departamento:</label>
	<div class="col-sm-5">
		{!!Form::text('datoDepa',null, [
				'class'=>'form-control',
				'id'=>'datoDepa',
				'required'=>'required',
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
				'required'=>'required',
				'title'=>"País",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
</div>

<!-- TELEFONOS --> 
<div class="form-group">
	<label class="col-sm-2 control-label">Teléfonos:</label>
	<!-- INDICATIVO PAIS -->
	<div class="col-sm-1">
		{!! Form::text('datoInd2', null, [
				'class'=>'form-control',
				'id'=>'datoInd2',
				'required'=>'required',
				'title'=>"Indicativo País",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- INDICATIVO CIUDAD -->
	<div class="col-sm-1">
		{!!Form::text('datoInd1',null, [
				'class'=>'form-control',
				'id'=>'datoInd1',
				'required'=>'required',
				'title'=>"Indicativo Ciudad",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- NUMERO TELEFONO FIJO -->
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::tel('m_catelfi',null, [
					'class'=>'form-control',
					'id'=>'m_catelfi',
					'placeholder'=>'N° TELEFONO FIJO',
					'title'=>"Teléfono fijo (Eje: 123 4567)",
					'maxlength'=>'12'
				]) 
			!!}
			<label for="m_catelfi" class="glyphicon glyphicon-earphone" rel="tooltip" title="Teléfono fijo">
			</label>
		</div>
	</div>
	<!-- NUMERO TELEFONO MOVIL -->
	<label class="col-sm-2 control-label">Móvil:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!! Form::tel('m_camovil', null, [
					'class'=>'form-control',
					'id'=>'m_camovil',
					'placeholder'=>'N° TELEFONO MOVIL',
					'title'=>"Teléfono móvil (Eje: 321 123 4567)",
					'maxlength'=>'12'
				]) 
			!!}
			<label for="m_camovil" class="glyphicon glyphicon-phone" rel="tooltip" title="Teléfono móvil">
			</label>
		</div>
	</div>
</div>

<!-- CORREO ELECTRONICO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Correo:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::email('m_cacorel',null, [
					'class'=>'form-control',
					'id'=>'m_cacorel',
					'placeholder'=>'Dirección de correo electrónico',
					'title'=>"Dirección de correo electrónico (Eje: info@servicio.com)",
					'maxlength'=>'50',
					'onkeyup'=>'this.value=this.value.toLowerCase()'
				])
			!!}
			<label for="m_cacorel" class="glyphicon glyphicon-envelope" rel="tooltip" title="Correo electrónico">
			</label>
		</div>
	</div>
</div>

<!-- JEFE DE OFICINA -->
<div class="form-group">
	<label class="col-sm-2 control-label">Jefe:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!! Form::select('m_nuidjof', $usuarios, null, [
					'class'=>'form-control',
					'id'=>'m_nuidjof',
					'required'=>'required',
					'placeholder'=>'USUARIO...',
					'title'=>"Lista de selección Usuario"
				])
			!!}
			<label for="m_nuidjof" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Usuario">
			</label>
		</div>
	</div>
</div>

<!-- REVISOR DE OFICINA -->
<div class="form-group">
	<label class="col-sm-2 control-label">Revisor:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!! Form::select('m_nuidrev', $usuarios, null, [
					'class'=>'form-control',
					'id'=>'m_nuidrev',
					'required'=>'required',
					'placeholder'=>'USUARIO...',
					'title'=>"Lista de selección Usuario"
				])
			!!}
			<label for="m_nuidrev" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Usuario">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-3 control-label" style="margin-left: -50px;">Código Nacional:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md" style="margin-left: -20px;">
			{!! Form::text('m_cacodna',null, [
					'class'=>'form-control',
					'id'=>'m_cacodna',
					'placeholder'=>'CÓDIGO NACIONAL...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
					'title'=>"Código Nacional (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'10',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cacodna" class="glyphicon glyphicon-certificate" rel="tooltip" title="Código Nacional">
			</label>
		</div>
	</div>
</div>

<!-- TITULO INFORMACION GENERAL OFICINA -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspTERMINAL DE TRANSPORTE
</h4>
<!-- TERMINAL DE TRANSPORTE -->
<div class="form-group">
	<label class="col-sm-2 control-label">Terminal:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!! Form::select('m_nucoter', $TerminalesTransporte, null, [
					'class'=>'form-control',
					'id'=>'m_nucoter',
					'required'=>'required',
					'placeholder'=>'TERMINAL...',
					'title'=>"Lista de selección Terminal"
				])
			!!}
			<label for="m_nucoter" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Terminal">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO TERMINAL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Código:</label>
	<div class="col-sm-10">
		{!!Form::text('m_cacoter',null, [
				'class'=>'form-control',
				'id'=>'m_cacoter',
				'placeholder'=>'CODIGO...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Código (1 a 10 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- CODIGO TERMINAL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Token:</label>
	<div class="col-sm-10">
		{!!Form::text('m_catoken',null, [
				'class'=>'form-control',
				'id'=>'m_catoken',
				'placeholder'=>'TOKEN...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Token (1 a 100 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- INTERFAZ TERMINAL - CODIGO NACIONAL -->
<div class="form-group">
	<!-- INTERFAZ TERMINAL -->
	<label class="col-sm-2 control-label">Interfaz:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caizter', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caizter',
					'required'=>'required',
					'placeholder'=>'INTERFAZ TERMINAL',
					'title'=>"Lista de selección Interfaz [ SI - NO ]"
				])
			!!}
			<label for="m_caizter" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- TITULO CLSIFICACION OFICINA -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspCLASIFICACION
</h4>
<div class="form-group">
	<!-- TIPO -->
	<label class="col-sm-2 control-label">Tipo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catiofi', [
					'ADMINISTRATIVA'=>'ADMINISTRATIVA',
					'ENCOMIENDAS'=>'ENCOMIENDAS',
					'ENCOMIENDAS Y PASAJES'=>'ENCOMIENDAS Y PASAJES',
					'PASAJES'=>'PASAJES'], null, [
					'class'=>'form-control',
					'id'=>'m_catiofi',
					'required'=>'required',
					'placeholder'=>'TIPO DE OFICINA',
					'title'=>"Lista de selección Tipo de oficina"
				])
			!!}
			<label for="m_catiofi" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de oficina">
			</label>
		</div>
	</div>
	<!-- CLASE -->
	<label class="col-sm-2 control-label">Clase:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caclofi', [
					'EMPRESA'=>'EMPRESA',
					'COMISION'=>'COMISION'], null, [
					'class'=>'form-control',
					'id'=>'m_caclofi',
					'required'=>'required',
					'placeholder'=>'CLASE DE OFICINA',
					'title'=>"Lista de selección Clase de oficina"
				])
			!!}
			<label for="m_caclofi" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Clase de oficina">
			</label>
		</div>
	</div>
</div>

<!-- PROCESAMIENTO -->
<div class="form-group">
	<!-- PROCESAMIENTO -->
	<label class="col-sm-2 control-label">Procesamiento:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caproce', [
					'MANUAL'=>'MANUAL',
					'SISTEMATIZADO'=>'SISTEMATIZADO'], null, [
					'class'=>'form-control',
					'id'=>'m_caproce',
					'required'=>'required',
					'placeholder'=>'PROCESAMIENTO',
					'title'=>"Lista de selección Tipo de oficina"
				])
			!!}
			<label for="m_caproce" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Procesamiento de datos">
			</label>
		</div>
	</div>
</div>

<script>
//cuando el documento inicie
$(function() {

	//	FECHA MINIMA PERMITIDA
	// AQUI VALIDAR TODOS LOS OBJETOS FECHA - MIN Y MAX PARA VISUAL DEL CALENDARIO
	var dtToday = new Date(new Date().getTime() - 876000 * 60 * 60 * 1000);
	var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();
	if(month < 10)
	   month = '0' + month.toString();
	if(day < 10)
	   day = '0' + day.toString();

	var minDate = year + '-' + month + '-' + day;
	$("#modalcrear #m_fenacim").attr('min', minDate);
	$("#modaleditar #m_fenacim").attr('min', minDate);


	//	FECHA MAXIMA PERMITIDA
	var dtToday = new Date();
	var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();
	if(month < 10)
	   month = '0' + month.toString();
	if(day < 10)
	   day = '0' + day.toString();

	var maxDate = year + '-' + month + '-' + day;
	$("#modalcrear #m_fenacim").attr('max', maxDate);
	$("#modaleditar #m_fenacim").attr('max', maxDate);

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

//	FUNCION TELEFONO FIJO
function telefono_fijo(id)
{
	alert('telefono fijo');
	//	MODAL CREAR
    $("#modalcrear #"+id+"").mask({"mask": "(999) 999-9999"});

    //	MODAL EDITAR
    $("#modaleditar #"+id+"").mask({"mask": "(999) 999-9999"});
}

function asignar_fecha_hoy (id) {
	var hoy_fecha = new Date();
	// ASIGNA FECHA HOY
	// CREAR
	$("#modalcrear #"+id+"").val(getFormattedDate(hoy_fecha));
	// EDITAR
	$("#modaleditar #"+id+"").val(getFormattedDate(hoy_fecha));
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


// FUNCION FECHA HOY FORMATO YYYY-MM-DD 
function getFormattedDate (date) {
    return date.getFullYear()
        + "-"
        + ("0" + (date.getMonth() + 1)).slice(-2)
        + "-"
        + ("0" + date.getDate()).slice(-2);
}

</script>
