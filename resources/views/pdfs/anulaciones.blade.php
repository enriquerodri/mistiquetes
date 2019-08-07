<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Motivos anulación documentos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!DOCTYPE <html>
	<html>
	<head>
		<title>Anulaciones</title>
		@foreach($anulaciones as $anulacion)
		{{$anulacion->m_canombr}}
		<hr>
		@endforeach
	<body>
</html>
