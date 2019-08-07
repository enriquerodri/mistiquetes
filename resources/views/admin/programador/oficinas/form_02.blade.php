<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Oficinas
//					Acordeon Parámetros I
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
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspENCOMIENDAS
</h4>

<!-- CONTADO - AL COBRO-->
<div class="form-group">
	<!-- CONTADO -->
	<label class="col-sm-2 control-label">Contado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caencon', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caencon',
					'required'=>'required',
					'placeholder'=>'CONTADO',
					'title'=>"Lista de selección Contado [ SI - NO ]"
				])
			!!}
			<label for="m_caencon" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Contado [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- AL COBRO -->
	<label class="col-sm-2 control-label">Al cobro:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caencob', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caencob',
					'required'=>'required',
					'placeholder'=>'AL COBRO',
					'title'=>"Lista de selección Al cobro [ SI - NO ]"
				])
			!!}
			<label for="m_caencob" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Al cobro [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- CREDITO - CORRESPONDENCIA-->
<div class="form-group">
	<!-- CREDITO -->
	<label class="col-sm-2 control-label">Crédito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caencre', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caencre',
					'required'=>'required',
					'placeholder'=>'CREDITO',
					'title'=>"Lista de selección Crédito [ SI - NO ]"
				])
			!!}
			<label for="m_caencre" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Crédito [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- CORRESPONDENCIA -->
	<label class="col-sm-2 control-label">Correspondencia:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caencoi', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caencoi',
					'required'=>'required',
					'placeholder'=>'CORRESPONDENCIA',
					'title'=>"Lista de selección Correspondencia [ SI - NO ]"
				])
			!!}
			<label for="m_caencoi" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Correspondencia [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- TITULO INFORMACION GIROS -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspGIROS
</h4>

<!-- TRANSMITIDOS - RECIBIDOS -->
<div class="form-group">
	<!-- TRANSMITIDOS -->
	<label class="col-sm-2 control-label">Transmitidos:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cagienv', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cagienv',
					'required'=>'required',
					'placeholder'=>'TRANSMITIDOS',
					'title'=>"Lista de selección Transmitidos [ SI - NO ]"
				])
			!!}
			<label for="m_cagienv" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Transmitidos [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- RECIBIDOS -->
	<label class="col-sm-2 control-label">Recibidos:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cagirec', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cagirec',
					'required'=>'required',
					'placeholder'=>'RECIBIDOS',
					'title'=>"Lista de selección Recibidos [ SI - NO ]"
				])
			!!}
			<label for="m_cagirec" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Recibidos [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- TITULO INFORMACION TIQUETES -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspTIQUETES
</h4>

<!-- CONTADO - CREDITO-->
<div class="form-group">
	<!-- CONTADO -->
	<label class="col-sm-2 control-label">Contado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caticon', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caticon',
					'required'=>'required',
					'placeholder'=>'CONTADO',
					'title'=>"Lista de selección Contado SI - NO ]"
				])
			!!}
			<label for="m_caticon" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Contado [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- CREDITO -->
	<label class="col-sm-2 control-label">Crédito:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caticre', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caticre',
					'required'=>'required',
					'placeholder'=>'CREDITO',
					'title'=>"Lista de selección Crédito [ SI - NO ]"
				])
			!!}
			<label for="m_caticre" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Crédito [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- CORTESIA - REMOTO -->
<div class="form-group">
	<!-- CORTESIA -->
	<label class="col-sm-2 control-label">Cortesía:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caticor', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_caticor',
					'required'=>'required',
					'placeholder'=>'CORTESIA',
					'title'=>"Lista de selección Cortesía SI - NO ]"
				])
			!!}
			<label for="m_caticor" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Cortesía [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- REMOTO -->
	<label class="col-sm-2 control-label">Remoto:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catirem', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_catirem',
					'required'=>'required',
					'placeholder'=>'REMOTO',
					'title'=>"Lista de selección Remoto [ SI - NO ]"
				])
			!!}
			<label for="m_catirem" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Remoto [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- WEB - VIP -->
<div class="form-group">
	<!-- WEB  -->
	<label class="col-sm-2 control-label">Web:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catiweb', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_catiweb',
					'required'=>'required',
					'placeholder'=>'WEB',
					'title'=>"Lista de selección Web SI - NO ]"
				])
			!!}
			<label for="m_catiweb" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Web [ SI - NO ]">
			</label>
		</div>
	</div>
	<!-- VIP -->
	<label class="col-sm-2 control-label">Vip:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cativip', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_cativip',
					'required'=>'required',
					'placeholder'=>'VIP',
					'title'=>"Lista de selección Vip [ SI - NO ]"
				])
			!!}
			<label for="m_cativip" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Vip [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- RESERVAS -->
<div class="form-group">
	<!-- RESERVAS  -->
	<label class="col-sm-2 control-label">Reservas:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catires', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_catires',
					'required'=>'required',
					'placeholder'=>'RESERVAS',
					'title'=>"Lista de selección Reservas SI - NO ]"
				])
			!!}
			<label for="m_catires" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Reservas [ SI - NO ]">
			</label>
		</div>
	</div>
