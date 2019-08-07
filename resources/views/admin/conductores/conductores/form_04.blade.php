<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Historial Conductores
//					Acordeon Conductor
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO HISTORIAL CONDUCCION -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-history"></span>&nbsp&nbspHISTORIAL CONDUCTOR
</h4>
<!-- CONDUCTOR -->
<div class="form-group">
	<label class="col-sm-2 control-label">Conductor:</label>
	<div class="col-sm-4">
		{!! Form::text('m_cacondu', null, [
				'class'=>'form-control',
				'id'=>'m_cacondu',
				'required'=>'required',
				'placeholder'=>'CONDUCTOR',
				'title'=>"Conductor  [ SI ]",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105; text-align: center;'
			])
		!!}
	</div>
	<!-- FECHA VINCULO CONDUCTOR -->
	<label class="col-sm-2 control-label">Vinculación:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevinco',null, [
					'class'=>'form-control',
					'id'=>'m_fevinco',
					'placeholder'=>'FECHA VINCULACION...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31',
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105;'
				]) 
			!!}
			<label for="m_fevinco" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Vinculación Conductor">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fevinco"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #686F74; margin-left: -20px; margin-top: 10px;"
				onclick="">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fevinco"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #686F74; margin-left: 5px;"
				onclick="">
		</label>
	</div>
</div>

<!-- ESTADO CONDUCTOR-->
<div class="form-group">
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caestco', ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'], null, [
					'class'=>'form-control',
					'id'=>'m_caestco',
					
					'placeholder'=>'ESTADO',
					'title'=>"Lista de selección Estado [ ACTIVO - INACTIVO ]"
				])
			!!}
			<label for="m_caestco" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado [ ACTIVO - INACTIVO ]">
			</label>
		</div>
	</div>
	<!-- FECHA ESTADO CONDUCTOR -->
	<label class="col-sm-2 control-label">Fecha:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_feestco',null, [
					'class'=>'form-control',
					'id'=>'m_feestco',
					'placeholder'=>'FECHA ESTADO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_feestco" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Estado [ ACTIVO - INACTIVO ]">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feestco"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feestco"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
</div>

