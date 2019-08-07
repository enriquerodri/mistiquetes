<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu-tiquetes.blade.php
//Descripción:      Menu horizontal Tiquetes
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL TIQUETES -->
<nav class="navbar navbar-default mb-15">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-expanded="false" data-target="#bs-example-navbar-collapse-8" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="{{ route('operativos') }}" class="navbar-brand">OPERATIVOS</a>
        </div>
        <!-- 26-08-2018 -->
        <!-- CHEQUEA ESTADO DE SESION ACTIVA - INACTIVA -->
        @if(Auth::check())
            @include('partials.mensajes')
            @if(Auth::user()->m_capap12=="SI")
                <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- OPCION 01 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Caja <span class="caret"></span></a>
                            <ul class="dropdown-menu">
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
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-list-alt"></span>  PROGRAMACION</p></li>
                                <li><a href="{{ route('paises.index') }}">Registro</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Transbordos</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cloud-download"></span>  INTERFAZ</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Terminales de transporte</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 03 -->
                        <!-- <li><a href="{{ route('ventas.index') }}">Ventas y reservas</a></li> -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tiquetería <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-tag"></span>  TIQUETES</p></li>
                                <li><a href="{{ route('paises.index') }}">Ventas y reservas</a></li>
                                <li><a href="{{ route('paises.index') }}">Reasignar</a></li>
                                <li><a href="{{ route('paises.index') }}">Abierto</a></li>
                                <li><a href="{{ route('paises.index') }}">Consultar</a></li>
                                <li><a href="{{ route('paises.index') }}">Web - Revertido</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-book"></span>  LIBROS DE VIAJE</p></li>
                                <li><a href="{{ route('paises.index') }}">Generar</a></li>
                                <li><a href="{{ route('paises.index') }}">Consultar</a></li>
                                <li><a href="{{ route('paises.index') }}">Anular</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-road"></span>  PROTOCOLOS DE ALISTAMIENTO</p></li>
                                <li><a href="{{ route('paises.index') }}">Registro</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 04 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Encomiendas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-export"></span>  ENVIADAS</p></li>
                                <li><a href="{{ route('paises.index') }}">Registrar</a></li>
                                <li><a href="{{ route('paises.index') }}">Remesar</a></li>
                                <li><a href="{{ route('paises.index') }}">Consultar</a></li>
                                <li><a href="{{ route('paises.index') }}">Anular</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-import"></span>  RECIBIDAS</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Consultar</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Trazabilidad</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-briefcase"></span>  PLANILLAS DE CARGA</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Generar</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Consultar</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Anular</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-cloud-download"></span>  DESCARGAR</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Consolidado</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Plantilla manifiesto de carga</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 05 --> 
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Giros <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-export"></span>  ENVIADOS</p></li>
                                <li><a href="{{ route('paises.index') }}">Registrar</a></li>
                                <li><a href="{{ route('paises.index') }}">Trazabilidad</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-import"></span>  RECIBIDOS</p></li>
                                <li><a href="{{ route('paises.index') }}">Pagar</a></li>
                                <li><a href="{{ route('paises.index') }}">Trazabilidad</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 06 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>  ADMINISTRADOR</p></li>
                                <li><a href="{{ route('clientescontado.index') }}">Administrador</a></li>
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
<!-- FIN MENU HORIZONTAL TIQUETES -->
