<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Motivos anulación documentos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<div class="form-group">
	<label class="col-sm-3 control-label">Departamento:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'NOMBRE DEPARTAMENTO...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Nombre Departamento (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_canombr" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave compuesta (Departamento + País)">
			</label>
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">País:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucopai',$paises, null, [
					'class'=>'form-control',
					'id'=>'m_nucopai',
					'required'=>'required',
					'placeholder'=>'PAÍS...',
					'title'=>"Lista de seleccción País"
				]) 
			!!}
			<label for="m_nucopai" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar País">
			</label>
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Código Nacional:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!!Form::text('m_cacodna',null, [
					'class'=>'form-control',
					'id'=>'m_cacodna',
					'required'=>'required',
					'placeholder'=>'CÓDIGO NACIONAL...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
					'title'=>"Código Nacional (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'10',
					'onkeyup'=>'myFunction(this.id)',
				]) 
			!!}
			<label for="m_nucopai" class="glyphicon glyphicon-certificate" rel="tooltip" title="Código Nacional">
			</label>
		</div>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Estado:</label>
	<div class="col-sm-9">
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
