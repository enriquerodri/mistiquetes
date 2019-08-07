<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form_v.blade.php
//Descripción:      Consultar: Motivos anulación documentos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<div class="form-group">
	<label class="col-sm-3 control-label">Motivo:</label>
	<div class="col-sm-9">
		{!!Form::text('m_canombr',null, [
				'id'=>'m_canombr',
				'class'=>'form-control',
				'readonly'
			])
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Código Nacional:</label>
	<div class="col-sm-9">
		{!!Form::text('m_cacodna',null, [
				'id'=>'m_cacodna',
				'class'=>'form-control',
				'readonly'
			])
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Aplica a:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caaplic',null, [
				'id'=>'m_caaplic',
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Anular Documentos relacionados</label>
	<div class="col-sm-9">
		{!!Form::text('m_caanure',null, [
				'id'=>'m_caanure',
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Estado:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caestad',null, [
				'id'=>'m_caestad',
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>
