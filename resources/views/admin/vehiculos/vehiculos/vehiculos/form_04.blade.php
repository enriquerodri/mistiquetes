<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Historial Vehiculos
//					Acordeon Vehiculo
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->


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
