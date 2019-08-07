<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           errors.blade.php
//Descripción:      Errores global
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO ERRORES GLOBAL -->
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        {{--@if(\Session::has('erroru'))
			<li>{{\Session::get('errou')}}</li>
        @endif--}}
    </ul>
</div>
<!-- FIN ERRORES GLOBAL -->
