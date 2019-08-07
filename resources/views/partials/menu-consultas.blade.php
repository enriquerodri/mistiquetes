<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu-consultas.blade.php
//Descripción:      Menu horizontal Consultas
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL CONSULTAS -->
<nav class="navbar navbar-default mb-15">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-expanded="false" data-target="#bs-example-navbar-collapse-8" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="{{ route('admin') }}" class="navbar-brand">ADMINISTRATIVOS</a>
        </div>
        <!-- 26-08-2018 -->
        <!-- CHEQUEA ESTADO DE SESION ACTIVA - INACTIVA -->
        @if(Auth::check())
            @if(Auth::user()->m_capap04=="SI")
                <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- OPCION 01 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Caja <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-folder-open"></span>   APERTURAS Y CIERRES</p></li>
                                <li><a href="{{ route('paises.index') }}">Registro</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-file"></span>  DOCUMENTOS CONTABLES</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Gastos de viaje</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Egresos</a></li>
                                <li><a href="{{ route('cargos.index') }}">Ingresos</a></li>
                                <li><a href="{{ route('grupos.index') }}">Notas crédito</a></li>
                                <li><a href="{{ route('contratos.index') }}">Notas debito</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 02 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rodamientos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-list-alt"></span>  PLAN DE RODAMIENTOS</p></li>
                                <li><a href="{{ route('paises.index') }}">Por clase de vehículo</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Por conductor</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Por ruta</a></li>
                                <li><a href="{{ route('cargos.index') }}">Por vehículo</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 03 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Encomiendas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-export"></span>  ENVIADAS</p></li>
                                <li><a href="{{ route('paises.index') }}">Por documento o tipo</a></li>
                                <li><a href="{{ route('paises.index') }}">Trazabilidad</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-import"></span>  RECIBIDAS</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Por documento o tipo</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Trazabilidad</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-briefcase"></span>  PLANILLAS DE CARGA</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Por conductor</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Por documento</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Por vehículo</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-cloud-download"></span>  DESCARGAR</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Consolidado</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Plantilla manifiesto de carga</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 04 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Giros <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-export"></span>  ENVIADOS</p></li>
                                <li><a href="{{ route('paises.index') }}">Por documento</a></li>
                                <li><a href="{{ route('paises.index') }}">Trazabilidad</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-import"></span>  RECIBIDOS</p></li>
                                <li><a href="{{ route('paises.index') }}">Por documento</a></li>
                                <li><a href="{{ route('paises.index') }}">Trazabilidad</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 05 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiquetería <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-tag"></span>  TIQUETES</p></li>
                                <li><a href="{{ route('paises.index') }}">Por documento o tipo</a></li>
                                <li><a href="{{ route('paises.index') }}">Trazabilidad</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-book"></span>  LIBROS DE VIAJE</p></li>
                                <li><a href="{{ route('paises.index') }}">Por conductor</a></li>
                                <li><a href="{{ route('paises.index') }}">Por documento</a></li>
                                <li><a href="{{ route('paises.index') }}">Por vehículo</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-road"></span>  PROTOCOLOS DE ALISTAMIENTO</p></li>
                                <li><a href="{{ route('paises.index') }}">Registro</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 06 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productividad <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-signal"></span>  ANALISIS PRODUCTIVIDAD</p></li>
                                <li><a href="{{ route('paises.index') }}">Conductores</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Oficinas</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Rutas y trayectos</a></li>
                                <li><a href="{{ route('cargos.index') }}">Taquilleros</a></li>
                                <li><a href="{{ route('cargos.index') }}">Vehículos</a></li>
                            </ul>
                        </li>
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
<!-- FIN MENU HORIZONTAL CONSULTAS -->
