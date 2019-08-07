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
</div>

<!-- ESTADO -->
<div class="form-group">
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

//	FUNCION DIGITO DE VERIFICACION
function Obtenerdv(id)
{

	//	MODAL CREAR
	var vpri, x, y, z, i, nit1, dv1;
	var nit1 = $("#modalcrear #"+id+"").val();

	if (isNaN(nit1))
		{
		$("#modalcrear #m_nudiver").val(0);
		alert('El valor digitado no es un numero valido');
	} else {
		vpri = new Array(16); 
		x=0 ; y=0 ; z=nit1.length ;
		vpri[1]=3;
		vpri[2]=7;
		vpri[3]=13; 
		vpri[4]=17;
		vpri[5]=19;
		vpri[6]=23;
		vpri[7]=29;
		vpri[8]=37;
		vpri[9]=41;
		vpri[10]=43;
		vpri[11]=47;  
		vpri[12]=53;  
		vpri[13]=59; 
		vpri[14]=67; 
		vpri[15]=71;
		for(i=0 ; i<z ; i++)
		{ 
			y=(nit1.substr(i,1));
		    //document.write(y+"x"+ vpri[z-i] +":");
			x+=(y*vpri[z-i]);
		    //document.write(x+"<br>");     
		} 
		y=x%11
		//document.write(y+"<br>");
		if (y > 1)
			{
				dv1=11-y;
			} else {
				dv1=y;
			}
			//document.form1.dv.value=dv1;
			$("#modalcrear #m_nudiver").val(dv1);
	}

	//	MODAL EDITAR
	var vpri, x, y, z, i, nit1, dv1;
	var nit1 = $("#modaleditar #"+id+"").val();

	if (isNaN(nit1))
		{
		$("#modaleditar #m_nudiver").val(0);
		alert('El valor digitado no es un numero valido');
	} else {
		vpri = new Array(16); 
		x=0 ; y=0 ; z=nit1.length ;
		vpri[1]=3;
		vpri[2]=7;
		vpri[3]=13; 
		vpri[4]=17;
		vpri[5]=19;
		vpri[6]=23;
		vpri[7]=29;
		vpri[8]=37;
		vpri[9]=41;
		vpri[10]=43;
		vpri[11]=47;  
		vpri[12]=53;  
		vpri[13]=59; 
		vpri[14]=67; 
		vpri[15]=71;
		for(i=0 ; i<z ; i++)
		{ 
			y=(nit1.substr(i,1));
		    //document.write(y+"x"+ vpri[z-i] +":");
			x+=(y*vpri[z-i]);
		    //document.write(x+"<br>");     
		} 
		y=x%11
		//document.write(y+"<br>");
		if (y > 1)
			{
				dv1=11-y;
			} else {
				dv1=y;
			}
			//document.form1.dv.value=dv1;
			$("#modaleditar #m_nudiver").val(dv1);
	}
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

//	FUNCION ARMA NOMBRE
function Armanombre(id)
{
	//alert('Arma nombre');
	//'m_canombr','m_caprnom','m_casenom','m_caprape','m_caseape',

	//	MODAL CREAR
	//0- LIMPIA NOMBRE
	var dato_00 = ""
	$("#modalcrear #m_canombr").val(dato_00);
	//1- PRIMER NOMBRE
	var dato_01 = $("#modalcrear #m_caprnom").val() + " ";
	//2- SEGUNDO NOMBRE
	var dato_02 = $("#modalcrear #m_casenom").val() + " ";
	//3- PRIMER APELLIDO
	var dato_03 = $("#modalcrear #m_caprape").val() + " ";
	//3- SEGUNDO APELLIDO
	var dato_04 = $("#modalcrear #m_caseape").val();
	//4- ARMA NOMBRE
    var dato_05 = dato_01 + dato_02 + dato_03 + dato_04
    //5- ELIMINA DOBLE ESPACIO
    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
    //6- DEVUELVE RESULTADO
	$("#modalcrear #m_canombr").val(dato_06);

    //	MODAL EDITAR
	//0- LIMPIA NOMBRE
	var dato_00 = ""
	$("#modaleditar #m_canombr").val(dato_00);
	//1- PRIMER NOMBRE
	var dato_01 = $("#modaleditar #m_caprnom").val() + " ";
	//2- SEGUNDO NOMBRE
	var dato_02 = $("#modaleditar #m_casenom").val() + " ";
	//3- PRIMER APELLIDO
	var dato_03 = $("#modaleditar #m_caprape").val() + " ";
	//3- SEGUNDO APELLIDO
	var dato_04 = $("#modaleditar #m_caseape").val();
	//4- ARMA NOMBRE
    var dato_05 = dato_01 + dato_02 + dato_03 + dato_04
    //5- ELIMINA DOBLE ESPACIO
    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
    //6- DEVUELVE RESULTADO
	$("#modaleditar #m_canombr").val(dato_06);

}

//	FUNCION EDAD ACTUAL - FECHA DE NACIMIENTO
function Obtenered(object) {
	var feincon = ""
	var nuexper = ""
	if ($(object).parents('div#modalcrear').length) {
		feincon = "#modalcrear #m_fenacim" 
		nuexper = "#modalcrear #m_nuedada"
	} else {
		feincon = "#modaleditar #m_fenacim"
		nuexper = "#modaleditar #m_nuedada"
	}

	var fec_hoy_obt = new Date();
    var fec_ini_con = new Date($(feincon).val());
    var fec_ini_org = new Date($(feincon).val());

	if (isNaN(fec_ini_con)) {
		//alert('La fecha esta vacia');
		$(nuexper).val(0);
		//cuadrarFechas.variables.valorFechaInicio = $(feincon).val()
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
	    if (val_exp_dat >= 0 ) {
	    	    if (val_exp_dat < 9) {
		        // DEMASIADOS AÑOS 
				$(feincon).val(getFormattedDate(fec_hoy_obt));
				$(nuexper).val(val_noa_dat);
				swal({
					type: 'warning',
					title: ('Fecha no válida'),
					html: ('<b>Con esta fecha tendría menos de '+ val_exp_dat +' años de Edad</br></br>Será asignada la fecha de hoy <br><br>La eda mínima válida es de 9 años <br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
					confirmButtonText: 'Listo',
					confirmButtonColor: '#5CB85C',
					showConfirmButton: false
				})
		    } 
		    if (val_exp_dat > 90) {
		        // DEMASIADOS AÑOS 
				$(feincon).val(getFormattedDate(fec_hoy_obt));
				$(nuexper).val(val_noa_dat);
				swal({
					type: 'warning',
					title: ('Fecha no válida'),
					html: ('<b>Con esta fecha tendría más de '+ val_exp_dat +' años de Edad<br><br>Será asignada la fecha de hoy <br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
					confirmButtonText: 'Listo',
					confirmButtonColor: '#5CB85C',
					showConfirmButton: false
				})
		    } else {
		    	$(nuexper).val(fec_dif_obt);
		    }
		} else {
			$(feincon).val(getFormattedDate(fec_hoy_obt));
			$(nuexper).val(val_noa_dat);
			swal({
				type: 'error',
				title: ('Fecha no válida'),
				html: ('<b>La fecha de Nacimiento no puede ser superior a hoy<br><br>Será asignada la fecha de hoy <br><br><a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
				confirmButtonText: 'Listo',
				confirmButtonColor: '#5CB85C',
				showConfirmButton: false
			})
	    }
    }  
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
