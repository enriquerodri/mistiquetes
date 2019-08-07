<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu-fichatecnica.blade.php
//Descripción:      Menu horizontal Ficha tecnica
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL FICHA TECNICA -->
<nav class="navbar navbar-default mb-15">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-expanded="false" data-target="#bs-example-navbar-collapse-8" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="{{ route('admin') }}" class="navbar-brand">ADMINISTRATIVOS</a>
        </div>
        <!-- 26-08-2018 -->
        <!-- CHEQUEA ESTADO DE SESION ACTIVA - INACTIVA -->
        @if(Auth::check())
            @if(Auth::user()->m_capap06=="SI")
                <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- OPCION 01 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Protocolo de alistamiento <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-cog"></span>   ADMINISTRADOR</p></li>
                                <li><a href="{{ route('paises.index') }}">Centros de diagnóstico automotor</a></li>
                                <li><a href="{{ route('paises.index') }}">Ítems protocolo</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-file"></span>  REGISTRAR</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Protocolos de alistamiento</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-search"></span>  CONSULTAR</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Protocolo de alistamiento</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 02 -->
                        <!-- OPCION 03 -->
                        <!-- OPCION 04 -->
                        <!-- OPCION 05 -->
                        <!-- OPCION 06 -->
                        <!-- OPCION 07 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-pencil"></span>  TARIFARIOS</p></li>
                                <li><a href="{{ route('paises.index') }}">Encomiendas</a></li>
                                <li><a href="{{ route('paises.index') }}">Giros</a></li>
                                <li><a href="{{ route('paises.index') }}">Tiquetería</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-screenshot"></span>  VINCULADOS</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Asociados, conductores, propietarios</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Vehículos</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-home"></span>  OFICINAS</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Directorio</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-th-list"></span>  TERMINALES DE TRANSPORTE</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Directorio</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Tarifarios</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-user"></span>  CLIENTES</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Contado</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Crédito</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Convenios empresariales</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 08 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herramientas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-cloud-download"></span>  DESCARGAR</p></li>
                                <li><a href="{{ route('paises.index') }}">Tablas de datos</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-object-align-bottom"></span>  SISTEMA</p></li>
                                <li><a href="{{ route('paises.index') }}">Propiedades del sistema</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-cloud-download"></span>  FONDOS</p></li>
                                <li><a href="{{ route('paises.index') }}">Descargar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif
        @endif
    </div>
</nav>
<!-- FIN MENU HORIZONTAL FICHA TECNICA -->
