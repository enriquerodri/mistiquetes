<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Conductores
//					Acordeon Datos Generales
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO INFORMACION GENERAL CONDUCTOR --> 
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspINFORMACION GENERAL
</h4>
<!-- NUIP -->
<div class="form-group">
	<label class="col-sm-2 control-label">Nuip:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-lg">
			{!!Form::number('m_canuipe',null, [
					'class'=>'form-control',
					'id'=>'m_canuipe',
					'required'=>'required',
					'placeholder'=>'IDENTIFICACION PERSONAL...',
					'pattern'=>"[0-9]{5,15}",
					'title'=>"Número único de identificación personal (5 a 15 dígitos)",
					'maxlength'=>'15',
					'onfocusout'=>'Obtenerdv(this.id)'
				])
			!!}
			<label for="m_canuipe" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>

	{{-- ESTE CAMPO DEBE SER SOLO DE LECTURA: 'readonly'=>'readonly' --}}
	<!-- DIGITO DE VERIFICACION -->
	<label class="col-sm-1 control-label">Digito:</label>
	<div class="col-sm-1">
		{!!Form::text('m_nudiver',null, [
				'class'=>'form-control',
				'id'=>'m_nudiver',
				'required'=>'required',
				'placeholder'=>'DV',
				'pattern'=>"[0-9]{1}",
				'title'=>"Dígito de verificación",
				'maxlength'=>'1',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>

	<!-- TIPO DE DOCUMENTO -->
	<label class="col-sm-1 control-label">Tipo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_nutipdo',$tiposdocumentos,null, [
					'class'=>'form-control',
					'id'=>'m_nutipdo',
					'required'=>'required',
					'placeholder'=>'TIPO DE DOCUMENTO...',
					'title'=>"Lista de seleccción Tipo de documento"
				])
			!!}
			<label for="m_nutipdo" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de documento">
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
				'title'=>"Nombre (5 a 80 caracteres - A-Z 0-9 #-.&/)",
				'maxlength'=>'80',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- NOMBRES -->
