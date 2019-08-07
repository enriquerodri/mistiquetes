<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu-integradorcontable.blade.php
//Descripción:      Menu horizontal Integrador contable
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL INTEGRADOR CONTABLE -->
<nav class="navbar navbar-default mb-15">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-expanded="false" data-target="#bs-example-navbar-collapse-8" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a href="{{ route('admin') }}" class="navbar-brand">ADMINISTRATIVOS</a>
        </div>
        <!-- 26-08-2018 -->
        <!-- CHEQUEA ESTADO DE SESION ACTIVA - INACTIVA -->
        @if(Auth::check())
            @if(Auth::user()->m_capap07=="SI")
                <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- OPCION 01 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Documentos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-thumbs-up"></span>   MANUALES</p></li>
                                <li><a href="{{ route('paises.index') }}">Registro</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 02 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contables I <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-share"></span>  INTERFAZ CONTABLE I</p></li>
                                <li><a href="{{ route('paises.index') }}">Documentos manuales</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Documentos sistematizados</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Distribución ingresos</a></li>
                                <li><a href="{{ route('cargos.index') }}">Consultar</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-share"></span>  INTERFAZ CONTABLE II</p></li>
                                <li><a href="{{ route('paises.index') }}">Fondo de reposición ley 105</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Intereses vehículos con saldo negativo</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Retención de industria y comercio RETEICA</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon glyphicon-share"></span>  INTERFAZ CONTABLE III</p></li>
                                <li><a href="{{ route('paises.index') }}">Oficinas</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Taquilleros</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Vehículos</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 03 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contables II <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-log-in"></span>  INTERFAZ CONTABLE I</p></li>
                                <li><a href="{{ route('paises.index') }}">Documentos sistematizados</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-log-in"></span>  INTERFAZ CONTABLE II</p></li>
                                <li><a href="{{ route('ciudades.index') }}">Fondo de reposición ley 105</a></li>
                                <li><a href="{{ route('divisiones.index') }}">Intereses vehículos con saldo negativo</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Retención de industria y comercio RETEICA</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 04 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Extractos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-export"></span>  GENERADOR</p></li>
                                <li><a href="{{ route('paises.index') }}">Generador de extractos</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-import"></span>  INTEGRADO</p></li>
                                <li><a href="{{ route('paises.index') }}">Generador integrado de extractos</a></li>
                            </ul>
                        </li>
                        <!-- OPCION 05 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parámetros <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-copy"></span>  CONTABLES</p></li>
                                <li><a href="{{ route('paises.index') }}">Administrador de fondos</a></li>
                                <li><a href="{{ route('paises.index') }}">Conceptos documentos contables</a></li>
                                <li><a href="{{ route('paises.index') }}">Documentos Manuales</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-move"></span>  DISTRIBUCION</p></li>
                                <li><a href="{{ route('paises.index') }}">Libros de viaje</a></li>
                                <li><a href="{{ route('paises.index') }}">Tiquetes</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-user"></span>  TERCEROS</p></li>
                                <li><a href="{{ route('paises.index') }}">Administrador</a></li>
                                <li><a href="{{ route('paises.index') }}">Importar</a></li>
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
<!-- FIN MENU HORIZONTAL INTEGRADOR CONTABLE -->
