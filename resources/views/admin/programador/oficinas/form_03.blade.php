<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Oficinas
//					Acordeon Parámetros III
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO INFORMACION ENCOMIENDAS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspCAJA
</h4>

<!-- GASTOS DE VIAJE - EGRESOS -->
<div class="form-group">
	<!-- GASTOS DE VIAJE -->
	<label class="col-sm-2 control-label">Gastos de viaje:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacagdv', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cacagdv',
					'required'=>'required',
					'placeholder'=>'GASTOS DE VIAJE',
					'title'=>"Lista de selección Gastos de viaje [ SI - NO ]"
				])
			!!}
			<label for="m_cacagdv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Gastos de viaje [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- EGRESOS -->
	<label class="col-sm-2 control-label">Egresos:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacaegr', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cacaegr',
					'required'=>'required',
					'placeholder'=>'EGRESOS',
					'title'=>"Lista de selección Egresos [ SI - NO ]"
				])
			!!}
			<label for="m_cacaegr" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Egresos [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- INGRESOS - NOTAS CREDITO -->
<div class="form-group">
	<!-- INGRESOS -->
	<label class="col-sm-2 control-label">Ingresos:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacaing', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cacaing',
					'required'=>'required',
					'placeholder'=>'INGRESOS',
					'title'=>"Lista de selección Ingresos [ SI - NO ]"
				])
			!!}
			<label for="m_cacaing" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ingresos [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- NOTAS CREDITO -->
	<label class="col-sm-2 control-label">Notas crédito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacancr', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cacancr',
					'required'=>'required',
					'placeholder'=>'NOTAS CREDITO',
					'title'=>"Lista de selección Notas crédito [ SI - NO ]"
				])
			!!}
			<label for="m_cacancr" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Notas crédito [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- NOTAS DEBITO - DOCUMENTOS MANUALES -->
<div class="form-group">
	<!-- NOTAS DEBITO -->
	<label class="col-sm-2 control-label">Notas debito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacandb', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cacandb',
					'required'=>'required',
					'placeholder'=>'NOTAS DEBITO',
					'title'=>"Lista de selección Notas debito [ SI - NO ]"
				])
			!!}
			<label for="m_cacandb" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Notas debito [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- DOCUMENTOS MANUALES -->
	<label class="col-sm-2 control-label">Documentos Manuales:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacadma', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cacadma',
					'required'=>'required',
					'placeholder'=>'DOCUMENTOS MANUALES',
					'title'=>"Lista de selección Documentos Manuales [ SI - NO ]"
				])
			!!}
			<label for="m_cacadma" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Documentos Manuales [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<script>
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

    