<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Seguros
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      

-->

<!-- NOMBRE SEGURO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Seguro:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'autofocus'=>'autofocus',
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'SEGURO...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Seguro (5 a 50 caracteres - A-Z Ñ 0-9 #-_.&/)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_canombr" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-3 control-label">Cod/ Nacional:</label>
	<div class="col-sm-9">
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

<!-- DESCRIPCION -->
<div class="form-group">
	<label class="col-sm-3 control-label">Descripción:</label>
	<div class="col-sm-9">
		{!!Form::textarea('m_cadescr',null, [
				'class'=>'form-control',
				'id'=>'m_cadescr',
				'required'=>'required',
				'placeholder'=>'DESCRIPCION...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,240}",
				'title'=>"Descripción (5 a 240 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'240',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- DESCRIPCION -->
<div class="form-group">
	<label class="col-sm-3 control-label">Ordenamiento: </label>
	<div class="col-sm-9">
		{!!Form::number('m_nuorden',null, [
				'class'=>'form-control',
				'id'=>'m_nuorden',
				'required'=>'required',
				'placeholder'=>'ORDENAMIENTO...',
				'min'=>'0',
				'max'=>'999',
				'maxlength'=>'3'
			])
		!!}
	</div>
</div>

<!-- RESOLUCION -->
<div class="form-group">
	<label class="col-sm-3 control-label">Resolución:</label>
	<div class="col-sm-9">
		{!!Form::textarea('m_caresol',null, [
				'class'=>'form-control',
				'id'=>'m_caresol',
				'required'=>'required',
				'placeholder'=>'RESOLUCION...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,240}",
				'title'=>"Resolución (5 a 240 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'240',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- FECHA RESOLUCION -->
<div class="form-group">
	<label class="col-sm-3 control-label">Fecha Resolución:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!!Form::date('m_feresol',null, [
					'class'=>'form-control',
					'id'=>'m_feresol',
					'required'=>'required',
					'placeholder'=>'FECHA RESOLUCION...',
					'min'=>'2018-10-31',
					'max'=>'2018-12-31'
				]) 
			!!}
			<label for="m_feresol" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
			</label>
		</div>
	</div>
</div>

<!-- CONTROLA VENCIMIENTO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Controla vencimiento:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacoven', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cacoven',
					'required'=>'required',
					'placeholder'=>'CONTROLA VENCIMIENTO...',
					'title'=>"Lista de selección Control vencimiento"
				]) 
			!!}
			<label for="m_cacoven" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Control vencimiento">
			</label>
		</div>
	</div>
</div>

<!-- DIAS DE ALERTA POR VENCIMIENTO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Días de Alerta: </label>
	<div class="col-sm-9">
		{!!Form::number('m_nudiapv',null, [
				'class'=>'form-control',
				'id'=>'m_nudiapv',
				'required'=>'required',
				'placeholder'=>'DIAS DE ALERTA POR VENCIMIENTO...',
				'min'=>'0',
				'max'=>'999',
				'maxlength'=>'3',
				'title'=>"Días de alerta por vencimiento"
			])
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-8 control-label">ESTE SEGURO APLICA A</label>
</div>

<!-- APLICA A: PERSONAS -->
<div class="form-group">
	<label class="col-sm-3 control-label">Personas:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caapper', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caapper',
					'required'=>'required',
					'placeholder'=>'APLICA A PERSONAS...',
					'title'=>"Lista de selección Personas"
				])
			!!}
			<label for="m_caapper" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Personas">
			</label>
		</div>
	</div>
</div>

<!-- APLICA A: VEHICULOS PASAJEROS -->
<div class="form-group">
	<label class="col-sm-3 control-label">Vehículos Pasajeros:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caapvpa', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caapvpa',
					'required'=>'required',
					'placeholder'=>'APLICA A PASAJEROS...',
					'title'=>"Lista de selección Vehículo Pasajeros"
				]) 
			!!}
			<label for="m_caapvpa" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Pasajeros">
			</label>
		</div>
	</div>
</div>

<!-- APLICA A: VEHICULOS CARGA -->
<div class="form-group">
	<label class="col-sm-3 control-label">Vehículos Carga:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caapvca', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caapvca',
					'required'=>'required',
					'placeholder'=>'APLICA A CARGA...',
					'title'=>"Lista de selección Vehículo Carga"
				]) 
			!!}
			<label for="m_caapvca" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Carga">
			</label>
		</div>
	</div>
</div>

<!-- APLICA A: REMOLQUE -->
<div class="form-group">
	<label class="col-sm-3 control-label">Remolques:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caaprem', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caaprem',
					'required'=>'required',
					'placeholder'=>'APLICA A REMOLQUES...',
					'title'=>"Lista de selección Remolque"
				]) 
			!!}
			<label for="m_caaprem" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Remolques">
			</label>
		</div>
	</div>
</div>

<!-- ACTUALIZACIONES MASIVAS -->
<div class="form-group">
	<label class="col-sm-3 control-label">Actualizaciones masivas:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caacmav', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caacmav',
					'required'=>'required',
					'placeholder'=>'PERMITE ACTUALIZACIONES MASIVAS...',
					'title'=>"Lista de selección Actualizaciones masivas"
				])
			!!}
			<label for="m_caacmav" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Actualizaciones masivas">
			</label>
		</div>
	</div>
</div>

<!-- PLAN ESTRATEGICO DE SEGURIDAD VIAL - PESV -->
<div class="form-group">
	<label class="col-sm-3 control-label">PESV:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caapesv', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caapesv',
					'required'=>'required',
					'placeholder'=>'PLAN ESTRATEGICO DE SEGURIDAD VIAL',
					'title'=>"Lista de selección PESV"
				])
			!!}
			<label for="m_caapesv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar PESV">
			</label>
		</div>
	</div>
</div>

<!-- CRONOGRAMA DE MANTENIMIENTO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Cronograma:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caacrma', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caacrma',
					'required'=>'required',
					'placeholder'=>'CRONOGRAMA DE MANTENIMIENTO...',
					'title'=>"Lista de selección Cronogramas"
				]) 
			!!}
			<label for="m_caacrma" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Cronograma">
			</label>
		</div>
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
