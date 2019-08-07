<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Rutas organización empresarial
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- NOMBRE RUTA -->
<div class="form-group">
	<a class="col-sm-2 control-label"
		id="mapa_ruta"
		style="font-size:16px; color: black" 
		href="#"
		target="_blank">
		<img src="{{ asset('images/flaticon-png/small/mis_rutas_01.png') }}" width="50" alt=""><b>&nbsp&nbspRuta:</b>
	</a>
	<div class="col-sm-10">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_canombr',null, [
					'autofocus'=>'autofocus',
					'class'=>'form-control',
					'id'=>'m_canombr',
					'required'=>'required',
					'placeholder'=>'RUTA...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Marca (5 a 50 caracteres - A-Z Ñ 0-9 #-_.&/)",
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105',
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_canombr" class="fa fa-road" rel="tooltip" title="LLave única">
			</label>
		</div>
	</div>
</div>

<!-- NOMBRE RUTA OCULTO -->
<div class="form-group" style="display:none;">
	<a class="col-sm-2 control-label"
		id="mapa_ruta"
		style="font-size:16px; color: black" 
		href="#"
		target="_blank">
		<img src="{{ asset('images/flaticon-png/small/mapa_ruta_02.jpg') }}" width="30" alt=""><b>&nbsp&nbspRuta:</b>
	</a>
	<div class="col-sm-10">
		<div class="icon-addon addon-lg">
			{!!Form::text('m_camapas',null, [
					'class'=>'form-control',
					'id'=>'m_camapas',
					'required'=>'required',
					'placeholder'=>'MAPA RUTA...',
					'pattern'=>"[A-Z ÁÉÍÓÚ Ñ 0-9 #-_.&/]{5,50}",
					'title'=>"Marca (5 a 200 caracteres - A-Z Ñ 0-9 #-_.&/)",
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105',
					'maxlength'=>'50',
					'onkeyup'=>'myFunction(this.id)'
				]) 
			!!}
			<label for="m_camapas" class="fa fa-road" rel="tooltip" title="Ruta">
			</label>
		</div>
	</div>
</div>