<div class="form-group">
	<!-- PRIMER NOMBRE -->
	<label class="col-sm-2 control-label">Pri. Nombre:</label>
	<div class="col-sm-4">
		{!! Form::text('m_caprnom',null, [
				'class'=>'form-control',
				'id'=>'m_caprnom',
				'placeholder'=>'PRIMER NOMBRE...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Primer nombre (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
		</label>
	</div>

	<!-- SEGUNDO NOMBRE -->
	<label class="col-sm-2 control-label">Seg. Nombre:</label>
	<div class="col-sm-4">
		{!! Form::text('m_casenom',null, [
				'class'=>'form-control',
				'id'=>'m_casenom',
				'placeholder' => 'SEGUNDO NOMBRE...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Segundo nombre (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
	</div>
</div>

<!-- APELLIDOS -->
<div class="form-group">
	<!-- PRIMER APELLIDO -->
	<label class="col-sm-2 control-label">Pri. Apellido:</label>
	<div class="col-sm-4">
		{!! Form::text('m_caprape',null, [
				'class'=>'form-control',
				'id'=>'m_caprape',
				'placeholder'=>'PRIMER APELLIDO...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Primer apellido (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
	</div>

	<!-- SEGUNDO APELLIDO -->
	<label class="col-sm-2 control-label">Seg. Apellido:</label>
	<div class="col-sm-4">
		{!! Form::text('m_caseape',null, [
				'class'=>'form-control',
				'id'=>'m_caseape',
				'placeholder' => 'SEGUNDO APELLIDO...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Segundo apellido (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
	</div>
</div>

<!-- FECHA NACIMIENTO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Nacimiento:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fenacim',null, [
					'class'=>'form-control',
					'id'=>'m_fenacim',
					'placeholder'=>'FECHA NACIMIENTO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31',
					'onfocusout'=>'Obtenered(this)'
				]) 
			!!}
			<label for="m_fenacim" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Nacimiento">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fenacim"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fenacim"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>

	{{-- ESTE CAMPO DEBE SER SOLO DE LECTURA: 'readonly'=>'readonly' --}}
	<!-- EDAD -->
	<label class="col-sm-4 control-label">Edad:</label>
	<div class="col-sm-2">
		{!!Form::text('m_nuedada',null, [
				'class'=>'form-control',
				'id'=>'m_nuedada',
				'required'=>'required',
				'placeholder'=>'EDAD',
				'pattern'=>"[0-9]{3}",
				'title'=>"Edad",
				'maxlength'=>'1',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105; text-align: center;'
			])
		!!}
	</div>
</div>


<!-- TIPO DE SANGRE - GENERO HUMANO -->
<div class="form-group">
	<!-- TIPO DE SANGRE -->
	<label class="col-sm-2 control-label">Tipo sangre:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catipsa', [
					'A+'=>'A+',
					'A-'=>'A-',
					'B+'=>'B+',
					'B-'=>'B-',
					'AB+'=>'AB+',
					'AB-'=>'AB-',
					'O+'=>'O+',
					'O-'=>'O-'], null, [
					'class'=>'form-control',
					'id'=>'m_catipsa',
					'placeholder'=>'TIPO DE SANGRE',
					'title'=>"Lista de selección Tipo de sangre"
				])
			!!}
			<label for="m_catipsa" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de sangre">
			</label>
		</div>
	</div>

	<!-- GENERO HUMANO -->
	<label class="col-sm-2 control-label">Genero:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catisex', [
					'FEMENINO'=>'FEMENINO',
					'MASCULINO'=>'MASCULINO',
					'NINGUNO'=>'NINGUNO'], null, [
					'class'=>'form-control',
					'id'=>'m_catisex',
					'placeholder'=>'GENERO HUMANO',
					'title'=>"Lista de selección Genero Humano"
				])
			!!}
			<label for="m_catisex" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Genero Humano">
			</label>
		</div>
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
					'onchange'=>'datosCiudadConductor(this.id)'
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

<!-- PORTAL WEB -->
<div class="form-group">
	<label class="col-sm-2 control-label">Portal Web:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::url('m_casitew',null, [
					'class'=>'form-control',
					'id'=>'m_casitew',
					'placeholder'=>'Dirección de sitio web',
					'title'=>"Dirección de sitio web (Eje: http://www.sitio.com)",
					'maxlength'=>'50',
					'onkeyup'=>'this.value=this.value.toLowerCase()'
				])
			!!}
			<label for="m_casitew" class="glyphicon glyphicon-cloud" rel="tooltip" title="Portal Web">
			</label>
		</div>
	</div>
</div>

<!-- ENVIO CORRESPONDENCIA --> 
<div class="form-group">
	<label class="col-sm-2 control-label">Correspondencia:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caenvco', [
					'CORREO'=>'CORREO',
					'DIRECCION'=>'DIRECCION',
					'RECLAMA'=>'RECLAMA'], null, [
					'class'=>'form-control',
					'id'=>'m_caenvco',
					'required'=>'required',
					'placeholder'=>'ENVIO CORRESPONDENCIA',
					'title'=>"Lista de selección Envío Correspondencia [ CORREO - DIRECCION - RECLAMA ]"
				])
			!!}
			<label for="m_caenvco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Envío Correspondencia [ CORREO - DIRECCION - RECLAMA ]">
			</label>
		</div>
	</div>
</div>

