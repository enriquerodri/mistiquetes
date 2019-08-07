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

<!-- MOTIVO ANULACION -->
<div class="form-group">
	<label class="col-sm-2 control-label">Motivo:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'autofocus'=>'autofocus',
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'NOMBRE MOTIVO...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Nombre Motivo (5 a 50 caracteres - A-Z Ñ 0-9 #-_.&/)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_canombr" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave compuesta (Motivo + Aplica a + Anular documentos relacionados)">
			</label>
		</div>
	</div>
</div>

<!-- LISTA APLICA A -->
<div class="form-group">
	<label class="col-sm-2 control-label">Aplica a:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caaplic', [
					'Egresos'=>'Egresos',
					'Encomimendas'=>'Encomiendas',
					'Gastos de Viaje'=>'Gastos de Viaje',
					'Giros Enviados'=>'Giros Enviados',
					'Giros Pagados'=>'Giros Pagados',
					'Ingresos'=>'Ingresos',
					'Libros de Viaje'=>'Libros de Viaje',
					'Notas Crédito'=>'Notas Crédito',
					'Notas Débito'=>'Notas Débito',
					'Planillas de carga'=>'Planillas de Carga',
					'Tiquetes'=>'Tiquetes'], null,[
					'class'=>'form-control',
					'id'=>'m_caaplic',
					'required'=>'required',
					'placeholder'=>'APLICA A...',
					'title'=>"Lista de selección Documento al que aplica"			
					]) 
				!!}
			<label for="m_caaplic" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Documento">
			</label>
		</div>
	</div>

	<!-- LISTA ANULAR DOCUMENTOS RELACIONADOS -->
	<label class="col-sm-4 control-label">Anular Documentos relacionados:</label>
	<div class="col-sm-2">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caanure', ['SI'=>'SI','NO'=>'NO'], null, [
					'class' => 'form-control','id'=>'m_caanure',
					'id'=>'m_caanure',
					'required'=>'required',
					'placeholder'=>'ANULAR DOCUMENTOS RELACIONADOS',
					'title'=>"Lista de selección Anular documentos relacionados"
				])
			!!}
			<label for="m_caanure" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Anular documentos relacionados">
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