<!-- CIUDAD ORIGEN OCULTO -->
<div class="form-group" style="display:none;">

	<label class="col-sm-2 control-label">Origen:</label>
	<div class="col-sm-4">
		{!!Form::text('datoCiud_origen',null, [
				'class'=>'form-control',
				'id'=>'datoCiud_origen',
				'required'=>'required',
				'title'=>"Departamento",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>

	<!-- CIUDAD DESTINO -->
	<label class="col-sm-2 control-label">Destino:</label>
	<div class="col-sm-4">
		{!! Form::text('datoCiud_destino', null, [
				'class'=>'form-control',
				'id'=>'datoCiud_destino',
				'required'=>'required',
				'title'=>"País",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
</div>

<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspORIGEN
</h4>
<!-- CIUDAD ORIGEN -->
<div class="form-group">
	<label class="col-sm-2 control-label">Ciudad:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucoori',$ciudades_origen,null, [
					'class'=>'form-control',
					'id'=>'m_nucoori',
					'required'=>'required',
					'placeholder'=>'CIUDAD ORIGEN...',
					'title'=>"Lista de seleccción Ciudad origen",
					'onchange'=>'datosCiudadorigen(this.id)',
					'onfocusout'=>'clase_ruta(this.id)'
				])
			!!}
			<label for="m_nucoori" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad origen">
			</label>
		</div>
	</div>
</div>

<!-- DEPARTAMENTO ORIGEN -->
<div class="form-group">
	<label class="col-sm-2 control-label">Departamento:</label>
	<div class="col-sm-5">
		{!!Form::text('datoDepa_origen',null, [
				'class'=>'form-control',
				'id'=>'datoDepa_origen',
				'required'=>'required',
				'title'=>"Departamento",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- PAIS ORIGEN -->
	<label class="col-sm-2 control-label">Pais:</label>
	<div class="col-sm-3">
		{!! Form::text('datoPais_origen', null, [
				'class'=>'form-control',
				'id'=>'datoPais_origen',
				'required'=>'required',
				'title'=>"País",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
</div>

<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspDESTINO
</h4>
<!-- CIUDAD DESTINO-->
<div class="form-group">
	<label class="col-sm-2 control-label">Ciudad:</label>
	<div class="col-sm-10">
		<div class="icon-addon addon-md">
			{!!Form::select('m_nucodes',$ciudades_destino,null, [
					'class'=>'form-control',
					'id'=>'m_nucodes',
					'required'=>'required',
					'placeholder'=>'CIUDAD DESTINO...',
					'title'=>"Lista de seleccción Ciudad destino",
					'onchange'=>'datosCiudaddestino(this.id)',
					'onfocusout'=>'clase_ruta(this.id)'
				])
			!!}
			<label for="m_nucodes" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad destino">
			</label>
		</div>
	</div>
</div>

<!-- DEPARTAMENTO DESTINO -->
<div class="form-group">
	<label class="col-sm-2 control-label">Departamento:</label>
	<div class="col-sm-5">
		{!!Form::text('datoDepa_destino',null, [
				'class'=>'form-control',
				'id'=>'datoDepa_destino',
				'required'=>'required',
				'title'=>"Departamento",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
	<!-- PAIS DESTINO -->
	<label class="col-sm-2 control-label">Pais:</label>
	<div class="col-sm-3">
		{!! Form::text('datoPais_destino', null, [
				'class'=>'form-control',
				'id'=>'datoPais_destino',
				'required'=>'required',
				'title'=>"País",
				'readonly'=>'readonly',
				'style'=>'background-color:#fcfdff; color:#000105'
			]) 
		!!}
	</div>
</div>

<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspDATOS COMPLEMENTARIOS
</h4>
<!-- CONDUCTORES --> 
<div class="form-group">
	<label class="col-sm-2 control-label">Conductores:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_cacondu', ['UNO'=>'UNO','DOS'=>'DOS'], null, [
					'class'=>'form-control',
					'id'=>'m_cacondu',
					'required'=>'required',
					'placeholder'=>'CONDUCTORES',
					'title'=>"Lista de selección Conductores"
				])
			!!}
			<label for="m_cacondu" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Conductores">
			</label>
		</div>
	</div>
</div>

<!-- KILOMETROS - TIEMPO ESTIMADO --> 
<div class="form-group">
	<!-- KILOMETROS --> 
	<label class="col-sm-2 control-label">Kilometros:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::number('m_nukilom',null, [
					'class'=>'form-control',
					'id'=>'m_nukilom',
					'required'=>'required',
					'placeholder'=>'KILOMETROS......',
					'pattern'=>"[0-9]{0,5}",
					'title'=>"Kilometros (0 a 5 dígitos)",
					'min'=>'0',
					'max'=>'99999',
					'maxlength'=>'5',
					'onfocusout'=>'Obtenerdv(this.id)'
				])
			!!}
		</div>
	</div>
	<!-- TIEMPO ESTIMADO -->
	<label class="col-sm-3 control-label" style="margin-left: -75px;">Tiempo estimado:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::text('m_catiemp',null, [
					'class'=>'form-control',
					'id'=>'m_catiemp',
					'required'=>'required',
					'placeholder'=>'TIEMPO ESTIMADO...',
					'pattern'=>"[A-Z 0-9 #-_.&/]{1,20}",
					'title'=>"Tiempo estimado (1 a 20 caracteres - A-Z 0-9 #-_.&/)",
					'maxlength'=>'20',
					'onkeyup'=>'myFunction(this.id)'
				])
			!!}
		</div>
	</div>
</div>

<!-- TIPO ECOMINDAS - ENCOMIENDAS Y PASAJES - PASAJES -->
<div class="form-group">
	<label class="col-sm-2 control-label">Tipo:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_catipos', 
					['ENCOMIENDAS'=>'ENCOMIENDAS',
					'ENCOMIENDAS Y PASAJES'=>'ENCOMIENDAS Y PASAJES',
					'PASAJES'=>'PASAJES'], null, [
					'class'=>'form-control',
					'id'=>'m_catipos',
					'required'=>'required',
					'placeholder'=>'TIPO',
					'title'=>"Lista de selección Tipo"
				])
			!!}
			<label for="m_catipos" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo">
			</label>
		</div>
	</div>

	<!-- CLASE -->
	<label class="col-sm-2 control-label">Clase:</label>
	<div class="col-sm-4">
		{!!Form::text('m_caclase',null, [
				'class'=>'form-control',
				'id'=>'m_caclase',
				'required'=>'required',
				'placeholder'=>'CLASE...',
				'pattern'=>"[A-Z {1,20}",
				'title'=>"Clase (1 a 20 caracteres - A-Z)",
				'maxlength'=>'20'
			])
		!!}
	</div>
</div>

<!-- RESOLUCION - FECHA --> 
<div class="form-group">
	<label class="col-sm-2 control-label">Resolución:</label>
	<div class="col-sm-4">
		{!!Form::text('m_caresol',null, [
				'class'=>'form-control',
				'id'=>'m_caresol',
				'required'=>'required',
				'placeholder'=>'RESOLUCION...',
				'pattern'=>"[A-Z 0-9 #-_.&/]{1,50}",
				'title'=>"Resolución (1 a 50 caracteres - A-Z 0-9 #-_.&/)",
				'maxlength'=>'50',
				'onkeyup'=>'myFunction(this.id)'
			])
		!!}
	</div>

	<!-- FECHA -->
	<label class="col-sm-2 control-label">Fecha:</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_feresol',null, [
					'class'=>'form-control',
					'id'=>'m_feresol',
					'required'=>'required',
					'placeholder'=>'FECHA RESOLUCION...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_feresol" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
			</label>
		</div>
	</div>

	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feresol"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feresol"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>

</div>

<!-- CODIGO NACIONAL -->
<div class="form-group">
	<label class="col-sm-2 control-label">Cod/ Nacional:</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::text('m_cacodna',null, [
					'class'=>'form-control',
					'id'=>'m_cacodna',
					'required'=>'required',
					'placeholder'=>'CODIGO NACIONAL...',
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

	<!-- ESTADO -->
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-4">
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
    var x = $("#modalcrear #"+id+"").val();
    var y = x.toUpperCase();
    //var res = y.replace(/^\s+|\s+$/g, " ");
    var res = y.replace(/\s{2,}/g, ' ');
    $("#modalcrear #"+id+"").val(res);

    var x = $("#modaleditar #"+id+"").val();
    var y = x.toUpperCase();
    //var res = y.replace("  ", "");
    var res = y.replace(/\s{2,}/g, ' ');
    $("#modaleditar #"+id+"").val(res);

}
</script>

<script>
	//	FUNCION CIUDAD - DEPARTAMENTO - PAIS ORIGEN
	function datosCiudadorigen(id)
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
	            $('#modalcrear #datociud_origen').val(data[0]);
	            $('#modalcrear #datoDepa_origen').val(data[1]);
	            $('#modalcrear #datoPais_origen').val(data[2]);
	            $('#modalcrear #datoInd1').val(data[5]);
	            $('#modalcrear #datoInd2').val(data[6]);

				//	MODAL CREAR
				//0- LIMPIA NOMBRE
	        	var dato_00 = ""
	        	var dato_99 = ""
				$("#modalcrear #m_canombr").val(dato_00);
				$("#modalcrear #m_camapas").val(dato_99);
				//1- PRIMER NOMBRE
				var dato_01 = $("#modalcrear #datociud_origen").val() + " - ";
				var dato_90 = $("#modalcrear #datociud_origen").val() + "/";
				//2- SEGUNDO NOMBRE
				var dato_02 = $("#modalcrear #datociud_destino").val() + " ";
				//3- ARMA NOMBRE
			    var dato_05 = dato_01 + dato_02;
			    var dato_50 = dato_90 + dato_02;
			    //4- ELIMINA DOBLE ESPACIO
			    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
			    var dato_60 = dato_50.replace(/\s{2,}/g, ' ');
			    //5- DEVUELVE RESULTADOS
				$("#modalcrear #m_canombr").val(dato_06);
				//6- MAPA RUTA
				$("#modalcrear #m_camapas").val(dato_60);
				//7- ETIQUETA RUTA
				$('#modalcrear #mapa_ruta').attr({
				   'title': 'RUTA: ' + dato_06,
				   'href': "https://www.google.com/maps/dir/" + dato_60,
				   'style': 'color: #ED7A44; font-size:16px;'
				});
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
	            $('#modaleditar #datociud_origen').val(data[0]);
	            $('#modaleditar #datoDepa_origen').val(data[1]);
	            $('#modaleditar #datoPais_origen').val(data[2]);
	            $('#modaleditar #datoInd1').val(data[5]);
	            $('#modaleditar #datoInd2').val(data[6]);

				//	MODAL CREAR
				//0- LIMPIA NOMBRE
	        	var dato_00 = ""
	        	var dato_99 = ""
				$("#modaleditar #m_canombr").val(dato_00);
				$("#modaleditar #m_camapas").val(dato_99);
				//1- PRIMER NOMBRE
				var dato_01 = $("#modaleditar #datociud_origen").val() + " - ";
				var dato_90 = $("#modaleditar #datociud_origen").val() + "/";
				//2- SEGUNDO NOMBRE
				var dato_02 = $("#modaleditar #datociud_destino").val() + " ";
				//3- ARMA NOMBRE
			    var dato_05 = dato_01 + dato_02;
			    var dato_50 = dato_90 + dato_02;
			    //4- ELIMINA DOBLE ESPACIO
			    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
			    var dato_60 = dato_50.replace(/\s{2,}/g, ' ');
			    //5- DEVUELVE RESULTADOS
				$("#modaleditar #m_canombr").val(dato_06);
				//6- MAPA RUTA
				$("#modaleditar #m_camapas").val(dato_60);
				//7- ETIQUETA RUTA
				$('#modaleditar #mapa_ruta').attr({
				   'title': 'RUTA: ' + dato_06,
				   'href': "https://www.google.com/maps/dir/" + dato_60,
				   'style': 'color: #ED7A44; font-size:16px;'
				});
	        }
	    })
	}
</script>

<script>
	//	FUNCION CIUDAD - DEPARTAMENTO - PAIS DESTINO
	function datosCiudaddestino(id)
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
	            $('#modalcrear #datociud_destino').val(data[0]);
	            $('#modalcrear #datoDepa_destino').val(data[1]);
	            $('#modalcrear #datoPais_destino').val(data[2]);
	            $('#modalcrear #datoInd1').val(data[5]);
	            $('#modalcrear #datoInd2').val(data[6]);

				//	MODAL CREAR
				//0- LIMPIA NOMBRE
	        	var dato_00 = ""
	        	var dato_99 = ""
				$("#modalcrear #m_canombr").val(dato_00);
				$("#modalcrear #m_camapas").val(dato_99);
				//1- PRIMER NOMBRE
				var dato_01 = $("#modalcrear #datociud_origen").val() + " - ";
				var dato_90 = $("#modalcrear #datociud_origen").val() + "/";
				//2- SEGUNDO NOMBRE
				var dato_02 = $("#modalcrear #datociud_destino").val() + " ";
				//3- ARMA NOMBRE
			    var dato_05 = dato_01 + dato_02
			    var dato_50 = dato_90 + dato_02
			    //4- ELIMINA DOBLE ESPACIO
			    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
			    var dato_60 = dato_50.replace(/\s{2,}/g, ' ');
			    //5- DEVUELVE RESULTADOS
				$("#modalcrear #m_canombr").val(dato_06);
				//6- MAPA RUTA
				$("#modalcrear #m_camapas").val(dato_60);
				//7- ETIQUETA RUTA
				$('#modalcrear #mapa_ruta').attr({
				   'title': 'RUTA: ' + dato_06,
				   'href': "https://www.google.com/maps/dir/" + dato_60,
				   'style': 'color: #ED7A44; font-size:16px;'
				});
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
	            $('#modaleditar #datociud_destino').val(data[0]);
	            $('#modaleditar #datoDepa_destino').val(data[1]);
	            $('#modaleditar #datoPais_destino').val(data[2]);
	            $('#modaleditar #datoInd1').val(data[5]);
	            $('#modaleditar #datoInd2').val(data[6]);

				//	MODAL EDITAR
				//0- LIMPIA NOMBRE
	        	var dato_00 = ""
	        	var dato_99 = ""
				$("#modaleditar #m_canombr").val(dato_00);
				$("#modaleditar #m_camapas").val(dato_99);
				//1- PRIMER NOMBRE
				var dato_01 = $("#modaleditar #datociud_origen").val() + " - ";
				var dato_90 = $("#modaleditar #datociud_origen").val() + "/";
				//2- SEGUNDO NOMBRE
				var dato_02 = $("#modaleditar #datociud_destino").val() + " ";
				//3- ARMA NOMBRE
			    var dato_05 = dato_01 + dato_02
			    var dato_50 = dato_90 + dato_02
			    //4- ELIMINA DOBLE ESPACIO
			    var dato_06 = dato_05.replace(/\s{2,}/g, ' ');
			    var dato_60 = dato_50.replace(/\s{2,}/g, ' ');
			    //5- DEVUELVE RESULTADOS
				$("#modaleditar #m_canombr").val(dato_06);
				//6- MAPA RUTA
				$("#modaleditar #m_camapas").val(dato_60);
				//7- ETIQUETA RUTA
				$('#modaleditar #mapa_ruta').attr({
				   'title':'RUTA: ' + dato_06,
				   'href': "https://www.google.com/maps/dir/" + dato_60,
				   'style': 'color: #ED7A44; font-size:16px;'
				});
	        }
	    })
	}
