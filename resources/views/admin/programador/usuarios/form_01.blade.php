<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Usuarios
//					Acordeon Datos Generales
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<hr class="separador">
<!-- SCANNER NUIP COLOMBIA --> 
<div class="form-group">
	<!-- IMAGEN SCANNER -->
	<label class="col-sm-2 control-label">
		<a>
			<img src="{{ asset('images/flaticon-png/small/scanner_01.png') }}" width="35" alt="">
		</a>
	</label>
	<!-- SCANNER OBTIENE DATOS -->
	<div class="col-sm-2">
			{!!Form::text('m_cadatob',null, [
					'class'=>'form-control',
					'id'=>'m_cadatob',
					'placeholder'=>'SCANNER...',
					'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{1,200}",
					'title'=>"Use el Scanner solamente para cedula de ciudadanía colombiana",
					'maxlength'=>'200',
					'style'=>'background-color:#FFFFFF; color:#FFFFFF',
					'autocomplete'=>'off',
					'onfocusin'=>'mostrar_informacion()',
					'onfocusout'=>'Datosnuip(this.id)'
				]) 
			!!}
	</div>
	<!-- SCANNER INFORMACION -->
	<div id="informa" style="display:none;">
		<a>
			<img src="{{ asset('images/flaticon-png/small/scanner_informacion_01.png') }}" width="530" alt="">
		</a>
	</div>

</div>
<hr class="separador">
<!-- TITULO INFORMACION GENERAL VINCULADO -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-archive-o"></span>&nbsp&nbspINFORMACION GENERAL
</h4>
<!-- NUIP -->
<div class="form-group">
	<label class="col-sm-2 control-label">Nuip:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-lg">
			{!!Form::number('m_canuipe',null, [
					'class'=>'form-control',
					'id'=>'m_canuipe',
					'required'=>'required',
					'placeholder'=>'IDENTIFICACION PERSONAL...',
					'pattern'=>"[0-9]{5,15}",
					'title'=>"Número único de identificación personal (5 a 15 dígitos)",
					'maxlength'=>'15',
					'onfocusout'=>'Obtenerdv(this.id)'
				])
			!!}
			<label for="m_canuipe" class="glyphicon glyphicon-wrench" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>

	{{-- ESTE CAMPO DEBE SER SOLO DE LECTURA: 'readonly'=>'readonly' --}}
	<!-- DIGITO DE VERIFICACION -->
	<label class="col-sm-1 control-label">Digito:</label>
	<div class="col-sm-1">
		{!!Form::text('m_nudiver',null, [
				'class'=>'form-control',
				'id'=>'m_nudiver',
				'required'=>'required',
				'placeholder'=>'DV',
				'pattern'=>"[0-9]{1}",
				'title'=>"Dígito de verificación",
				'maxlength'=>'1',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>

	<!-- TIPO DE DOCUMENTO -->
	<label class="col-sm-1 control-label">Tipo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_nutipdo',$tiposdocumentos,null, [
					'class'=>'form-control',
					'id'=>'m_nutipdo',
					'required'=>'required',
					'placeholder'=>'TIPO DE DOCUMENTO...',
					'title'=>"Lista de seleccción Tipo de documento"
				])
			!!}
			<label for="m_nutipdo" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de documento">
			</label>
		</div>
	</div>
</div>

