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
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspPERMISOS
</h4>

<!-- PERMISOS USUARIOS - EGRESOS -->
<div class="form-group">
	<!-- GASTOS DE VIAJE -->
	<label class="col-sm-2 control-label">Usuarios:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_capradp', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_capradp',
					'required'=>'required',
					'placeholder'=>'PERMISOS USUARIOS',
					'title'=>"Lista de selección Permisos usuarios [ SI - NO ]"
				])
			!!}
			<label for="m_capradp" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Permisos usuarios [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- EGRESOS -->
	<label class="col-sm-2 control-label">Consolidar:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprcco', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprcco',
					'required'=>'required',
					'placeholder'=>'CONSOLIDAR CARGA',
					'title'=>"Lista de selección Consolidar carga [ SI - NO ]"
				])
			!!}
			<label for="m_caprcco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Consolidar carga [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- CUMPLIDO OFICINA DESTINO - GENERAR DESPACHOS -->
<div class="form-group">
	<!-- CUMPLIDO OFICINA DESTINO -->
	<label class="col-sm-2 control-label">Cumplido:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprccu', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprccu',
					'required'=>'required',
					'placeholder'=>'CUMPLIDO DESTINO',
					'title'=>"Lista de selección Cumplido destino [ SI - NO ]"
				])
			!!}
			<label for="m_caprccu" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Cumplido destino [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- GENERAR DESPACHOS -->
	<label class="col-sm-2 control-label">Generar despachos:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprcgd', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprcgd',
					'required'=>'required',
					'placeholder'=>' GENERAR DESPACHOS',
					'title'=>"Lista de selección Generar despachos [ SI - NO ]"
				])
			!!}
			<label for="m_caprcgd" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Generar despachos [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- IMPRIMIR GUIAS DE CARGA - TIQUETERIA ANULAR -->
<div class="form-group">
	<!-- IMPRIMIR GUIAS DE CARGA -->
	<label class="col-sm-2 control-label">Imprimir guías:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprigi', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprigi',
					'required'=>'required',
					'placeholder'=>'IMPRIMIR GUIAS',
					'title'=>"Lista de selección Imprimir guías [ SI - NO ]"
				])
			!!}
			<label for="m_caprigi" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Imprimir guías [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- TIQUETERIA ANULAR -->
	<label class="col-sm-2 control-label">Anular tiquetes:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprtan', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprtan',
					'required'=>'required',
					'placeholder'=>'ANULAR TIQUETES',
					'title'=>"Lista de selección Anular tiquetes [ SI - NO ]"
				])
			!!}
			<label for="m_caprtan" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Anular tiquetes [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- TARIFAS TEMPORADA ALTA BAJA TIQUETERIA - DEVOLUCIONES TIQUETES -->
<div class="form-group">
	<!-- TARIFAS TEMPORADA ALTA BAJA TIQUETERIA -->
	<label class="col-sm-2 control-label">Tarifas temporada:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catttab', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_catttab',
					'required'=>'required',
					'placeholder'=>'TARIFAS TEMPORADA',
					'title'=>"Lista de selección Tarifas temporada [ SI - NO ]"
				])
			!!}
			<label for="m_catttab" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tarifas temporada [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- DEVOLUCIONES TIQUETES -->
	<label class="col-sm-2 control-label">Devolución tiquetes:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprtdv', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprtdv',
					'required'=>'required',
					'placeholder'=>'DEVOLUCION TIQUETES',
					'title'=>"Lista de selección Devolución tiquetes [ SI - NO ]"
				])
			!!}
			<label for="m_caprtdv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Devolución tiquetes [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- CONVENIOS EMPRESARIALES - PLAN DE PREMIOS -->
<div class="form-group">
	<!-- CONVENIOS EMPRESARIALES -->
	<label class="col-sm-2 control-label">Convenios:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprtcv', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprtcv',
					'required'=>'required',
					'placeholder'=>'CONVENIOS EMPRESARIALES',
					'title'=>"Lista de selección Convenios empresariales SI - NO ]"
				])
			!!}
			<label for="m_caprtcv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Convenios empresariales [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- PLAN DE PREMIOS -->
	<label class="col-sm-2 control-label">Plan de premios:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caprtpp', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caprtpp',
					'required'=>'required',
					'placeholder'=>'PLAN DE PREMIOS',
					'title'=>"Lista de selección Plan de premios [ SI - NO ]"
				])
			!!}
			<label for="m_caprtpp" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Plan de premios [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- PROTOCOLO ALISTAMIENTO VEHICULOS -->
<div class="form-group">
	<!-- CORTESIA -->
	<label class="col-sm-2 control-label">Pdav:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cappdav', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cappdav',
					'required'=>'required',
					'placeholder'=>'PROTOCOLO ALISTAMIENTO VEHICULOS',
					'title'=>"Lista de selección Protocolo [ SI - NO ]"
				])
			!!}
			<label for="m_cappdav" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Protocolo [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- ESCANNER -->
	<label class="col-sm-2 control-label">Escáner:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_capdlnu', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_capdlnu',
					'required'=>'required',
					'placeholder'=>'ESCANNER',
					'title'=>"Lista de selección Escáner [ SI - NO ]"
				])
			!!}
			<label for="m_capdlnu" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Escáner [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- DATOS CONDUCTOR - DESPRENDIBLE TIQUETE -->
<div class="form-group">
	<!-- DATOS CONDUCTOR -->
	<label class="col-sm-2 control-label">Datos conductor:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catidco', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_catidco',
					'required'=>'required',
					'placeholder'=>'DATOS CONDUCTOR',
					'title'=>"Lista de selección Datos conductor [ SI - NO ]"
				])
			!!}
			<label for="m_catidco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Datos conductor [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- DESPRENDIBLE TIQUETE -->
	<label class="col-sm-2 control-label">Desprendible tiquete:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catides', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_catides',
					'required'=>'required',
					'placeholder'=>'DESPRENDIBLE TIQUETE',
					'title'=>"Lista de selección Desprendible tiquete [ SI - NO ]"
				])
			!!}
			<label for="m_catides" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Desprendible tiquete [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- MICROSEGURO -->
<div class="form-group">
	<!-- MICROSEGURO -->
	<label class="col-sm-2 control-label">Micro Seguro:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catimic', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_catimic',
					'required'=>'required',
					'placeholder'=>'MICRO SEGURO',
					'title'=>"Lista de selección Micro Seguro [ SI - NO ]"
				])
			!!}
			<label for="m_catimic" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Micro Seguro [ SI - NO ]">
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

    