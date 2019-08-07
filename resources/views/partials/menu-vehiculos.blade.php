<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu-vehiculo.blade.php
//Descripción:      Menu horizontal Vehiculos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL VEHICULOS -->
<nav class="navbar navbar-default mb-15">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-expanded="false" data-target="#bs-example-navbar-collapse-8" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="{{ route('admin') }}" class="navbar-brand">ADMINISTRATIVOS</a>
        </div>
        <!-- 26-08-2018 -->
        <!-- CHEQUEA ESTADO DE SESION ACTIVA - INACTIVA -->
        @if(Auth::check())
            @include('partials.mensajes')
            @if(Auth::user()->m_capap14=="SI")
                <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- OPCION 01 -->
                        <li class="active dropdown"><a href="{{ route('propietarios.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Propietarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   ADMINISTRADOR</p></li>
                                <li><a href="{{ route('propietarios.index') }}">Registro</a></li>
                            </ul>
                        </li>
                        
                        <!-- OPCION 02 -->
                        <li class="dropdown"><a href="{{ route('rutas.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rutas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   ADMINISTRADOR</p></li>
                                <li><a href="{{ route('rutas.index') }}">Registro</a></li>
                                <li><a href="{{ route('rutas-autorizadas.index') }}">Autorizadas</a></li>
                            </ul>
                        </li>
                        
                        <!-- OPCION 03 -->
                        <li class="dropdown"><a href="{{ route('rutas.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Carga <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   TARIFARIOS</p></li>
                                <li><a href="{{ route('rutas.index') }}">Rutas principales</a></li>
                                <li><a href="{{ route('rutas-autorizadas.index') }}">Reexpedición</a></li>
                                <li><a href="{{ route('rutas-autorizadas.index') }}">Liquidación por kilos</a></li>
                                <li><a href="{{ route('rutas-autorizadas.index') }}">Artículos por clase</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   ARTICULOS Y CLASES</p></li>
                                <li><a href="{{ route('rutas.index') }}">Artículos</a></li>
                                <li><a href="{{ route('rutas-autorizadas.index') }}">Clases</a></li>
                            </ul>
                        </li>

                        <!-- OPCION 04 -->
                        <li class="dropdown"><a href="{{ route('rutas.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pasajeros <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   TARIFARIOS</p></li>
                                <li><a href="{{ route('rutas.index') }}">Por ruta y trayectos</a></li>
                            </ul>
                        </li>

                        <!-- OPCION 05 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vehículos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   ADMINISTRADOR</p></li>
                                <li><a href="{{ route('vehiculos.index') }}">Vehículos de Pasajeros y Carga</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   PARAMETROS I</p></li>
                                <li><a href="{{ route('clases.index') }}">Clases</a></li>
                                <li><a href="{{ route('lineas.index') }}">Líneas</a></li>
                                <li><a href="{{ route('marcas.index') }}">Marcas</a></li>
                                <li><a href="{{ route('colores.index') }}">Paleta de colores</a></li>
                                <li><a href="{{ route('tipos-carrocerias.index') }}">Tipos de Carrocería</a></li>
                                <li><a href="{{ route('tipos-combustible.index') }}">Tipos de combustible</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   PARAMETROS II</p></li>
                                <li><a href="{{ route('clases.index') }}">Grupos de vehículos</a></li>
                                <li><a href="{{ route('clases.index') }}">Planos silletería</a></li>
                                <li><a href="{{ route('servicios.index') }}">Tipos de servicio</a></li>
                            </ul>
                        </li>

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
<!-- FIN MENU HORIZONTAL VEHICULOS -->
