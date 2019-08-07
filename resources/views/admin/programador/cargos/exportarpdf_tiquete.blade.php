<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Cargos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<?php
//require __DIR__ . '/vendor/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


setlocale(LC_TIME,"es_ES"); date_default_timezone_set ('America/Bogota');

/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/
 
/*
	Aquí, en lugar de "POS-58" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/
 
//$nombre_impresora = "POS-58";
$nombre_impresora = "BIXOLON SPP-R300";
 
 
$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
 
 
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras
 
	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/
 
# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);
 
/*
	Intentaremos cargar e imprimir
	el logo
	logo.png
	images/LOGO_01_103_X_22.bmp
*/
try{
	$logo = EscposImage::load(asset('images/logo.png'), false);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

/*
	Ahora vamos a imprimir un encabezado
*/

//	ESTILOS
//	Fuente A (sin modo)		- 0		- Normal
$fue_nor_000 = Printer::MODE_FONT_A;
$imp_nor_000 = $fue_nor_000;
//	Fuente B 				- 1		- Tamaño 6
$fue_nor_006 = Printer::MODE_FONT_B;
$imp_nor_006 = $fue_nor_006;
//	Enfatizado				- 8		- Tamaño 8
$fue_nor_008 = Printer::MODE_EMPHASIZED;
$imp_nor_008 = $fue_nor_008;
//	Doble altura			- 16	- Tamaño 16
$fue_nor_016 = Printer::MODE_DOUBLE_HEIGHT;
$imp_nor_016 = $fue_nor_016;
//	Doble ancho 			- 32	- Tamaño 32
$fue_nor_032 = Printer::MODE_DOUBLE_WIDTH;
$imp_nor_032 = $fue_nor_032;
//	Subrayar				- 128	- Subrayado
$fue_nor_132 = Printer::MODE_UNDERLINE;
$imp_nor_132 = $fue_nor_132;

//	CODIGO DE BARRAS
$cod_bar_039 = Printer::BARCODE_CODE39;

//
//
$printer -> selectPrintMode($imp_nor_000);
//	COMPAÑIA
$emp_raz_soc = Auth::user()->empresa->m_carazso;
$emp_nui_pes = Auth::user()->empresa->m_canuipe;
$ofi_nom_bre = Auth::user()->oficina->m_canombr;
$ofi_ubi_reg = Session::get('glo_ofi_ubi_reg');
//$printer->text("VELOTAX LTDA." . "\n");
//$printer->text("890 700 189 6" . "\n");
$printer->text($emp_raz_soc . "\n");
$printer->text($emp_nui_pes . "\n");
$printer->text("" . "\n");
//	OFICINA
$printer->setJustification(Printer::JUSTIFY_LEFT);
//$printer->text("TERMINAL SALITRE BOGOTA - 38" . "\n");
$printer->text($ofi_nom_bre . "\n");
$printer->text($ofi_ubi_reg . "\n");
$printer->text("mistiquetes.com" . "\n");
$printer->text("__________________________________________" . "\n");
//	FECHA Y HORA DE IMPRESION
$printer->text("Impreso " . strftime("el %A, %d de %B del %Y - %r") . "\n");
//	TIQUETE NUMERO
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Tiquete / Ticket" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("1569067 - 38" . "\n");
//	CODIGO DE OPERACION
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Codigo opereración / Operation code" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("4193988 - 4193988" . "\n");
//	FECHA Y HORA DE VIAJE
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Fecha y hora viaje / Departure date and time" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("Miércoles, 28 Noviembre 2018 00:15 a.m." . "\n");
//	ORIGEN Y DESTINO
$printer -> selectPrintMode($imp_nor_000);
$printer->text("De / From   A / To" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("BOGOTA - CALI" . "\n");
//	VEHICULO PLACA Y NUMERO INTERNO
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Vehículo / Vehicle" . "\n");
$printer -> selectPrintMode($imp_nor_008+$imp_nor_016);
$printer->text("20020 - WDL-358" . "\n");
//	VEHICULO SERVICIO
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Servicio / Service" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("DOBLE PISO" . "\n");
//	SILA
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Silla/ Seat at" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("9-10-11" . "\n");
//	CANTIDAD
$printer -> selectPrintMode($imp_nor_000);
$printer->text("__________________________________________" . "\n");
$printer->text("Cantidad / Quantity" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("3" . "\n");
//	VALOR TOTAL
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Valor tiquete / Ticket value" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("243.000.00" . "\n");
//	VIAJERO
$printer -> selectPrintMode($imp_nor_000);
$printer->text("__________________________________________" . "\n");
$printer->text("Viajero identificación / Photo ID" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("79266904 - LUIS ENRIQUE RODRIGUEZ VIVAS" . "\n");
//	USUARIO
$printer -> selectPrintMode($imp_nor_000);
$printer->text("Atendido por / Attended by" . "\n");
$printer -> selectPrintMode($imp_nor_008);
$printer->text("CLAUDIA PATRICIA VELEZ GARCIA" . "\n");
$printer -> selectPrintMode($imp_nor_000);
$printer->text("__________________________________________" . "\n");
$printer->setJustification(Printer::JUSTIFY_CENTER);
//	CODIGO DE BARRAS
$printer -> setBarcodeHeight(120);
$printer -> barcode("1569067", $cod_bar_039);
$printer->text("1569067" . "\n");
//	CODIGO QR
$testStr = "79266904 - LUIS ENRIQUE RODRIGUEZ VIVAS";
$printer -> qrCode($testStr, Printer::QR_ECLEVEL_L, 16);
//
$printer->text("" . "\n");
//	HABEAS DATA
$printer->text("Cumplimiento Ley 1581 de 2012 - Protección de datos personales - pqrpasajes@velotax.com.co" . "\n");
$printer->text("__________________________________________" . "\n");
//
/*Alimentamos el papel 3 veces*/
$printer->feed(3);
 
/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();
 
/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();
 
/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();
?>
