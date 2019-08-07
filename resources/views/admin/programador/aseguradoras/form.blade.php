<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Aseguradoras
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

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

<!-- RAZON SOCIAL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Razón Social:</label>
	<div class="col-sm-10">
		{!!Form::text('m_canombr',null, [
				'class'=>'form-control',
				'id'=>'m_canombr',
				'required'=>'required',
				'placeholder'=>'RAZON SOCIAL...',
				'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
				'title'=>"Razón social (5 a 50 caracteres - A-Z 0-9 #-.&/)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
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

<!-- TELEFONO FIJO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Teléfono Fijo:</label>
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
					'required'=>'required',
					'placeholder'=>'N° TELEFONO FIJO',
					'pattern'=>"[0-9]{3} [0-9]{4}",
					'title'=>"Teléfono fijo (Eje: 123 4567)",
					'maxlength'=>'12'
				]) 
			!!}
			<label for="m_catelfi" class="glyphicon glyphicon-earphone" rel="tooltip" title="Teléfono fijo">
			</label>
		</div>
	</div>
</div>

<!-- NUMERO TELEFONO MOVIL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Teléfono Móvil:</label>
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
	<!-- NUMERO TELEFONO MOVIL -->
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::tel('m_camovil', null, [
					'class'=>'form-control',
					'id'=>'m_camovil',
					'required'=>'required',
					'placeholder'=>'N° TELEFONO MOVIL',
					'pattern'=>"[0-9]{3} [0-9]{3} [0-9]{4}",
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
			{!!Form::email('m_cacorel',null, [
					'class'=>'form-control',
					'id'=>'m_cacorel',
					'required'=>'required',
					'placeholder'=>'Dirección de correo electrónico',
					'title'=>"Dirección de correo electrónico (Eje: info@servicio.com)",
					'maxlength'=>'50',
					'onkeyup'=>'this.value=this.value.toLowerCase()'
				])
			!!}
			<label for="m_cacorel" class="glyphicon glyphicon-envelope" rel="tooltip" title="Correo electrónico">
			</label>
		</div>
	</div>
</div>

<!-- PORTAL WEB -->
<div class="form-group">
	<label class="col-sm-2 control-label">Portal Web:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::url('m_casitew',null, [
					'class'=>'form-control',
					'id'=>'m_casitew',
					'required'=>'required',
					'placeholder'=>'Dirección de sitio web',
					'title'=>"Dirección de sitio web (Eje: http://www.sitio.com)",
					'maxlength'=>'50',
					'onkeyup'=>'this.value=this.value.toLowerCase()'
				])
			!!}
			<label for="m_casitew" class="glyphicon glyphicon-cloud" rel="tooltip" title="Portal Web">
			</label>
		</div>
	</div>
</div>

<!-- CONTACTO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Contacto:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::text('m_cadacon',null, [
					'class'=>'form-control',
					'id'=>'m_cadacon',
					'required'=>'required',
					'placeholder'=>'NOMBRE CONTACTO...',
					'pattern'=>"A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Nombre y apellidos Contacto (5 a 50 caracteres - A-Z 0-9 #-./&)",
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
			<label for="m_cadacon" class="glyphicon glyphicon-user" rel="tooltip" title="Contacto">
			</label>
		</div>
	</div>
</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Cod/ Nacional:</label>
	<div class="col-sm-4">
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

	<!-- CODIGO AUTORIZACION -->
	<label class="col-sm-2 control-label">Cod/ Autorizac:</label>
	<div class="col-sm-4">
		{!! Form::text('m_caautna',null, [
				'class'=>'form-control',
				'id'=>'m_caautna',
				'required'=>'required',
				'placeholder' => 'CODIGO DE AUTORIZACION...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,10}",
				'title'=>"Código de autorización (1 a 10 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'10',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>
</div>

<!-- ESTADO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-10">
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

</script>
