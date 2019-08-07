<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Oficinas
//					Acordeon CODIGO DE BARRAS - QR
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO INFORMACION CAJA -->
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
			{!! Form::select('m_cacbcgv', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbcgv',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbcgv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
	<!-- EGRESOS -->
	<label class="col-sm-2 control-label">Egresos:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbceg', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbceg',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbceg" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
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
			{!! Form::select('m_cacbcin', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbcin',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbcin" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
	<!-- NOTAS CREDITO -->
	<label class="col-sm-2 control-label">Notas crédito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbcnc', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbcnc',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbcnc" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>
<!-- NOTAS DEBITO -->
<div class="form-group">
	<!-- NOTAS DEBITO -->
	<label class="col-sm-2 control-label">Notas debito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbcnd', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbcnd',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbcnd" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>

<!-- TITULO INFORMACION ENCOMIENDAS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspENCOMIENDAS
</h4>

<!-- CONTADO - AL COBRO -->
<div class="form-group">
	<!-- CONTADO -->
	<label class="col-sm-2 control-label">Contado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbeco', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbeco',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbeco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
	<!-- AL COBRO -->
	<label class="col-sm-2 control-label">Al cobro:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbecb', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbecb',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbecb" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>

<!-- CREDITO - CORRESPONDENCIA INTERNA -->
<div class="form-group">
	<!-- CREDITO -->
	<label class="col-sm-2 control-label">Crédito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbecr', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbecr',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbecr" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
	<!-- CORRESPONDENCIA INTERNA -->
	<label class="col-sm-2 control-label">Correspondencia:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbeci', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbeci',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbeci" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>
<!-- PLANILLAS DE CARGA -->
<div class="form-group">
	<!-- PLANILLAS DE CARGA -->
	<label class="col-sm-2 control-label">Planillas de carga:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbepc', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbepc',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbepc" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>

<!-- TITULO INFORMACION TIQUETERIA -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspTIQUETERIA
</h4>

<!-- CONTADO - CREDITO -->
<div class="form-group">
	<!-- CONTADO -->
	<label class="col-sm-2 control-label">Contado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbeco', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbeco',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbeco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
	<!-- CREDITO -->
	<label class="col-sm-2 control-label">Crédito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbecb', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbecb',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbecb" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>

<!-- CORTESIA - REMOTA -->
<div class="form-group">
	<!-- CORTESIA -->
	<label class="col-sm-2 control-label">Cortesía:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbecr', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbecr',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbecr" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
	<!-- REMOTA -->
	<label class="col-sm-2 control-label">Remota:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbeci', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbeci',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbeci" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>

<!-- WEB - VIP -->
<div class="form-group">
	<!-- WEP -->
	<label class="col-sm-2 control-label">Web:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbtwb', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbtwb',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbtwb" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
	<!-- VIP -->
	<label class="col-sm-2 control-label">Vip:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbtvp', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbtvp',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbtvp" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>

<!-- LIBROS DE VIAJE -->
<div class="form-group">
	<!-- LIBROS DE VIAJE -->
	<label class="col-sm-2 control-label">Libros de viaje:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbtlv', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbtlv',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbtlv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
			</label>
		</div>
	</div>
</div>

<!-- TITULO INFORMACION PROTOCOLO DE ALISTAMIENTO -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspPROTOCOLOS DE ALISTAMIENTO
</h4>

<!-- PROTOCOLOS -->
<div class="form-group">
	<!-- PROTOCOLOS -->
	<label class="col-sm-2 control-label">Protocolos:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacbpda', [
					'NO'=>'NO',
					'BARRAS'=>'BARRAS',
					'QR'=>'QR'], null, [
					'class'=>'form-control',
					'id'=>'m_cacbpda',
					'required'=>'required',
					'placeholder'=>'CODIGO DE BARRAS - QR',
					'title'=>"Lista de selección Código de barras - Qr"
				])
			!!}
			<label for="m_cacbpda" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Código de barras - Qr">
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

    