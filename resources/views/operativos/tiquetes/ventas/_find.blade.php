<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Venta de tiquetes
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO FORMULARIO DE BOTONES -->
<div class="row text-center">
	<div class="col-md-5">
		<!-- BOTON REGRESAR -->
        <a href="{{ route('operativos-tiquetes') }}" class="btn btn-primary boton btn-lg" data-toggle="tooltip" title="Regresar...">
        	<span class="fa fa-mail-reply" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
        		<font face="verdana" color="White" style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspTIQUETES</font>
        	</span>
        </a>&nbsp&nbsp
		<!-- BOTON PROCEDIMIENTOS -->
		<button type="button" class="btn btn-primary boton" data-toggle="modal" data-target="#modalprocedimientos">
			<i class="fa fa-file-text-o" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Conozca aquí los procedimientos generales"></i>
		</button>&nbsp&nbsp
	</div>
</div>
<br>

<!-- FIN FORMULARIO DE BOTONES -->

{!!Form::open(['route'=>'ventas.index','method'=>'get'])!!}

	<!-- VIAJE: TIPO - ORIGEN - DESTINO BLOQUE UNO-->
	<div class="text-center col-sm-12">

		<!-- VIAJE: IDA Y REGRESO - SOLO IDA rodamientosvtas -->
		<div class="form-group">
			<label class="col-sm-1 control-label">Viaje:</label>
			<div class="col-sm-3">
				<div class="icon-addon addon-md">
					{!! Form::select('m_catipvi', ['IDA Y REGRESO'=>'IDA Y REGRESO','SOLO IDA'=>'SOLO IDA'], null, [
							'class'=>'form-control',
							'id'=>'m_catipvi',
							'required'=>'required',
							'placeholder'=>'TIPO DE VIAJE',
							'title'=>"Lista de selección Tipo viaje",
							'autofocus'=>'autofocus',
						])
					!!}
					<label for="m_catipvi" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo viaje">
					</label>
				</div>
			</div>
		</div>

		<div class="form-group" hidden="hidden">
			<!-- LISTA: CIUDADES ORIGEN -->
			<!-- CIUDAD -->
			<label class="col-sm-1 text-right control-label">Origen:</label>
			<div class="col-sm-3">
				<div class="icon-addon addon-md">
					{!!Form::select('m_nucoori',$ciudades,null, [
							'class'=>'form-control',
							'id'=>'m_nucoori',
							'required'=>'required',
							'placeholder'=>'CIUDAD ORIGEN...',
							'title'=>"Lista de selección Ciudad",
							'onchange'=>'datosCiudadori(this.id)'
						])
					!!}
					<label for="m_nucoori" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad">
					</label>
				</div>
			</div>
		</div>

		<div class="form-group" hidden="hidden">
			<!-- LISTA: CIUDADES DESTINO 'onfocusout'=>'trayecto_ori_des()' -->
			<label class="col-sm-1 text-right control-label">Destino:</label>
		    <div class="col-md-3">
		    	<div class="icon-addon addon-md">
					{!!Form::select('m_nucodes',$ciudades,null, [
							'class'=>'form-control',
							'id'=>'m_nucodes',
							'required'=>'required',
							'placeholder'=>'CIUDAD DESTINO...',
							'title'=>"Lista de selección Ciudades",
						])
					!!}
					<label for="m_nucodes" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Ciudad">
					</label>
				</div>
			</div>
		</div>
	</div>

	</br>
	</br>
	</br>
	</br>

	<!-- VIAJE DE IDA - VIAJE DE REGRESO - BLOQUE DOS-->
	<div class="idaRegreso" hidden="hidden">
		<div class="row">
			<div id="ida_titulo" class="col-sm-4 ida" style="background-color:#3498db;">
			 	<p style="margin-top: 5px;margin-bottom: 5px;font-size:14px;color:white;text-shadow:2px 2px 4px #000000;">VIAJE DE IDA
			 	</p>
			</div>
			<div id="regreso_titulo" class="col-sm-4 regreso" style="background-color:#3498db;">
				<p style="margin-top: 5px;margin-bottom: 5px;font-size:14px;color:white;text-shadow:2px 2px 4px #000000;">VIAJE DE REGRESO
				</p>
			</div>
		</div>
		<br>

		<!-- OFICINAS ABORDAJE --> 
		<div class="row form-group">
			<!-- VIAJE DE IDA -->
			<label class="col-sm-1 control-label ida">Oficina:</label>
			<div class="col-sm-3 ida">
				<div class="icon-addon addon-md">
					{!! Form::select('m_nuofici',$ida_oficina_abo,null, [
							'class'=>'form-control',
							'id'=>'m_nuofi01',
							'required'=>'required',
							'placeholder'=>'OFICINA DE ABORDAJE...',
							'title'=>"Lista de selección Oficina de abordaje"
						])
					!!}
					<label for="m_nuofi01" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Oficina de abordaje">
					</label>
				</div>
			</div>

			<!-- VIAJE DE REGRESO -->
			<label class="col-sm-1 control-label regreso">Oficina:</label>
			<div class="col-sm-3 regreso">
				<div class="icon-addon addon-md">
					{!! Form::select('m_nuofire',$reg_oficina_abo,null, [
							'class'=>'form-control',
							'id'=>'m_nuofire',
							'placeholder'=>'OFICINA DE ABORDAJE...',
							'title'=>"Lista de selección Oficina de abordaje"
						])
					!!}
					<label for="m_nuofire" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Oficina de abordaje">
					</label>
				</div>
			</div>
		
		</div>

		<!-- FECHAS DE VIAJE--> 
		<div class="row form-group">
			<!-- FECHA IDA -->
			<label class="col-sm-1 control-label ida">Fecha:</label>
			<div class="col-sm-3 ida">
				<div class="icon-addon addon-md">
					<input type="date"
							name='m_feferod'
							class="form-control"
							id="m_feferod"
							required="required"
							placeholder="FECHA DE IDA..."
							max='2100-12-31'
					/>
					<label for="m_fedeida" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
					</label>
				</div>
			</div>

			<!-- FECHA REGRESO -->
			<label class="col-sm-1 control-label regreso">Fecha:</label>
			<div class="col-sm-3 regreso">
				<div class="icon-addon addon-md">
					<input type="date"
							name='m_federeg'
							class="form-control"
							id="m_federeg"
							placeholder="FECHA DE REGRESO..."
							max='2100-12-31'
					/>
					<label for="m_federeg" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
					</label>
				</div>
			</div>

		</div>

		<!-- Boton de busqueda--> 
		<div class="row form-group">
			<div class="col-sm-2">
				<!-- BOTON BUSCAR -->
				<button 
					class="btn btn-success"
					id="buscar_rod"
					type="submit"
					style="text-shadow:2px 2px 4px #000000;">
					<i class="fa fa-search" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
					</i>&nbsp&nbspBuscar
				</button>
			</div>
		</div>
	</div>