</div>

<!-- TITULO INFORMACION COMPROBANTES CONTABLES -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspCOMPROBANTES CONTABLES
</h4>

<!-- COMPROBANTE CONTABLE 1 - COMPROBANTE CONTABLE 2 -->
<div class="form-group">
	<!-- COMPROBANTE CONTABLE 1 -->
	<label class="col-sm-2 control-label">Comp. Contable 1:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::text('m_cacoco1',null, [
					'class'=>'form-control',
					'id'=>'m_cacoco1',
					'placeholder'=>'COMPROBANTE 1...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,20}",
					'title'=>"Comprobante contable 1 (1 a 20 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'20',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cacoco1" class="glyphicon glyphicon-th-list" rel="tooltip" title="Comprobante contable 1">
			</label>
		</div>
	</div>
	<!-- COMPROBANTE CONTABLE 2 -->
	<label class="col-sm-2 control-label">Comp. Contable 2:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::text('m_cacoco2',null, [
					'class'=>'form-control',
					'id'=>'m_cacoco2',
					'placeholder'=>'COMPROBANTE 2...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,20}",
					'title'=>"Comprobante contable 2 (1 a 20 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'20',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cacoco2" class="glyphicon glyphicon-th-list" rel="tooltip" title="Comprobante contable 2">
			</label>
		</div>
	</div>
</div>

<!-- COMPROBANTE CONTABLE 3 - COMPROBANTE CONTABLE 4 -->
<div class="form-group">
	<!-- COMPROBANTE CONTABLE 3 -->
	<label class="col-sm-2 control-label">Comp. Contable 3:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::text('m_cacoco3',null, [
					'class'=>'form-control',
					'id'=>'m_cacoco3',
					'placeholder'=>'COMPROBANTE 3...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,20}",
					'title'=>"Comprobante contable 3 (1 a 20 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'20',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cacoco3" class="glyphicon glyphicon-th-list" rel="tooltip" title="Comprobante contable 3">
			</label>
		</div>
	</div>
	<!-- COMPROBANTE CONTABLE 4 -->
	<label class="col-sm-2 control-label">Comp. Contable 4:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::text('m_cacoco4',null, [
					'class'=>'form-control',
					'id'=>'m_cacoco4',
					'placeholder'=>'COMPROBANTE 4...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,20}",
					'title'=>"Comprobante contable 4 (1 a 20 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'20',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cacoco4" class="glyphicon glyphicon-th-list" rel="tooltip" title="Comprobante contable 4">
			</label>
		</div>
	</div>
</div>

<!-- COMPROBANTE CONTABLE 5 -->
<div class="form-group">
	<!-- COMPROBANTE CONTABLE 5 -->
	<label class="col-sm-2 control-label">Comp. Contable 5:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::text('m_cacoco5',null, [
					'class'=>'form-control',
					'id'=>'m_cacoco5',
					'placeholder'=>'COMPROBANTE 5...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,20}",
					'title'=>"Comprobante contable 5 (1 a 20 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'20',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cacoco5" class="glyphicon glyphicon-th-list" rel="tooltip" title="Comprobante contable 5">
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