<!-- CONTACTO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Contacto:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::text('m_cadacon',null, [
					'class'=>'form-control',
					'id'=>'m_cadacon',
					'placeholder'=>'NOMBRE CONTACTO...',
					'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Nombre y apellidos Contacto (5 a 50 caracteres - A-Z 0-9 #-./&)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cadacon" class="glyphicon glyphicon-user" rel="tooltip" title="Contacto">
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

	<!-- CODIGO AUTORIZACION -->
	<label class="col-sm-3 control-label" style="margin-left: 50px;">Autorización:</label>
	<div class="col-sm-3" style="margin-right: 0px;">
		{!! Form::text('m_caautna',null, [
				'class'=>'form-control',
				'id'=>'m_caautna',
				'placeholder' => 'CODIGO...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Código de autorización (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- OFICINA DE REGISTRO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Oficina:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!! Form::select('m_nuofici',$oficina_registro,null, [
					'class'=>'form-control',
					'id'=>'m_nuofici',
					'required'=>'required',
					'placeholder'=>'OFICINA DE REGISTRO...',
					'title'=>"Lista de seleccción Oficina de registro"
				])
			!!}
			<label for="m_nuofici" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de documento">
			</label>
		</div>
	</div>
</div>

<!-- VINCULO EMPRSARIAL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Vínculo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caviemp', [
					'ASOCIADO'=>'ASOCIADO',
					'CONDUCTOR'=>'CONDUCTOR',
					'PROPIETARIO'=>'PROPIETARIO'], null, [
					'class'=>'form-control',
					'id'=>'m_caviemp',
					'required'=>'required',
					'placeholder'=>'VINCULO EMPRESARIAL',
					'title'=>"Lista de selección Vínculo empresarial [ ASOCIADO - CONDUCTOR - PROPIETARIO ]"
				])
			!!}
			<label for="m_caviemp" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Vínculo Empresarial [ ASOCIADO - CONDUCTOR - PROPIETARIO ]">
			</label>
		</div>
	</div>
	<!-- ESTADO -->
	<label class="col-sm-2 control-label">Estado:</label>
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

<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp&nbspVINCULOS
</h4>
<!-- VINCULO ASOCIADO - CONDUCTOR - PROPETARIO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Asociado:</label>
	<div class="col-sm-2">
		{!!Form::text('m_caasoci',null, [
				'class'=>'form-control',
				'id'=>'m_caasoci',
				'placeholder'=>'ASOCIADO',
				'title'=>"Asociado [ SI - NO ]",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105; text-align: center;'
			])
		!!}
	</div>
	<!-- VINCULO CONDUCTOR --> 
	<label class="col-sm-2 control-label">Conductor:</label>
	<div class="col-sm-2">
		{!!Form::text('m_cacondu',null, [
				'class'=>'form-control',
				'id'=>'m_cacondu',
				'placeholder'=>'CONDUCTOR',
				'title'=>"Conductor [ SI - NO ]",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105; text-align: center;'
			])
		!!}
	</div>
	<!-- VINCULO PROPIETARIO -->
	<label class="col-sm-2 control-label">Propietario:</label>
	<div class="col-sm-2">
		{!!Form::text('m_capropi',null, [
				'class'=>'form-control',
				'id'=>'m_capropi',
				'placeholder'=>'PROPIETARIO',
				'title'=>"Propietario [ SI - NO ]",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105; text-align: center;'
			])
		!!}
	</div>
</div>

<!-- FECHA VINCULO ASOCIADO - CONDUCTOR - PROPETARIO -->
<div class="form-group">
	<!-- FECHA VINCULO ASOCIADO -->
	<label class="col-sm-2 control-label">Desde:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevinas',null, [
					'class'=>'form-control',
					'id'=>'m_fevinas',
					'placeholder'=>'FECHA VINCULACION...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31',
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105;'
				]) 
			!!}
			<label for="m_fevinas" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Vinculación Asociado">
			</label>
		</div>
	</div>
	<!-- FECHA VINCULO CONDUCTOR -->
	<!-- <label class="col-sm-2 control-label">Vinculación:</label> -->
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevinco',null, [
					'class'=>'form-control',
					'id'=>'m_fevinco',
					'placeholder'=>'FECHA VINCULACION...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31',
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105;'
				]) 
			!!}
			<label for="m_fevinco" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Vinculación Conductor">
			</label>
		</div>
	</div>
	<!-- FECHA VINCULO PROPIETARIO -->
	<!-- <label class="col-sm-2 control-label">Vinculación:</label> -->
	<div class="col-sm-3" style="margin-left: 71px;">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevinpr',null, [
					'class'=>'form-control',
					'id'=>'m_fevinpr',
					'placeholder'=>'FECHA VINCULACION...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31',
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105;'
				]) 
			!!}
			<label for="m_fevinpr" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Vinculación Propietario">
			</label>
		</div>
	</div>
</div>

<script>

//	FUNCIONES
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

