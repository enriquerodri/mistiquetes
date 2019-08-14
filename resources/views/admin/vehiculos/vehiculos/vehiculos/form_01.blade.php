<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Vehiculos
//					Acordeon Datos Generales
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- NPLACA -->
<div class="form-group">
	<label class="col-sm-2 control-label">Placa:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-lg">
			{!! Form::text('m_caplaca',null, [
					'class'=>'form-control',
					'id'=>'m_caplaca',
					'placeholder'=>'N° DE PLACA...',
					'pattern'=>"[A-Z 0-9 -]{6,10}",
					'title'=>"Número único de Placa (6 a 10 dígitos)",
					'maxlength'=>'10',
					'onkeyup'=>'this.value=this.value.toUpperCase()'
				]) 
			!!}
			<label for="m_caplaca" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>

	<!-- NUMERO INTERNO -->
	<label class="col-sm-2 control-label">N° Interno:</label>
	<div class="col-sm-4">
		{!! Form::text('m_canuint',null, [
				'class'=>'form-control',
				'id'=>'m_canuint',
				'placeholder'=>'N° INTERNO...',
				'pattern'=>"[A-Z 0-9 -]{1,20}",
				'title'=>"Número Interno (1 a 20 caracteres - A-Z 0-9 -)",
				'maxlength'=>'50',
				'onkeyup'=>'this.value=this.value.toUpperCase()'
			]) 
		!!}
	</div>
</div>

<!-- CENTRO DE COSTOS -->
<div class="form-group">
	<!-- CENTRO DE COSTOS -->
	<label class="col-sm-2 control-label">Cen Costos:</label>
	<div class="col-sm-4">
		{!! Form::text('m_cacenco',null, [
				'class'=>'form-control',
				'id'=>'m_cacenco',
				'placeholder'=>'CENTRO DE COSTOS...',
				'pattern'=>"[A-Z 0-9 -]{1,20}",
				'title'=>"Centro de Costos (1 a 20 caracteres - A-Z 0-9 -)",
				'maxlength'=>'50',
				'onkeyup'=>'this.value=this.value.toUpperCase()'
			]) 
		!!}
	</div>
	<!-- TIPOS -->
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caestad',
					['ACTIVO'=>'ACTIVO',
					'INACTIVO'=>'INACTIVO',
					'RETIRADO'=>'RETIRADO',], null,[ 
					'class'=>'form-control',
					'id'=>'m_caestad',
					'placeholder'=>'ESTADO...',
					'title'=>"Lista de selección Estado"
				])
			!!}
			<label for="m_caestad" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado">
			</label>
		</div>
	</div>
</div>

<!-- TIPO - VINCULO -->
<div class="form-group">
	<!-- TIPO -->
	<label class="col-sm-2 control-label">Tipo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catipos',
					['CARGA'=>'CARGA',
					'PASAJEROS'=>'PASAJEROS',], null,[ 
					'class'=>'form-control',
					'id'=>'m_catipos',
					'placeholder'=>'TIPO...',
					'title'=>"Lista de selección Tipo"
				])
			!!}
			<label for="m_catipos" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo">
			</label>
		</div>
	</div>
	<!-- VINCULO -->
	<label class="col-sm-2 control-label">Vínculo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caviemp',
					['AFILIADO'=>'AFILIADO',
					'CONVENIO'=>'CONVENIO',
					'VIRTUAL'=>'VIRTUAL',], null,[ 
					'class'=>'form-control',
					'id'=>'m_caviemp',
					'placeholder'=>'VINCULO EMPRESARIAL...',
					'title'=>"Lista de selección Vínculo"
				])
			!!}
			<label for="m_caviemp" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Vínculo">
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
            $('#modalcrear #datoDepa').val(data[1]);
            $('#modalcrear #datoPais').val(data[2]);
            $('#modalcrear #datoInd1').val(data[5]);
            $('#modalcrear #datoInd2').val(data[6]);
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
            $('#modaleditar #datoDepa').val(data[1]);
            $('#modaleditar #datoPais').val(data[2]);
            $('#modaleditar #datoInd1').val(data[5]);
            $('#modaleditar #datoInd2').val(data[6]);
        }               
    })
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

</script>
