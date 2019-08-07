s<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Marcas de vehiculo
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<?php
    // Obtiene fecha y hora actual
    $fecha_actual = new DateTime();
    // Convierte fecha y hora actual a texto
    //$cadena_fecha_actual = $fecha_actual->format("d/m/Y/h/i/s/a");
    $cadena_fecha_actual = $fecha_actual->format("dmYhisa");
    // Nombre archivo exportacion
    $nombre_archivo_codebar = 'ans'.$cadena_fecha_actual;

?>

<style type="text/css">
    @page { margin: 20px 25px; }
    header { top: 0px; left: 0px; right: 0px;}

    footer { position: fixed; bottom: 0px; left: 0px; right: 0px; background-color: white; height: 15px; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px; text-align:right;}
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }

	.pagenum:before {
    content: counter(page);
	}

	body {
		margin: 10px;
		padding: 0px;
		font-family: Helvetica, Arial, sans-serif;
		padding-top: 0px; /* Relleno superior igual a la altura de la cabecera*/
	}

	.code {
    	height: 80px |Important;
	}	

</style>

<html>
	<head>
		<!-- INICIO TITULO -->
		<title>Marcas vehículo</title>
		<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:14px; text-align: letf;">
			<hr align="left" width="50%" style="color: #2d3436; height: -1px;"/>
			<!-- 1- EMPRESA RAZON SOCIAL -->
			{{Auth::user()->empresa->m_carazso}}<br>
			<hr align="left" width="50%" style="color: #2d3436; height: -1px;"/>

			<!-- 28-08-2018 -->
			<!-- {{Session::get('emp_raz_soc')}}<br> -->
			<!-- {{Session::get('emp_nom_cor')}}<br> -->
		</div>
		<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px; text-align: letf;">
			<!-- 2- EMPRESA NUIP -->
			{{Auth::user()->empresa->m_canuipe}}<br>
			<!-- 2- OFICINA NOMBRE -->
			{{Auth::user()->oficina->m_canombr}}<br>

			<!-- 28-08-2018 -->
			<!-- {{Session::get('nombre_oficina')}} <br> -->
			<!-- 28-08-2018 -->
			<!-- {{Session::get('glo_nom_ofi_cin')}}<br> -->
			<!-- {{Session::get('nombre_ciudad')}} - {{Session::get('nombre_departamento')}} - {{Session::get('nombre_pais')}}<br><br> -->
			<!-- {{Session::get('glo_nom_bre_ciu')}} - {{Session::get('glo_nom_bre_dep')}} - {{Session::get('glo_nom_bre_pai')}}<br> -->

			<!-- 3- OFICINA REGIONAL -->
			{{Session::get('glo_ofi_ubi_reg')}}<br>
			<!-- 4- APLICATIVO -->
			mistiquetes.com<br>
		</div>
		<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px; text-align: letf;">
			<hr align="right" width="50%" style="color: #2d3436; height: -1px;"/>
		</div>
		<!-- FIN TITULO -->
	</head>
	<body>
		<!-- INICIO ENCABEZADO -->
		<header>
			<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:12px; text-align: center;">
				CONSULTA MARCAS VEHICULO<br>
			</div>
			<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:14px; text-align: letf;">
				<hr style="color: #5CB85C; height: -1px;"/>
			</div>
		</header>
		<!-- FIN ENCABEZADO -->
		<!-- INICIO PIE -->
		<footer>
			<hr style="color: #2d3436; height: -1px;"/>
				CONSULTA MARCAS VEHICULO - Página <span class="pagenum"></span>
			<hr style="color: #2d3436; height: -1px;"/>
		</footer>
		<!-- FIN PIE -->

		<!-- INICIO TABLA -->
		</h3>
		<table class="table table-striped table-hover table-bordered">
			<!-- INICIO ENCABEZADO TABLA-->
			<thead>
				<tr class="text-center">
					<td style="text-align: center; background-color: #5CB85C; color: white; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">Marca vehículo
					</td>
					<td style="text-align: center; background-color: #5CB85C; color: white; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">Código Nacional
					</td>
					<td style="text-align: center; background-color: #5CB85C; color: white; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">Estado
					</td>
					<td style="text-align: center; background-color: #5CB85C; color: white; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">Registro
					</td>
					<td style="text-align: center; background-color: #5CB85C; color: white; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">Usuario
					</td>
					<td style="text-align: center; background-color: #5CB85C; color: white; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">Actualizado
					</td>
					<td style="text-align: center; background-color: #5CB85C; color: white; font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">Usuario
					</td>
				</tr>
			</thead>
			<!-- FIN ENCABEZADO TABLA -->
			<!-- INICIO CONTENIDO TABLA -->
			<tbody>
				@foreach($marcas as $marca)
					<tr>
						<td class="text-left" style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">{{$marca->m_canombr}}
						</td>
						<td style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">{{$marca->m_cacodna}}
						</td>
						<td style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">{{$marca->m_caestad}}
						</td> 
						<td style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">{{$marca->created_at}}
						</td>
						<td style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">{{$marca->usuario_registra->name}}
						</td>
						<td style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">{{$marca->updated_at}}
						</td>
						<td style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:10px;">{{$marca->usuario_actualiza->name}}
						</td>
					</tr>
				@endforeach
			</tbody>
			<!-- FIN CONTENIDO TABLA -->
		</table>
		<!-- FIN TABLA -->
		<!-- INICIO RESUMEN -->
		<div class="modal-footer">
			<hr style="color: #5CB85C; height: -1px;"/>
			<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;font-size:10px; text-align: left;">
				<br>
				<b>Total Registros: {{$marcas->Count()}}</b><br>
				<b>Generado: <?php setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota'); echo strftime("El %A, %d de %B del %Y - %r - PDF (Formato de Documento Portátil)"); ?></b><br>
				<b>Usuario: {{Auth::user()->name}}</b><br>
				<b>Noticia: Aplican cláusulas de confidencialidad en el manejo de información</b>
				<br>
				<!-- INICIO CODIGO DE BARRAS -->
				<!-- 
				<div style="width: 500px !important;">
					{!!DNS1D::getBarcodeHTML($nombre_archivo_codebar, 'C39')!!}
					<p>{!!$nombre_archivo_codebar!!}</p>
				</div>
				<br><br>
				-->
				<!-- FIN CODIGO DE BARRAS -->
				<!-- INICIO CODIGO QR -->
				<div class="visible-print text-center">
				    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($nombre_archivo_codebar)) !!} ">
				    <!-- NOMBRE ARCHIVO GENERADO CODIGO QR
				    <p>{!!$nombre_archivo_codebar!!}</p>
					-->
				</div>
				<!-- FIN CODIGO QR -->
			</div>
			<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:12px; text-align: right;">
              	<a class="" href="javascript:void(0)"><img src="{{ asset('images/LOGO_01_103_X_22.bmp') }}" alt=""></a>
			</div>
			<div style="font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif; font-size:14px; text-align: letf;">
				<hr style="color: #2d3436; height: -1px;"/>
			</div>
		</div>
		<!-- FIN RESUMEN -->
	</body>
</html>
