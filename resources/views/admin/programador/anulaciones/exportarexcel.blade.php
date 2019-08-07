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

<html>
	<head>
		<title>Anulaciones</title>
	</head>
	<body>
		<h1>Motivos Anulaciones</h1>
			@foreach($anulaciones as $anulacion)
				<strong>Nombre: </strong>{{$anulacion->m_canombr}}<br>
				<strong>Aplica a: </strong>{{$anulacion->m_caaplic}}<br>
				<strong>Documentos relacionados: </strong>{{$anulacion->m_caanure}}<br>
				<strong>Estado: </strong>{{$anulacion->m_caestad}} <br>
				<strong>Código nacional: </strong>{{$anulacion->m_cacodna}} <br>
				<strong>Registro: </strong>{{$anulacion->created_at}} <br>
				<strong>Usuario: </strong>{{$anulacion->usuario_registra->name}}<br>
				<strong>Actualizado: </strong>{{$anulacion->updated_at}}<br>
				<strong>Usuario: </strong>{{$anulacion->usuario_actualiza->name}}<br><br>
				<hr>
			@endforeach
	</body>
</html>
