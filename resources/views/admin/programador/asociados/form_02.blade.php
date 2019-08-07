<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Asociados Conductores y Propietarios vehículos
//					Acordeon Asociado
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO ASOCIADO -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspDATOS ASOCIADO
</h4>
<!-- ASOCIADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Asociado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caasoci', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caasoci',
					'required'=>'required',
					'placeholder'=>'ASOCIADO',
					'title'=>"Lista de selección Asociado"
				])
			!!}
			<label for="m_caasoci" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado">
			</label>
		</div>
	</div>
	<!-- FECHA VINCULO ASOCIADO -->
	<label class="col-sm-2 control-label">Vinculación:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevinas',null, [
					'class'=>'form-control',
					'id'=>'m_fevinas',
					'placeholder'=>'FECHA VINCULACION...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_fevinas" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fevinas"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fevinas"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
</div>

<!-- ESTADO ASOCIADO-->
<div class="form-group">
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caestas', ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'], null, [
					'class'=>'form-control',
					'id'=>'m_caestas',
					'placeholder'=>'ESTADO',
					'title'=>"Lista de selección Estado"
				])
			!!}
			<label for="m_caestas" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado">
			</label>
		</div>
	</div>
	<!-- FECHA ESTADO ASOCIADO -->
	<label class="col-sm-2 control-label">Fecha:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_feestas',null, [
					'class'=>'form-control',
					'id'=>'m_feestas',
					'placeholder'=>'FECHA ESTADO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_feestas" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feestas"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feestas"
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
		{!!Form::text('m_cadeeas',null, [
				'class'=>'form-control',
				'id'=>'m_cadeeas',
				'placeholder'=>'DETALLES...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Detalles (5 a 50 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- DETALLES ESTADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Ordenado Por:</label>
	<div class="col-sm-10">
		{!!Form::text('m_caorpas',null, [
				'class'=>'form-control',
				'id'=>'m_caorpas',
				'placeholder'=>'ORDENADO POR...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,20}",
				'title'=>"Ordenado por (5 a 20 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'20',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
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
