<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Lineas vehiculos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- NOMBRE MARCA VEHICULO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Línea:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'autofocus'=>'autofocus',
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'LINEA...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{3,50}",
					'title'=>"Línea (3 a 50 caracteres - A-Z Ñ 0-9 #-_.&/)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_canombr" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave compuesta (Línea + Marca)">
			</label>
		</div>
	</div>
</div>

<!-- LINEA VEHICULO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Marca:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucomar',$marca_vehiculo,null, [
					'class'=>'form-control',
					'id'=>'m_nucomar',
					'required'=>'required',
					'placeholder'=>'MARCA VEHICULO...',
					'title'=>"Lista de seleccción Marca vehículo"
				]) 
			!!}
			<label for="m_nucomar" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Marca vehículo">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Cod/ Nacional:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::text('m_cacodna',null, [
					'class'=>'form-control',
					'id'=>'m_cacodna',
					'required'=>'required',
					'placeholder'=>'CODIGO NACIONAL...',
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

<!-- ESTADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caestad', ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'], null, [
					'class'=>'form-control',
					'id'=>'m_caestad',
					'required'=>'required',
					'placeholder'=>'ESTADO',
					'title'=>"Lista de selección Estado"
				])
			!!}
			<label for="m_caestad" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado">
			</label>
		</div>
	</div>
</div>

<script>

//	FUNCIONES
//	FUNCION MAYUSCULAS - ELIMINAR DOBLE ESPACIO
function myFunction(id)
{
    var x = $("#modalcrear #"+id+"").val();
    var y = x.toUpperCase();
    //var res = y.replace(/^\s+|\s+$/g, " ");
    var res = y.replace(/\s{2,}/g, ' ');
    $("#modalcrear #"+id+"").val(res);

    var x = $("#modaleditar #"+id+"").val();
    var y = x.toUpperCase();
    //var res = y.replace("  ", "");
    var res = y.replace(/\s{2,}/g, ' ');
    $("#modaleditar #"+id+"").val(res);

}
</script>