{!!Form::close()!!}		



<div id="contenidoTest">
	test tr

</div>

</br>

<div class="viajesIdaRegreso">
	@if($rodamientos_origen!=null)
		<input id="mcatipvi" value="{{$m_catipvi}}"></input>
		<input id="mnucoori" value="{{$m_nucoori}}"></input>
		<input id="mnucodes" value="{{$m_nucodes}}"></input>
		<input id="mnuofici" value="{{$m_nuofici}}"></input>
		<input id="mfeferod" value="{{$m_feferod}}"></input>

		<script type="text/javascript">
			$( window ).on( "load", function() { 
				var m_nucoori = $( "#m_nucoori option:selected" ).text();
				var m_nucodes = $( "#m_nucodes option:selected" ).text();
				$( ".divCiudadOrigenIda" ).text( m_nucoori );
				$( ".divCiudadDestinoIda" ).text(m_nucodes);	
			})			
		</script>
	@endif

	@if($rodamientos_destino!=null)
		<br>
		<input id="mnuofire" value="{{$m_nuofire}}"></input>
		<input id="mfedereg" value="{{$m_federeg}}"></input>

		<script type="text/javascript">
			$( window ).on( "load", function() { 
				var m_nucoori = $( "#m_nucoori option:selected" ).text();
				var m_nucodes = $( "#m_nucodes option:selected" ).text();
				$( ".divCiudadOrigenRegreso" ).text( m_nucoori );
				$( ".divCiudadDestinoRegreso" ).text(m_nucodes);		
			})			
		</script>
	@endif
</div>
	
</br>
		