</script>

<script>
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
</script>

<script>
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

<script>
	// FUNCION FECHA HOY FORMATO YYYY-MM-DD 
	function getFormattedDate (date) {
	    return date.getFullYear()
	        + "-"
	        + ("0" + (date.getMonth() + 1)).slice(-2)
	        + "-"
	        + ("0" + date.getDate()).slice(-2);
	}
</script>

<script>
	//FUNCIONCLASE RUTA - INTERNACIONAL - NACIONAL - DEPARTAMENTAL
	function clase_ruta (id) { 
		//alert('entro')
		//	MODAL CREAR
		//	ORIGEN - LIMPIA
		var DAT_PAIS_ORIGEN = "";
		var DAT_DEPT_ORIGEN = "";
		var DAT_CIUD_ORIGEN = "";
		//	DESTINO - LIMPIA
		var DAT_PAIS_DESTIN = "";
		var DAT_DEPT_DESTIN = "";
		var DAT_CIUD_DESTIN = "";
		//	ORIGEN - CARGA
		var DAT_PAIS_ORIGEN = $('#modalcrear #datoPais_origen').val();
		var DAT_DEPT_ORIGEN = $('#modalcrear #datoDepa_origen').val();
		var DAT_CIUD_ORIGEN = "";
		//	DESTINO - CARGA
		var DAT_PAIS_DESTIN = $('#modalcrear #datoPais_destino').val();
		var DAT_DEPT_DESTIN = $('#modalcrear #datoDepa_destino').val();
		var DAT_CIUD_DESTIN = "";
		//	CHEQUEA PAIS ORIGEN - PAIS DESTINO
		if (DAT_PAIS_ORIGEN == DAT_PAIS_DESTIN) {
		 	if (DAT_DEPT_ORIGEN == DAT_DEPT_DESTIN) {
		    	$('#modalcrear #m_caclase').val('DEPARTAMENTAL');
		  	} else {
		    	$('#modalcrear #m_caclase').val('NACIONAL');
		  	}
		} else {
		 	$('#modalcrear #m_caclase').val('INTERNACIONAL');
		}

		//	MODAL EDITAR
		//	ORIGEN - LIMPIA
		var DAT_PAIS_ORIGEN = "";
		var DAT_DEPT_ORIGEN = "";
		var DAT_CIUD_ORIGEN = "";
		//	DESTINO - LIMPIA
		var DAT_PAIS_DESTIN = "";
		var DAT_DEPT_DESTIN = "";
		var DAT_CIUD_DESTIN = "";
		//	ORIGEN - CARGA
		var DAT_PAIS_ORIGEN = $('#modaleditar #datoPais_origen').val();
		var DAT_DEPT_ORIGEN = $('#modaleditar #datoDepa_origen').val();
		var DAT_CIUD_ORIGEN = "";
		//	DESTINO - CARGA
		var DAT_PAIS_DESTIN = $('#modaleditar #datoPais_destino').val();
		var DAT_DEPT_DESTIN = $('#modaleditar #datoDepa_destino').val();
		var DAT_CIUD_DESTIN = "";
		//	CHEQUEA PAIS ORIGEN - PAIS DESTINO
		if (DAT_PAIS_ORIGEN == DAT_PAIS_DESTIN) {
		 	if (DAT_DEPT_ORIGEN == DAT_DEPT_DESTIN) {
		    	$('#modaleditar #m_caclase').val('DEPARTAMENTAL');
		  	} else {
		    	$('#modaleditar #m_caclase').val('NACIONAL');
		  	}
		} else {
		 	$('#modaleditar #m_caclase').val('INTERNACIONAL');
		}
	}
</script>