<!-- NOMBRE -->
<div class="form-group">
	<label class="col-sm-2 control-label">Nombre:</label>
	<div class="col-sm-10">
		{!!Form::text('name',null, [
				'class'=>'form-control',
				'id'=>'name',
				'required'=>'required',
				'placeholder'=>'NOMBRE...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,80}",
				'title'=>"Nombre (5 a 80 caracteres - A-Z 0-9 #-.&/)",
				'maxlength'=>'80',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- NOMBRES -->
<div class="form-group">
	<!-- PRIMER NOMBRE -->
	<label class="col-sm-2 control-label">Pri. Nombre:</label>
	<div class="col-sm-4">
		{!! Form::text('m_caprnom',null, [
				'class'=>'form-control',
				'id'=>'m_caprnom',
				'placeholder'=>'PRIMER NOMBRE...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Primer nombre (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
		</label>
	</div>

	<!-- SEGUNDO NOMBRE -->
	<label class="col-sm-2 control-label">Seg. Nombre:</label>
	<div class="col-sm-4">
		{!! Form::text('m_casenom',null, [
				'class'=>'form-control',
				'id'=>'m_casenom',
				'placeholder' => 'SEGUNDO NOMBRE...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Segundo nombre (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
	</div>
</div>

<!-- APELLIDOS -->
<div class="form-group">
	<!-- PRIMER APELLIDO -->
	<label class="col-sm-2 control-label">Pri. Apellido:</label>
	<div class="col-sm-4">
		{!! Form::text('m_caprape',null, [
				'class'=>'form-control',
				'id'=>'m_caprape',
				'placeholder'=>'PRIMER APELLIDO...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Primer apellido (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
	</div>

	<!-- SEGUNDO APELLIDO -->
	<label class="col-sm-2 control-label">Seg. Apellido:</label>
	<div class="col-sm-4">
		{!! Form::text('m_caseape',null, [
				'class'=>'form-control',
				'id'=>'m_caseape',
				'placeholder' => 'SEGUNDO APELLIDO...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Segundo apellido (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)',
				'onfocusout'=>'Armanombre(this.id)'
			])
		!!}
	</div>
</div>

<!-- FECHA NACIMIENTO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Nacimiento:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fenacim',null, [
					'class'=>'form-control',
					'id'=>'m_fenacim',
					'placeholder'=>'FECHA NACIMIENTO...',
					'onfocusout'=>'Obtenered(this)'
				]) 
			!!}
			<label for="m_fenacim" class="glyphicon glyphicon-calendar" rel="tooltip" title="Fecha de Nacimiento">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fenacim"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fenacim"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>

	{{-- ESTE CAMPO DEBE SER SOLO DE LECTURA: 'readonly'=>'readonly' --}}
	<!-- EDAD -->
	<label class="col-sm-4 control-label">Edad:</label>
	<div class="col-sm-2">
		{!!Form::text('m_nuedada',null, [
				'class'=>'form-control',
				'id'=>'m_nuedada',
				'required'=>'required',
				'placeholder'=>'EDAD',
				'pattern'=>"[0-9]{3}",
				'title'=>"Edad",
				'maxlength'=>'1',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
	</div>
</div>


<!-- TIPO DE SANGRE - GENERO HUMANO -->
<div class="form-group">
	<!-- TIPO DE SANGRE -->
	<label class="col-sm-2 control-label">Tipo sangre:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catipsa', [
					'A+'=>'A+',
					'A-'=>'A-',
					'B+'=>'B+',
					'B-'=>'B-',
					'AB+'=>'AB+',
					'AB-'=>'AB-',
					'O+'=>'O+',
					'O-'=>'O-'], null, [
					'class'=>'form-control',
					'id'=>'m_catipsa',
					'placeholder'=>'TIPO DE SANGRE',
					'title'=>"Lista de selección Tipo de sangre"
				])
			!!}
			<label for="m_catipsa" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de sangre">
			</label>
		</div>
	</div>

	<!-- GENERO HUMANO -->
	<label class="col-sm-2 control-label">Genero:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catisex', [
					'F'=>'FEMENINO',
					'M'=>'MASCULINO',
					'N'=>'NINGUNO'], null, [
					'class'=>'form-control',
					'id'=>'m_catisex',
					'placeholder'=>'GENERO HUMANO',
					'title'=>"Lista de selección Genero Humano"
				])
			!!}
			<label for="m_catisex" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Genero Humano">
			</label>
		</div>
	</div>
</div>

<!-- DIRECCION -->
<div class="form-group">
	<label class="col-sm-2 control-label">Dirección:</label>
	<div class="col-sm-10">
		{!!Form::text('m_cadirec',null, [
				'class'=>'form-control',
				'id'=>'m_cadirec',
				'required'=>'required',
				'placeholder'=>'DIRECCION...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Dirección (5 a 50 caracteres - A-Z 0-9 #-.)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			]) 
		!!}
	</div>
</div>

<!-- CIUDAD -->
<div class="form-group">
	<label class="col-sm-2 control-label">Ciudad:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucociu',$ciudades,null, [
					'class'=>'form-control',
					'id'=>'m_nucociu',
					'required'=>'required',
					'placeholder'=>'CIUDAD...',
					'title'=>"Lista de seleccción Ciudad",
					'onchange'=>'datosCiudad(this.id)'
				])
			!!}
			<label for="m_nucociu" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad">
			</label>
		</div>
	</div>
</div>

<!-- DEPARTAMENTO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Departamento:</label>
	<div class="col-sm-5">
		{!!Form::text('datoDepa',null, [
				'class'=>'form-control',
				'id'=>'datoDepa',
				'required'=>'required',
				'title'=>"Departamento",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- PAIS -->
	<label class="col-sm-2 control-label">Pais:</label>
	<div class="col-sm-3">
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

<!-- TELEFONOS --> 
<div class="form-group">
	<label class="col-sm-2 control-label">Teléfonos:</label>
	<!-- INDICATIVO PAIS -->
	<div class="col-sm-1">
		{!! Form::text('datoInd2', null, [
				'class'=>'form-control',
				'id'=>'datoInd2',
				'required'=>'required',
				'title'=>"Indicativo País",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- INDICATIVO CIUDAD -->
	<div class="col-sm-1">
		{!!Form::text('datoInd1',null, [
				'class'=>'form-control',
				'id'=>'datoInd1',
				'required'=>'required',
				'title'=>"Indicativo Ciudad",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- NUMERO TELEFONO FIJO -->
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::tel('m_catelfi',null, [
					'class'=>'form-control',
					'id'=>'m_catelfi',
					'placeholder'=>'N° TELEFONO FIJO',
					'title'=>"Teléfono fijo (Eje: 123 4567)",
					'maxlength'=>'12'
				]) 
			!!}
			<label for="m_catelfi" class="glyphicon glyphicon-earphone" rel="tooltip" title="Teléfono fijo">
			</label>
		</div>
	</div>
	<!-- NUMERO TELEFONO MOVIL -->
	<label class="col-sm-2 control-label">Móvil:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!! Form::tel('m_camovil', null, [
					'class'=>'form-control',
					'id'=>'m_camovil',
					'placeholder'=>'N° TELEFONO MOVIL',
					'title'=>"Teléfono móvil (Eje: 321 123 4567)",
					'maxlength'=>'12'
				]) 
			!!}
			<label for="m_camovil" class="glyphicon glyphicon-phone" rel="tooltip" title="Teléfono móvil">
			</label>
		</div>
	</div>
</div>

<!-- CORREO ELECTRONICO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Correo:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::email('email',null, [
					'class'=>'form-control',
					'id'=>'email',
					'placeholder'=>'Dirección de correo electrónico',
					'title'=>"Dirección de correo electrónico (Eje: info@servicio.com)",
					'maxlength'=>'50',
					'onkeyup'=>'this.value=this.value.toLowerCase()'
				])
			!!}
			<label for="email" class="glyphicon glyphicon-envelope" rel="tooltip" title="Correo electrónico">
			</label>
		</div>
	</div>
</div>

<!-- OFICINA DE REGISTRO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Oficina:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!! Form::select('m_nuofici',$oficina_registro,null, [
					'class'=>'form-control',
					'id'=>'m_nuofici',
					'required'=>'required',
					'placeholder'=>'OFICINA DE REGISTRO...',
					'title'=>"Lista de seleccción Oficina de registro"
				])
			!!}
			<label for="m_nuofici" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de documento">
			</label>
		</div>
	</div>
</div>

<!-- VINCULO EMPRSARIAL -->
<div class="form-group">
	<!-- ESTADO -->
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_caestad', ['ACTIVO'=>'ACTIVO','INACTIVO'=>'INACTIVO'], null, [
					'class'=>'form-control',
					'id'=>'m_caestad',
					'required'=>'required',
					'placeholder'=>'ESTADO',
					'title'=>"Lista de selección Estado [ ACTIVO - INACTIVO ]"
				])
			!!}
			<label for="m_caestad" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Estado [ ACTIVO - INACTIVO ]">
			</label>
		</div>
	</div>
	<!-- EMPRESA -->
	<label class="col-sm-2 control-label">Empresa:</label>
	<div class="col-sm-4">
		{!!Form::text('m_nucoemp',null, [
				'class'=>'form-control',
				'id'=>'m_nucoemp',
				'required'=>'required',
				'placeholder'=>'EMPRESA',
				'pattern'=>"[0-9]{10}",
				'title'=>"Empresa",
				'maxlength'=>'10',
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			])
		!!}
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
	//'name','m_caprnom','m_casenom','m_caprape','m_caseape',

	//	MODAL CREAR
	//0- LIMPIA NOMBRE
	var dato_00 = ""
	$("#modalcrear #name").val(dato_00);
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
	$("#modalcrear #name").val(dato_06);

    //	MODAL EDITAR
	//0- LIMPIA NOMBRE
	var dato_00 = ""
	$("#modaleditar #name").val(dato_00);
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
	$("#modaleditar #name").val(dato_06);

}

//	FUNCION EDAD ACTUAL - FECHA DE NACIMIENTO
function Obtenered(object){
	var feincon = ""
	var nuexper = ""
	if ($(object).parents('div#modalcrear').length) {
		feincon = "#modalcrear #m_fenacim" 
		nuexper = "#modalcrear #m_nuedada"
	}
	else{
		feincon = "#modaleditar #m_fenacim"
		nuexper = "#modaleditar #m_nuedada"
	}

	var fec_hoy_obt = new Date();
    var fec_ini_con = new Date($(feincon).val());
    var fec_ini_org = new Date($(feincon).val());

	if (isNaN(fec_ini_con)){

		//alert('La fecha esta vacia');
		$(nuexper).val(0);
		cuadrarFechas.variables.valorFechaInicio = $(feincon).val()
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
		}else{
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

//	FUNCION OBTENER AÑOS DE EXPERIENCIA


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

//	FUNCION SCANNER NUIP COLOMBIA
function Datosnuip(id)
{
	//alert(id);
	//'name','m_caprnom','m_casenom','m_caprape','m_caseape','m_fenacim','m_catipsa','m_catisex'

	//	MODAL CREAR
	//0- DATOS OBTENIDOS
	var dat_obt_nid = $("#modalcrear #m_cadatob").val();
	//0.1- CHEQUEA SI HAY DATOS OBTENIDOS
	if(dat_obt_nid !== "" ) {
	    //1- SPLIT DATOS OBTENIDOS
	    var dat_arr_egl = dat_obt_nid.split(',');
	    //2- ARRAY SPLIT DATOS OBTENIDOS
	    var dat_res_ult = Array.from(dat_arr_egl);
	    //3- DOCUMENTO DE IDENTIFICACION
	    var dato_00 = dat_res_ult[0];
	    var dato_01 = Number(dato_00);
	    var dato_02 = "2"
		//3- NOMBRE Y APELLIDOS
		//3.1- PRIMER APELLIDO
		var dato_11 = dat_res_ult[1] + " ";
		//3.2- SEGUNDO APELLIDO
		var dato_12 = dat_res_ult[2] + " ";
		//3.3- PRIMER NOMBRE
		var dato_13 = dat_res_ult[3] + " ";
		//3.4- SEGUNDO NOMBRE
		var dato_14 = dat_res_ult[4];
		//3.5- ARMA NOMBRE
	    var dato_15 = dato_11 + dato_12 + dato_13 + dato_14
	    //3.6- ELIMINA DOBLE ESPACIO
	    var dato_16 = dato_15.replace(/\s{2,}/g, ' ');
	    //4- FECHA DE NACIMIENTO
	    //4.1- DIA
		var dato_20 = dat_res_ult[6] + "/";
		//4.2- MES
		var dato_21 = dat_res_ult[7] + "/";
		//4.3- AÑO
		var dato_22 = dat_res_ult[8];
		//4.4- ARMA FECHA DE NACIMIENTO (MM-DD-AAAA)
	    var dato_23 = dato_21 + dato_20 + dato_22;

		//4.5- OBTIENE FECHA HOY
		var hoy_fecha = new Date(dato_23);

		//4.6- FECHA DE NACIMIENTO ASIGNA FECHA OBTENIDA
		$("#modalcrear #m_fenacim").val(getFormattedDate(hoy_fecha));
	    Obtenered($("#modalcrear #m_fenacim"))
	    
		//4.7- FUNCION FECHA HOY FORMATO YYYY-MM-DD
		function getFormattedDate (date) {
		    return date.getFullYear()
		        + "-"
		        + ("0" + (date.getMonth() + 1)).slice(-2)
		        + "-"
		        + ("0" + date.getDate()).slice(-2);
		}

		//4.8- LIMPIA CAMPO DATOS OBTENIDOS
		var dato_60 = ""
		$("#modalcrear #m_cadatob").val(dato_60);
	    //4.9- DEVULVE RESULTADOS
	    $("#modalcrear #m_canuipe").val(dato_01);
	    $("#modalcrear #m_nutipdo").val(dato_02);
	    $("#modalcrear #name").val(dato_16);
	    $("#modalcrear #m_caprape").val(dat_res_ult[1]);
	    $("#modalcrear #m_caseape").val(dat_res_ult[2]);
	    $("#modalcrear #m_caprnom").val(dat_res_ult[3]);
	    $("#modalcrear #m_casenom").val(dat_res_ult[4]);
	    $("#modalcrear #m_catisex").val(dat_res_ult[5]);
	    $("#modalcrear #m_catipsa").val(dat_res_ult[9]);
	    //4.10- DEVULVE RESULTADOS PARA FECHA DE NACIMIENTO
		var fec_nac_obt = Date.parse(dato_23);
		var fec_nac_res = new Date(fec_nac_obt);
		document.getElementById("#modalcrear #m_fenacim").innerHTML = fec_nac_res;

    }

	//	MODAL EDITAR
	//0- DATOS OBTENIDOS
	var dat_obt_nid = $("#modaleditar #m_cadatob").val();
	//0.1- CHEQUEA SI HAY DATOS OBTENIDOS
	if(dat_obt_nid !== "" ) {
	    //1- SPLIT DATOS OBTENIDOS
	    var dat_arr_egl = dat_obt_nid.split(',');
	    //2- ARRAY SPLIT DATOS OBTENIDOS
	    var dat_res_ult = Array.from(dat_arr_egl);
	    //3- DOCUMENTO DE IDENTIFICACION
	    var dato_00 = dat_res_ult[0];
	    var dato_01 = Number(dato_00);
	    var dato_02 = "2"
		//3- NOMBRE Y APELLIDOS
		//3.1- PRIMER APELLIDO
		var dato_11 = dat_res_ult[1] + " ";
		//3.2- SEGUNDO APELLIDO
		var dato_12 = dat_res_ult[2] + " ";
		//3.3- PRIMER NOMBRE
		var dato_13 = dat_res_ult[3] + " ";
		//3.4- SEGUNDO NOMBRE
		var dato_14 = dat_res_ult[4];
		//3.5- ARMA NOMBRE
	    var dato_15 = dato_11 + dato_12 + dato_13 + dato_14
	    //3.6- ELIMINA DOBLE ESPACIO
	    var dato_16 = dato_15.replace(/\s{2,}/g, ' ');
	    //4- FECHA DE NACIMIENTO
	    //4.1- DIA
		var dato_20 = dat_res_ult[6] + "-";
		//4.2- MES
		var dato_21 = dat_res_ult[7] + "-";
		//4.3- AÑO
		var dato_22 = dat_res_ult[8];
		//4.4- ARMA FECHA DE NACIMIENTO (MM-DD-AAAA)
	    var dato_23 = dato_21 + dato_20 + dato_22;
	    //
	    //alert(dato_23)
	    //4.5- CONVIERTE FECHA DE NACIMIENTO
	    //	var dato_24 = Date.parse(dato_23);
	    //var dato_25 = new Date(dato_24);
	    //4.5- DEVUELVE FECHA DE NACIMIENTO
	    var dato_25 = moment(dato_23, "MM-DD-YYYY");
	    //alert(dato_24)

		//6- LIMPIA CAMPO DATOS OBTENIDOS
		var dato_60 = ""
		$("#modaleditar #m_cadatob").val(dato_60);
	    //6- DEVULVE RESULTADOS
	    $("#modaleditar #m_canuipe").val(dato_01);
	    $("#modaleditar #m_nutipdo").val(dato_02);
	    $("#modaleditar #name").val(dato_16);
	    $("#modaleditar #m_caprape").val(dat_res_ult[1]);
	    $("#modaleditar #m_caseape").val(dat_res_ult[2]);
	    $("#modaleditar #m_caprnom").val(dat_res_ult[3]);
	    $("#modaleditar #m_casenom").val(dat_res_ult[4]);
	    $("#modaleditar #m_fenacim").val(dato_25);
	    $("#modaleditar #m_catisex").val(dat_res_ult[5]);
	    $("#modaleditar #m_catipsa").val(dat_res_ult[9]);
	    $("#modaleditar #m_cadirec").val(dato_25);
	}

	//Obtenered(object)
    //success:function(Obtenered){
    //    console.log(Obtenered);
        //$('#modalcrear #m_nuedada').val(data[1]);
        //$('#modaleditar #m_nuedada').val(data[2]);
    //}
	//	OCULTAR AYUDA SCANNER
	document.getElementById("informa").style.display = 'none';

}

//	FUNCION MOSTRAR AYUDA SCANNER
function mostrar_informacion()
{
	//alert('Entro');
	//	MOSTRAR AYUDA SCANNER
	document.getElementById("informa").style.display = 'block';
}

</script>
