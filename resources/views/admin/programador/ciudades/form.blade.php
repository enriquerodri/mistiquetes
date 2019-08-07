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

<!-- NOMBRE CIUDAD -->
<div class="form-group">
	<label class="col-sm-3 control-label">Ciudad:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'NOMBRE...',
					'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Nombre Ciudad (5 a 50 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_canombr" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave compuesta (Ciudad + Departamento)">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-3 control-label">Nombre corto:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::text('m_canomco',null, [
					'class'=>'form-control',
					'id'=>'m_canomco',
					'required'=>'required',
					'placeholder'=>'NOMBRE CORTO...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
					'title'=>"Nombre Corto (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'10',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
		<label for="m_canomco" class="glyphicon glyphicon-map-marker" rel="tooltip" title="Nombre Corto">
		</label>
	</div>
	</div>
</div>

<!-- LISTA DEPARTAMENTOS -->
<div class="form-group">
	<label class="col-sm-3 control-label">Departamento:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucodep',$departamentos, null, [
					'class'=>'form-control',
					'id'=>'m_nucodep',
					'required'=>'required',
					'placeholder'=>'DEPARTAMENTO...',
					'title'=>"Lista de seleccción Departamentos",
					'onchange'=>'datosCiudad(this.id)'
				]) 
			!!}
			<label for="m_caaplic" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Departamento">
			</label>
		</div>
	</div>
</div>

<!-- PAIS -->
<div class="form-group">
	<label class="col-sm-3 control-label">País:</label>
	<div class="col-sm-9">
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

<!-- INDICATIVO -->
<div class="form-group">
	<label class="col-sm-3 control-label">Indicativo:</label>
	<div class="col-sm-9">
		{!!Form::Number('m_canuind',null, [
				'class'=>'form-control',
				'id'=>'m_canuind',
				'required'=>'required',
				'placeholder'=>'INDICATIVO...',
				'pattern'=>"[0-9]{1,5}",'title'=>"Indicativo (1 a 5 dígitos)",
				'title'=>"Indicativo (1 a 5 dígitos)",
				'min'=>'0',
				'max'=>'99999',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-3 control-label">Código Nacional:</label>
	<div class="col-sm-9">
		<div class="icon-addon addon-md">
			{!! Form::text('m_cacodna',null, [
					'class'=>'form-control',
					'id'=>'m_cacodna',
					'required'=>'required',
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
            //$('#modalcrear #datoDepa').val(data[1]);
            $('#modalcrear #datoPais').val(data[2]);
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
            //$('#modaleditar #datoDepa').val(data[1]);
            $('#modaleditar #datoPais').val(data[2]);
        }               
    })
}

</script>