//	FUNCION DIGITO DE VERIFICACION
function Obtenerdv(id)
{

	//	MODAL CREAR
	var vpri, x, y, z, i, nit1, dv1;
	var nit1 = $("#modalcrear #"+id+"").val();

	if (isNaN(nit1))
		{
		$("#modalcrear #m_nudiver").val(0);
		alert('El valor digitado no es un numero valido');
	} else {
		vpri = new Array(16); 
		x=0 ; y=0 ; z=nit1.length ;
		vpri[1]=3;
		vpri[2]=7;
		vpri[3]=13; 
		vpri[4]=17;
		vpri[5]=19;
		vpri[6]=23;
		vpri[7]=29;
		vpri[8]=37;
		vpri[9]=41;
		vpri[10]=43;
		vpri[11]=47;  
		vpri[12]=53;  
		vpri[13]=59; 
		vpri[14]=67; 
		vpri[15]=71;
		for(i=0 ; i<z ; i++)
		{ 
			y=(nit1.substr(i,1));
		    //document.write(y+"x"+ vpri[z-i] +":");
			x+=(y*vpri[z-i]);
		    //document.write(x+"<br>");     
		} 
		y=x%11
		//document.write(y+"<br>");
		if (y > 1)
			{
				dv1=11-y;
			} else {
				dv1=y;
			}
			//document.form1.dv.value=dv1;
			$("#modalcrear #m_nudiver").val(dv1);
	}

	//	MODAL EDITAR
	var vpri, x, y, z, i, nit1, dv1;
	var nit1 = $("#modaleditar #"+id+"").val();

	if (isNaN(nit1))
		{
		$("#modaleditar #m_nudiver").val(0);
		alert('El valor digitado no es un numero valido');
	} else {
		vpri = new Array(16); 
		x=0 ; y=0 ; z=nit1.length ;
		vpri[1]=3;
		vpri[2]=7;
		vpri[3]=13; 
		vpri[4]=17;
		vpri[5]=19;
		vpri[6]=23;
		vpri[7]=29;
		vpri[8]=37;
		vpri[9]=41;
		vpri[10]=43;
		vpri[11]=47;  
		vpri[12]=53;  
		vpri[13]=59; 
		vpri[14]=67; 
		vpri[15]=71;
		for(i=0 ; i<z ; i++)
		{ 
			y=(nit1.substr(i,1));
		    //document.write(y+"x"+ vpri[z-i] +":");
			x+=(y*vpri[z-i]);
		    //document.write(x+"<br>");     
		} 
		y=x%11
		//document.write(y+"<br>");
		if (y > 1)
			{
				dv1=11-y;
			} else {
				dv1=y;
			}
			//document.form1.dv.value=dv1;
			$("#modaleditar #m_nudiver").val(dv1);
	}
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

//	FUNCION ARMA NOMBRE
function Armanombre(id)
{
	//alert('Arma nombre');
	//'m_canombr','m_caprnom','m_casenom','m_caprape','m_caseape',

	//	MODAL CREAR
	//0- LIMPIA NOMBRE
	var dato_00 = ""
	$("#modalcrear #m_canombr").val(dato_00);
	//1- PRIMER NOMBRE
	var dato_01 = $("#modalcrear #m_caprnom").val() + " ";
	//2- SEGUNDO NOMBRE
	var dato_02 = $("#modalcrear #m_casenom").val() + " ";
	//3- PRIMER APELLIDO
	var dato_03 = $("#modalcrear #m_caprape").val() + " ";
	//3- SEGUNDO APELLIDO
	var dato_04 = $("#modalcrear #m_caseape").val();
	//4- ARMA NOMBRE
    var dato_05 = dato_01 + dato_02 + dato_03 + dato_04
    //5- ELIMINA DOBLE ESPACIO
    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
    //6- DEVUELVE RESULTADO
	$("#modalcrear #m_canombr").val(dato_06);

    //	MODAL EDITAR
	//0- LIMPIA NOMBRE
	var dato_00 = ""
	$("#modaleditar #m_canombr").val(dato_00);
	//1- PRIMER NOMBRE
	var dato_01 = $("#modaleditar #m_caprnom").val() + " ";
	//2- SEGUNDO NOMBRE
	var dato_02 = $("#modaleditar #m_casenom").val() + " ";
	//3- PRIMER APELLIDO
	var dato_03 = $("#modaleditar #m_caprape").val() + " ";
	//3- SEGUNDO APELLIDO
	var dato_04 = $("#modaleditar #m_caseape").val();
	//4- ARMA NOMBRE
    var dato_05 = dato_01 + dato_02 + dato_03 + dato_04
    //5- ELIMINA DOBLE ESPACIO
    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
    //6- DEVUELVE RESULTADO
	$("#modaleditar #m_canombr").val(dato_06);

}

//	FUNCION EDAD ACTUAL - FECHA DE NACIMIENTO
function Obtenered(object) {
	var feincon = ""
	var nuexper = ""
	if ($(object).parents('div#modalcrear').length) {
		feincon = "#modalcrear #m_fenacim" 
		nuexper = "#modalcrear #m_nuedada"
	} else {
		feincon = "#modaleditar #m_fenacim"
		nuexper = "#modaleditar #m_nuedada"
	}

	var fec_hoy_obt = new Date();
    var fec_ini_con = new Date($(feincon).val());
    var fec_ini_org = new Date($(feincon).val());

	if (isNaN(fec_ini_con)) {
		//alert('La fecha esta vacia');
		$(nuexper).val(0);
		//cuadrarFechas.variables.valorFechaInicio = $(feincon).val()
	} else {
		// LA FECHA TIENE DATOS
		var fec_dif_obt = fec_hoy_obt.getFullYear() - fec_ini_con.getFullYear();
	    var m = fec_hoy_obt.getMonth() - fec_ini_con.getMonth();
		
		if (m < 0 || (m === 0 && fec_hoy_obt.getDate() < fec_ini_con.getDate())) {
	        fec_dif_obt--;
	    }
		
	    $(nuexper).val(fec_dif_obt);
		
	    //	VALIDA FECHA DE INICIO CONDUCCION
	    var val_noa_dat = 0;
	    var val_exp_dat = parseInt($(nuexper).val(), 10)
	    if (val_exp_dat >= 0 ) {
	    	    if (val_exp_dat < 9) {
		        // DEMASIADOS AÑOS 
				$(feincon).val(getFormattedDate(fec_hoy_obt));
				$(nuexper).val(val_noa_dat);
				swal({
					type: 'warning',
					title: ('Fecha no válida'),
					html: ('<b>Con esta fecha tendría menos de '+ val_exp_dat +' años de Edad</br></br>Será asignada la fecha de hoy <br><br>La eda mínima válida es de 9 años <br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
					confirmButtonText: 'Listo',
					confirmButtonColor: '#5CB85C',
					showConfirmButton: false
				})
		    } 
		    if (val_exp_dat > 90) {
		        // DEMASIADOS AÑOS 
				$(feincon).val(getFormattedDate(fec_hoy_obt));
				$(nuexper).val(val_noa_dat);
				swal({
					type: 'warning',
					title: ('Fecha no válida'),
					html: ('<b>Con esta fecha tendría más de '+ val_exp_dat +' años de Edad<br><br>Será asignada la fecha de hoy <br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
					confirmButtonText: 'Listo',
					confirmButtonColor: '#5CB85C',
					showConfirmButton: false
				})
		    } else {
		    	$(nuexper).val(fec_dif_obt);
		    }
		} else {
			$(feincon).val(getFormattedDate(fec_hoy_obt));
			$(nuexper).val(val_noa_dat);
			swal({
				type: 'error',
				title: ('Fecha no válida'),
				html: ('<b>La fecha de Nacimiento no puede ser superior a hoy<br><br>Será asignada la fecha de hoy <br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
				confirmButtonText: 'Listo',
				confirmButtonColor: '#5CB85C',
				showConfirmButton: false
			})
	    }
    }  
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


function datosCiudadConductor(id)
	{
		
		//	MODAL CREAR
		var x = $("#modalcrear #"+id+"").val();

		if (x!="") {
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
			return
		}

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
