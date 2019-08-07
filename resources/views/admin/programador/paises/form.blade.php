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

<!-- NOMBRE PAIS -->
<div class="form-group">
	<label class="col-sm-3 control-label">País:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'NOMBRE PAIS...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Nombre País (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_canombr" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>
</div>

<!-- NOMBRE OFICIAL PAIS -->
<div class="form-group">
	<label class="col-sm-3 control-label">Nombre Oficial:</label>
	<div class="col-sm-9">
		{!!Form::text('m_canomof',null, [
				'class'=>'form-control',
				'id'=>'m_canomof',
				'required'=>'required',
				'placeholder'=>'NOMBRE OFICIAL...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Nombre Oficial (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- NOMBRE CAPITAL -->
<div class="form-group">
	<label class="col-sm-3 control-label">Capital:</label>
	<div class="col-sm-9">
		{!!Form::text('m_canomca',null, [
				'class'=>'form-control',
				'id'=>'m_canomca',
				'required'=>'required',
				'placeholder'=>'CAPITAL...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Nombre Capital (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)',
			]) 
		!!}
	</div>
</div>

<!-- NOMBRE MONEDA -->
<div class="form-group">
	<label class="col-sm-3 control-label">Moneda:</label>
	<div class="col-sm-9">
		{!!Form::text('m_camoned',null, [
				'class'=>'form-control',
				'id'=>'m_camoned',
				'required'=>'required',
				'placeholder'=>'MONEDA...',
				'onkeyup'=>'myFunction(this.id)',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Nombre Moneda (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'50'
			]) 
		!!}
	</div>
</div>

<!-- VALOR OFICIAL CAMBIO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Valor Oficial:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!!Form::number('m_nuvalca',null, [
					'class'=>'form-control',
					'id'=>'m_nuvalca',
					'required'=>'required',
					'placeholder'=>'VALOR OFICIAL...',
					'pattern'=>"[0-9]{0,20}",
					'title'=>"Valor Oficial Cambio (0 a 15 digitos - 0-9)",
					'maxlength'=>'20',
					'min'=>'0',
					'max'=>'20000'
				]) 
			!!}
			<label for="m_nuvalca" class="glyphicon glyphicon-usd" rel="tooltip" title="Valor Oficial Cambio">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO INTERNACIONAL -->
<div class="form-group">
	<label class="col-sm-3 control-label">Código Internacional:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!!Form::text('m_cacodna',null, [
					'class'=>'form-control',
					'id'=>'m_cacodna',
					'required'=>'required',
					'placeholder'=>'CÓDIGO INTERNACIONAL...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
					'title'=>"Código Internacional (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'10',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_cacodna" class="glyphicon glyphicon-certificate" rel="tooltip" title="Código Internacional">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO TELEFONICO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Código Telefónico:</label>
	<div class="col-sm-9">
		{!!Form::text('m_cacotel',null, [
				'class'=>'form-control',
				'id'=>'m_cacotel',
				'required'=>'required',
				'placeholder'=>'CÓDIGO TELEFÓNICO...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,5}",
				'title'=>"Código Telefónico (1 a 5 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'5',
				'onkeyup'=>'myFunction(this.id)',
			]) 
		!!}
	</div>
</div>

<!-- ESTADO -->
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