<script type="text/javascript">

	$(document).on('ready', function () {
		if ($("#mcatipvi").val()=="SOLO IDA") {
			$(".idaRegreso").show()
			$(".ida").show()
			$(".regreso").hide()
			$("#m_nucoori").parents('div.form-group').show();
			$("#m_nucodes").parents('div.form-group').show();

			$("#m_catipvi").val($("#mcatipvi").val()) 

			$("#m_nucoori").val($("#mnucoori").val()) 
			$("#m_nucodes").val($("#mnucodes").val()) 
			$("#m_nuofici").val($("#mnuofici").val()) 
			$("#m_feferod").val($("#mfeferod").val())

		}

		if ($("#mcatipvi").val()=="IDA Y REGRESO") {
			$(".idaRegreso").show()
			$(".ida").show()
			$(".regreso").show()
			$("#m_nucoori").parents('div.form-group').show();
			$("#m_nucodes").parents('div.form-group').show();

			$("#m_catipvi").val($("#mcatipvi").val()) 

			$("#m_nucoori").val($("#mnucoori").val()) 
			$("#m_nucodes").val($("#mnucodes").val()) 
			$("#m_nuofici").val($("#mnuofici").val()) 
			$("#m_feferod").val($("#mfeferod").val())
			$("#m_nuofire").val($("#mnuofire").val())
			$("#m_federeg").val($("#mfedereg").val())
		}

					//1-1 CIUDAD ORIGEN - USUARIO OFICINA - m_nucoori
			var dato_ciud_orig = "{{Auth::user()->oficina->m_nucociu}}";
			//2-2 OFICINA ABORDAJE - USUARIO OFICINA - m_nuofi01
			var dato_ofic_orig = "{{Auth::user()->oficina->m_nucodig}}";

			//2- ASIGNA VALORES PREDETERMINADOS
			$("#m_nucoori").val(dato_ciud_orig);
			$("#m_nuofi01").val(dato_ofic_orig);
	});


	$( "#m_catipvi" ).change(function() {

		$(".viajesIdaRegreso").hide()
		$("#m_nuofire").val("")
		$("#m_federeg").val("")

		//1-1 CIUDAD ORIGEN - USUARIO OFICINA - m_nucoori
		var dato_ciud_orig = "{{Auth::user()->oficina->m_nucociu}}";
		//2-2 OFICINA ABORDAJE - USUARIO OFICINA - m_nuofi01
		var dato_ofic_orig = "{{Auth::user()->oficina->m_nucodig}}";

		//2- ASIGNA VALORES PREDETERMINADOS
		$("#m_nucoori").val(dato_ciud_orig);
		$("#m_nuofi01").val(dato_ofic_orig);

		//	ASIGNA DATOS OBTENIDOS
		var dat_mue_ocu = $("#m_catipvi").val();


		$("#m_nucoori").parents('div.form-group').hide();
		$("#m_nucodes").parents('div.form-group').hide();
		$(".ida").hide()
		$(".regreso").hide()
		$(".idaRegreso").hide()

		if (dat_mue_ocu=="") {		
			return
	    }
	
		$("#m_nucoori").parents('div.form-group').show();
		$("#m_nucodes").parents('div.form-group').show();

		var hoy_fecha = new Date();
		var tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
		if (dat_mue_ocu=="SOLO IDA") {
			$(".idaRegreso").show()
			$(".ida").show()
			$(".regreso").hide()
			// VIAJE DE IDA ASIGNA FECHA HOY
			$("#m_feferod").val(getFormattedDate(hoy_fecha));
		}
		if (dat_mue_ocu=="IDA Y REGRESO") {
			$(".idaRegreso").show()
			$(".ida").show()
			$(".regreso").show()
			// VIAJE DE IDA ASIGNA FECHA HOY
			$("#m_feferod").val(getFormattedDate(hoy_fecha));
			// VIAJE DE REGRESO ASIGNA FECHA MAÑANA
			$("#m_federeg").val(getFormattedDate(tomorrow));
		}

		//3- ENFOCA CIUDAD DE DESTINO
		$("#m_nucodes").focus();
	
	});

	// FUNCION FECHA HOY FORMATO YYYY-MM-DD
	getFormattedDate = function (date) {
	    return date.getFullYear()
	        + "-"
	        + ("0" + (date.getMonth() + 1)).slice(-2)
	        + "-"
	        + ("0" + date.getDate()).slice(-2);
	}

</script>