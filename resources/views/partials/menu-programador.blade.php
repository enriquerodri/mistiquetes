<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           menu-programador.blade.php
//Descripción:      Menu horizontal Programador
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENU HORIZONTAL PROGRAMADOR -->
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
            @if(Auth::user()->m_capap10=="SI")
                <div id="bs-example-navbar-collapse-8" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <!-- OPCION 01 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-usd"></span>   CONTADO</p></li>
                                <li><a href="{{ route('clientescontado.index') }}">Administrador</a></li>
                                <li><a href="{{ route('paises.index') }}">Contratos</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-thumbs-up"></span>   CONVENIOS</p></li>
                                <li><a href="{{ route('clientesconvenios.index') }}">Administrador</a></li>
                                <li><a href="{{ route('paises.index') }}">Contratos</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-paperclip"></span>   CREDITO</p></li>
                                <li><a href="{{ route('clientescredito.index') }}">Administrador</a></li>
                                <li><a href="{{ route('paises.index') }}">Contratos</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-pushpin"></span>   OTROS</p></li>
                                <li><a href="{{ route('asociados.index') }}">Vinculados</a></li>
                                <li><a href="{{ route('aseguradoras.index') }}">Compañias aseguradoras</a></li>
                                <li><a href="{{ route('terminales.index') }}">Terminales de transporte</a></li>
                                <li><a href="{{ route('paises.index') }}">Tarifas terminales de transporte</a></li>
                            </ul>
                        </li>

                        <!-- OPCION 02 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Identificadores <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-refresh"></span>   CAMBIO DE IDENTIFICADOR</p></li>
                                <li><a href="{{ route('paises.index') }}">Vinculados, Conductores, Propietarios</a></li>
                                <li><a href="{{ route('oficinas.index') }}">Oficinas</a></li>
                                <li><a href="{{ route('paises.index') }}">Usuarios</a></li>
                                <li><a href="{{ route('paises.index') }}">Vehículos</a></li>
                            </ul>
                        </li>

                        <!-- OPCION 03 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Oficinas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   ADMINISTRADOR</p></li>
                                <li><a href="{{ route('oficinas.index') }}">Registro</a></li>
                            </ul>
                        </li>

                        <!-- OPCION 04 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tablas Administrativas <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-globe"></span>   CONFIGURACION REGIONAL</p></li>
                                <li><a href="{{ route('paises.index') }}">Países</a></li>
                                <li><a href="{{ route('departamentos.index') }}">Departamentos</a></li>
                                <li><a href="{{ route('ciudades.index') }}">Ciudades</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-briefcase"></span>   CONFIGURACION EMPRESARIAL I</p></li>
                                <li><a href="{{ route('divisiones.index') }}">Divisiones</a></li>
                                <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
                                <li><a href="{{ route('grupos.index') }}">Grupos de Trabajo</a></li>
                                <li><a href="{{ route('contratos.index') }}">Tipos de Contrato laboral</a></li>
                                <li><a href="{{ route('capacitaciones.index') }}">Capacitaciones</a></li>
                                <li><a href="{{ route('examenes.index') }}">Exámenes Médicos</a></li>
                                <li><a href="{{ route('pruebas.index') }}">Pruebas</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-briefcase"></span>   CONFIGURACION EMPRESARIAL II</p></li>
                                <li><a href="{{ route('conceptos.index') }}">Conceptos activaciones e inactivaciones</a></li>
                                <li><a href="{{ route('anulaciones.index') }}">Motivos anulaciones</a></li>
                                <li><a href="{{ route('documentos.index') }}">Documentos</a></li>
                                <li><a href="{{ route('seguros.index') }}">Seguros</a></li>
                                <li><a href="{{ route('gastosviaje.index') }}">Gastos de viaje</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="
                                glyphicon glyphicon-user"></span>   NATURALES - JURIDICAS</p></li>
                                <li><a href="{{ route('tiposdocumentos.index') }}">Tipos documento de identificación</a></li>
                                <li><a href="{{ route('estadocivil.index') }}">Estado civil</a></li>
                                <li><a href="{{ route('estratosocial.index') }}">Estrato social</a></li>
                            </ul>
                        </li>

                        <!-- OPCION 05 -->
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   CUENTAS</p></li>
                                <li><a href="{{ route('usuarios.index') }}">Administrador</a></li>
                                <li><a href="{{ route('paises.index') }}">Mi cuenta</a></li>
                                <li class="divider"></li>
                                <li class="text-center" style="background: #ecf0f1;"><p><span class="glyphicon glyphicon-cog"></span>   CONTRASEÑA</p></li>
                                <li><a href="{{ route('contrasenias.index') }}">Administrador</a></li>
                                <li><a href="{{ route('paises.index') }}">Eliminar contraseña</a></li>
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
                                <li><a href="{{ route('ciudades.index') }}">Vinculados, conductores, propietarios</a></li>
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
<!-- FIN MENU HORIZONTAL PROGRAMADOR -->
