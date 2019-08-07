<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Clases de vehículo
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->

<!-- NOMBRE CLASE DE VEHICULO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Clase:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'autofocus'=>'autofocus',
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'CLASE...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Clase (5 a 50 caracteres - A-Z Ñ 0-9 #-_.&/)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_canombr" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>
</div>

<!-- NOMBRE SERVICIO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Servicio:</label>
	<div class="col-sm-9">
		{!!Form::text('m_canomse',null, [
				'autofocus'=>'autofocus',
				'class'=>'form-control',
				'id'=>'m_canomse',
				'required'=>'required',
				'placeholder'=>'SERVICIO...',
				'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Servicio (5 a 50 caracteres - A-Z Ñ 0-9 #-_.&/)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-3 control-label">Cod/ Nacional:</label>
	<div class="col-sm-4">
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

	<div class="col-sm-4">
		<!-- ESTADO -->
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
</div>

<!-- LIBROS DE VIAJE -->
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Libros de viaje:</label>
	<!-- PORCENTAJE 01 -->
	<label class="col-sm-2 control-label">Porcentaje 01:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuporce',null, [
				'class'=>'form-control',
				'id'=>'m_nuporce',
				'required'=>'required',
				'placeholder'=>'% 01...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100.00',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Libros de viaje:</label>
	<!-- PORCENTAJE 02 -->
	<label class="col-sm-2 control-label">Porcentaje 02:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nupor01',null, [
				'class'=>'form-control',
				'id'=>'m_nupor01',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- VALOR -->
	<label class="col-sm-2 control-label">Valor:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuval01',null, [
				'class'=>'form-control',
				'id'=>'m_nuval01',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.00',
				'max'=>'900000000',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- PLANILLAS DE CARGA -->
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Planillas de carga:</label>
	<!-- PORCENTAJE 01 -->
	<label class="col-sm-2 control-label">Porcentaje:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nupor02',null, [
				'class'=>'form-control',
				'id'=>'m_nupor02',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- VALOR -->
	<label class="col-sm-2 control-label">Valor:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuval02',null, [
				'class'=>'form-control',
				'id'=>'m_nuval02',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.00',
				'max'=>'900000000',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- FONDO LEY 105 LIBROS DE VIAJE -->
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Fondo ley 105 LDV:</label>
	<!-- PORCENTAJE 01 -->
	<label class="col-sm-2 control-label">Porcentaje:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nupor03',null, [
				'class'=>'form-control',
				'id'=>'m_nupor03',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- VALOR -->
	<label class="col-sm-2 control-label">Valor:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuval03',null, [
				'class'=>'form-control',
				'id'=>'m_nuval03',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.00',
				'max'=>'900000000',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- FONDO LEY 105 PLANILLAS DE CARGA -->
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Fondo ley 105 PDC:</label>
	<!-- PORCENTAJE 01 -->
	<label class="col-sm-2 control-label">Porcentaje:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nupor04',null, [
				'class'=>'form-control',
				'id'=>'m_nupor04',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- VALOR -->
	<label class="col-sm-2 control-label">Valor:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuval04',null, [
				'class'=>'form-control',
				'id'=>'m_nuval04',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.00',
				'max'=>'900000000',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- LIQUIDACION 01 -->
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Liquidación 01:</label>
	<!-- PORCENTAJE 01 -->
	<label class="col-sm-2 control-label">Porcentaje:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nupor05',null, [
				'class'=>'form-control',
				'id'=>'m_nupor05',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- VALOR -->
	<label class="col-sm-2 control-label">Valor:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuval05',null, [
				'class'=>'form-control',
				'id'=>'m_nuval05',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.00',
				'max'=>'900000000',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- LIQUIDACION 02 -->
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Liquidación 02:</label>
	<!-- PORCENTAJE 01 -->
	<label class="col-sm-2 control-label">Porcentaje:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nupor06',null, [
				'class'=>'form-control',
				'id'=>'m_nupor06',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- VALOR -->
	<label class="col-sm-2 control-label">Valor:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuval06',null, [
				'class'=>'form-control',
				'id'=>'m_nuval06',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.00',
				'max'=>'900000000',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- ABONO ROJO -->
<div class="form-group">
	<label class="col-sm-3 text-center control-label">Abono rojo:</label>
	<!-- PORCENTAJE 01 -->
	<label class="col-sm-2 control-label">Porcentaje:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nupor07',null, [
				'class'=>'form-control',
				'id'=>'m_nupor07',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.000',
				'max'=>'100',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
	<!-- VALOR -->
	<label class="col-sm-2 control-label">Valor:</label>
	<div class="col-sm-2">
		{!!Form::Number('m_nuval07',null, [
				'class'=>'form-control',
				'id'=>'m_nuval07',
				'required'=>'required',
				'placeholder'=>'% 02...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Libros de viaje (1 a 5 dígitos)",
				'title'=>"Porcentaje (1 a 5 dígitos)",
				'min'=>'0.00',
				'max'=>'900000000',
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