<!-- DETALLES ESTADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Detalles:</label>
	<div class="col-sm-10">
		{!!Form::text('m_cadeeco',null, [
				'class'=>'form-control',
				'id'=>'m_cadeeco',
				'placeholder'=>'DETALLES...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Detalles del Estado (5 a 50 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- ORDENADO POR ESTADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Ordenado Por:</label>
	<div class="col-sm-10">
		{!!Form::text('m_caorpco',null, [
				'class'=>'form-control',
				'id'=>'m_caorpco',
				'required'=>'required',
				'placeholder'=>'ORDENADO POR...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,20}",
				'title'=>"Ordenado por - Nombre Funcionario (5 a 20 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'20',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- TITULO SUSPENSION -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-hand-stop-o"></span>&nbsp&nbspSUSPENSION
</h4>
<!-- FECHA INCIO - TERMINO SUSPENSION -->
<div class="form-group">
	<!-- FECHA INCIO SUSPENSION -->
	<label class="col-sm-2 control-label">Inicio:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_feinsco',null, [
					'class'=>'form-control',
					'id'=>'m_feinsco',
					'placeholder'=>'FECHA INICIO SUSPENSION...',
				]) 
			!!}
			<label for="m_feinsco" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Inicio Suspensión aqui">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feinsco"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feinsco"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>

	<!-- FECHA TERMINO SUSPENSION -->
	<label class="col-sm-2 control-label">Termino:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fetesco',null, [
					'class'=>'form-control',
					'id'=>'m_fetesco',
					'placeholder'=>'FECHA TERMINO SUSPENSION...',
					'min'=>'2019-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_fetesco" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Termino Suspensión">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fetesco"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fetesco"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
</div>


<!-- TITULO EXPERIENCIA EN CONDUCCION -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="glyphicon glyphicon-certificate"></span>&nbsp&nbspEXPERIENCIA EN CONDUCCION
</h4>
<!-- FECHA INICIO CONDUCION - AÑOS EXPERIENCIA -->
<div class="form-group">
	<label class="col-sm-2 control-label">Inicio:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_feincon',null, [
					'class'=>'form-control test',
					'id'=>'m_feincon',
					'placeholder'=>'FECHA INICIO...',
					'onfocusout'=>'Obtenerae(this)'
				]) 
			!!}
			<label for="m_feincon" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Inicio Conducción">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feincon"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha mínima permitida"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_minima(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feincon"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>

	{{-- ESTE CAMPO DEBE SER SOLO DE LECTURA: 'readonly'=>'readonly' --}}
	<!-- AÑOS EXPERIENCIA -->
	<label class="col-sm-4 control-label">Años:</label>
	<div class="col-sm-2">
		{!!Form::text('m_nuexper',null, [
				'class'=>'form-control',
				'id'=>'m_nuexper',
				'required'=>'required',
				'placeholder'=>'AÑOS',
				'pattern'=>"[0-9]{3}",
				'title'=>"Años de experiencia en Conducción",
				'maxlength'=>'1',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>

<script>

//	FUNCIONES
//cuando el documento inicie
$(function() {

// 	VINCULACION
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
	//	FECHA MAXIMA DE VINCULACION
	$("#modalcrear #m_fevinco").attr('max', maxDate);
	$("#modaleditar #m_fevinco").attr('max', maxDate);

// 	ESTADO
	//	FECHA MINIMA PERMITIDA
	var dtToday = new Date(new Date().getTime() - 48 * 60 * 60 * 1000);
	var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
	var day = dtToday.getDay();
	var year = dtToday.getFullYear();
	if(month < 10)
	   month = '0' + month.toString();
	if(day < 10)
	   day = '0' + day.toString();

	var minDate = year + '-' + month + '-' + day;
	//	FECHA MINIMA DE ESTADO
	$("#modalcrear #m_feestco").attr('min', minDate);
	$("#modaleditar #m_feestco").attr('min', minDate);

// 	ESTAD0
	//	FECHA MAXIMA PERMITIDA
	var dtToday = new Date(new Date().getTime() + 720 * 60 * 60 * 1000);
	var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();
	if(month < 10)
	   month = '0' + month.toString();
	if(day < 10)
	   day = '0' + day.toString();

	var maxDate = year + '-' + month + '-' + day;
	//	FECHA MAXIMA DE TERMINO SUSPENSION
	$("#modalcrear #m_feestco").attr('max', maxDate);
	$("#modaleditar #m_feestco").attr('max', maxDate);


// 	INICIO SUSPENSION
	//	FECHA MINIMA PERMITIDA
	// 	INICIO SUSPENSION - 1 DIA = 24 HORA - MULTIPLICAR 24 * NUMERO DE DIAS
	var dtToday = new Date(new Date().getTime() - 48 * 60 * 60 * 1000);
	var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
	var day = dtToday.getDay();
	var year = dtToday.getFullYear();
	if(month < 10)
	   month = '0' + month.toString();
	if(day < 10)
	   day = '0' + day.toString();

	var minDate = year + '-' + month + '-' + day;
	//	FECHA MINIMA DE INICIO SUSPENSION
	$("#modalcrear #m_feinsco").attr('min', minDate);
	$("#modaleditar #m_feinsco").attr('min', minDate);

// 	INICIO SUSPENSION
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
	//	FECHA MAXIMA DE INICIO SUSPENSION
	$("#modalcrear #m_feinsco").attr('max', maxDate);
	$("#modaleditar #m_feinsco").attr('max', maxDate);


// 	TERMINO SUSPENSION
	//	FECHA MINIMA PERMITIDA
	var dtToday = new Date();
	var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();
	if(month < 10)
	   month = '0' + month.toString();
	if(day < 10)
	   day = '0' + day.toString();

	var maxDate = year + '-' + month + '-' + day;
	//	FECHA MINIMA DE TERMINO SUSPENSION
	$("#modalcrear #m_fetesco").attr('min', maxDate);
	$("#modaleditar #m_fetesco").attr('min', maxDate);

// 	TERMINO SUSPENSION
	//	FECHA MAXIMA PERMITIDA
	var dtToday = new Date(new Date().getTime() + 2880 * 60 * 60 * 1000);
	var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();
	if(month < 10)
	   month = '0' + month.toString();
	if(day < 10)
	   day = '0' + day.toString();

	var maxDate = year + '-' + month + '-' + day;
	//	FECHA MAXIMA DE TERMINO SUSPENSION
	$("#modalcrear #m_fetesco").attr('max', maxDate);
	$("#modaleditar #m_fetesco").attr('max', maxDate);


	//	FECHA MINIMA PERMITIDA - INICIO CONDUCCION
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
	//	FECHA DE INICIO CONDUCCION
	$("#modalcrear #m_feincon").attr('min', minDate);
	$("#modaleditar #m_feincon").attr('min', minDate);

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
	//	FECHA DE INICIO CONDUCCION
	$("#modalcrear #m_feincon").attr('max', maxDate);
	$("#modaleditar #m_feincon").attr('max', maxDate);

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

//	FUNCION OBTENER AÑOS DE EXPERIENCIA
function Obtenerae(object)
{
	//alert("llego")
	var feincon = ""
	var nuexper = ""
	if ($(object).parents('div#modalcrear').length) {
		feincon = "#modalcrear #m_feincon" 
		nuexper = "#modalcrear #m_nuexper"
	}
	else{
		feincon = "#modaleditar #m_feincon"
		nuexper = "#modaleditar #m_nuexper"
	}
	
	var fec_hoy_obt = new Date();
    var fec_ini_con = new Date($(feincon).val());
    var fec_ini_org = new Date($(feincon).val());

	if (isNaN(fec_ini_con))
		{
		//alert('La fecha esta vacia');
		$(nuexper).val(0);
	} else {
		// LA FECHA TIENE DATOS
		var fec_dif_obt = fec_hoy_obt.getFullYear() - fec_ini_con.getFullYear();
	    var m = fec_hoy_obt.getMonth() - fec_ini_con.getMonth();
		
		if (m < 0 || (m === 0 && fec_hoy_obt.getDate() < fec_ini_con.getDate())) {
	        fec_dif_obt--;
	    }
		
	    $(nuexper).val(fec_dif_obt);
		
	    //	VALIDA FECHA DE INICIO CONDUCCION
	    var val_noa_dat = 0;
	    var val_exp_dat = parseInt($(nuexper).val(), 10)
	    if (val_exp_dat > 0 ) {
		    if (val_exp_dat > 70) {
		        // DEMASIADOS AÑOS
				var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
				$(feincon).val(getFormattedDate(ant_anios));
				$(nuexper).val(1);
				swal({
					type: 'warning',
					title: ('Fecha no válida'),
					html: ('<b>Con esta fecha tendría más de '+ val_exp_dat +' años conduciendo<br><br>Será asignada la fecha mínima permitida<br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
					confirmButtonText: 'Listo',
					confirmButtonColor: '#5CB85C',
					showConfirmButton: false
				})
		    } else {
		    	$(nuexper).val(fec_dif_obt);
		    }
		}else{
			var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
			$(feincon).val(getFormattedDate(ant_anios));
			$(nuexper).val(1);
			swal({
				type: 'warning',
				title: ('Fecha no válida'),
				html: ('<b>La fecha de Inicio Conducción registraría menos de 1 año de experiencia<br><br>Será asignada la fecha mínima permitida<br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
				confirmButtonText: 'Listo',
				confirmButtonColor: '#5CB85C',
				showConfirmButton: false
			})
	    }
    }  
}

function asignar_fecha_hoy (id) {
	var hoy_fecha = new Date();
	var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
	// ASIGNA FECHA HOY
	// CREAR
	$("#modalcrear #"+id+"").val(getFormattedDate(hoy_fecha));
	// EDITAR
	$("#modaleditar #"+id+"").val(getFormattedDate(hoy_fecha));
	// ENFOCA
	$("#modalcrear #"+id+"").focus();
	$("#modaleditar #"+id+"").focus();
}

function asignar_fecha_minima (id) {
	var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
	// ASIGNA FECHA MINIMA - 1 AÑO ATRAS
	// CREAR
	$("#modalcrear #"+id+"").val(getFormattedDate(ant_anios));
	// EDITAR
	$("#modaleditar #"+id+"").val(getFormattedDate(ant_anios));
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

</script>
