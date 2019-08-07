<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Usuarios
//					Acordeon Cuenta Modulos y Aplicativos
//Actualizaciones
//Número de orden:  0000-0001 
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- TITULO DATOS DE LA CUENTA -->
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspDATOS DE LA CUENTA
</h4>
<!-- NIVEL USUARIO -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -100px;"
		title="Módulos Administrativos">
		<img src="{{ asset('images/flaticon-png/small/Usuarios.png') }}" width="50" alt=""><b>&nbsp&nbspNivel:</b>
	</label>
	<div class="col-sm-8">
		<div class="icon-addon addon-md">
			{!! Form::select('m_canivel',[
					'ADMINISTRADOR'=>'ADMINISTRADOR',
					'USUARIO DE CONFIANZA'=>'USUARIO DE CONFIANZA',
					'USUARIO TEMPORAL'=>'USUARIO TEMPORAL'], null, [
					'class'=>'form-control',
					'id'=>'m_canivel',
					'required'=>'required',
					'placeholder'=>'NIVEL USUARIO',
					'title'=>"Lista de selección Asociado"
				])
			!!}
			<label for="m_canivel" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Tipo de usuario">
			</label>
		</div>
	</div>
</div>

<!-- FECHA DE VECIMIENTO-->
<div class="form-group">
	<!-- FECHA INICIO -->
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -100px;"
		title="Módulos Administrativos">
		<img src="{{ asset('images/flaticon-png/small/calendario_inicio.jpg') }}" width="50" alt=""><b>&nbsp&nbspInicio:</b>
	</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_feinici',null, [
					'class'=>'form-control',
					'id'=>'m_feinici',
					'placeholder'=>'FECHA INICIO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_feinici" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_feinici"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_feinici"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
</div>
<!-- FECHA DE VECIMIENTO-->
<div class="form-group">	
	<!-- FECHA VENCIMIENTO -->
	<!-- FECHA INICIO -->
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -100px;"
		title="Módulos Administrativos">
		<img src="{{ asset('images/flaticon-png/small/calendario_vencimiento.jpg') }}" width="50" alt=""><b>&nbsp&nbspVencimiento:</b>
	</label>
	</label>
	<div class="col-sm-3">
		<div class="icon-addon addon-md">
			{!!Form::date('m_fevenci',null, [
					'class'=>'form-control',
					'id'=>'m_fevenci',
					'placeholder'=>'FECHA VENCIMIENTO...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31'
				]) 
			!!}
			<label for="m_fevenci" class="glyphicon glyphicon-calendar" rel="tooltip" title="Seleccionar Fecha">
			</label>
		</div>
	</div>
	<!-- ASIGNAR FECHA DE HOY - BORRAR FECHA -->
	<div class="col-sm-1">
		<!-- ASIGNAR FECHA DE HOY -->
		<label id="m_fevenci"
				class="glyphicon glyphicon-pencil"
				rel="tooltip"
				title="Asignar fecha hoy"
				style="cursor: pointer; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="asignar_fecha_hoy(this.id)">
		</label>
		<!-- BORRAR FECHA -->
		<label id="m_fevenci"
				class="glyphicon glyphicon-erase"
				rel="tooltip"
				title="Borrar fecha"
				style="cursor: pointer; color: #FB0B1C; margin-left: 5px;"
				onclick="borrar_fecha(this.id)">
		</label>
	</div>
</div>
<!-- ULTIMA ACTUALIACION CONTRASEÑA -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -100px;"
		title="Módulos Administrativos">
		<img src="{{ asset('images/flaticon-png/small/contraseña_01.jpg') }}" width="50" alt=""><b>&nbsp&nbspContraseña:</b>
	</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!!Form::text('m_feactco',null, [
					'class'=>'form-control',
					'id'=>'m_feactco',
					'title'=>"Última Actualización Contraseña",
					'placeholder'=>'FECHA ACTUALIZACION CONTRASEÑA...',
					'min'=>'1900-01-01',
					'max'=>'2100-12-31',
					'readonly'=>'readonly',
					'style'=>'background-color:#fcfdff; color:#000105;'
				]) 
			!!}
			<label for="m_fevenci" class="glyphicon glyphicon-calendar" rel="tooltip" title="Última Actualización Contraseña">
			</label>
		</div>
	</div>
	<label class="col-sm-4 control-label">Última Actualización Contraseña</label>
</div>

<hr class="separador">
<h4 class="modal-title"
	id="myModalLabel"
	style="text-align: center; font-size:16px; color: #0E2FF5; margin-bottom: 10px;">
	<span class="fa fa-file-text-o"></span>&nbsp&nbspMODULOS AUTORIZADOS
</h4>
<!--MODULOS AUTORIZADOS ADMINISTRATIVOS -->
<div class="form-group">
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS -->
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -70px;"
		title="Módulos Administrativos">
		<img src="{{ asset('images/flaticon-png/small/modulo_administrativo.jpg') }}" width="50" alt=""><b>&nbsp&nbspAdministrativos:</b>
	</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_capap22', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_capap22',
					'name'=>'m_capap22',
					'required'=>'required',
					'placeholder'=>'ADMINISTRATIVOS',
					'title'=>"Lista de selección Autorizado [ SI - NO ]"
				])
			!!}
			<label for="m_capap22" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
			</label>
		</div>
	</div>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap222"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Aplicativos Autorizados"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarAplicativosAdministrativos(this.id)">
		</label>
	</div>
</div>

<!--APLICATIVOS ADMINISTRATIVOS AUTORIZADOS -->
<div class="form-group">
	<div class="mos_ocu_mod_adm" hidden="hidden">
		<h4 class="modal-title"
			id="myModalLabel"
			style="text-align: center; font-size:16px; color: #0E2FF5; margin-top: -5px; margin-bottom: 10px;">
			<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspAPLICATIVOS ADMINISTRATIVOS
		</h4>
		<div class="form-group">
			<!--APLICATIVO AUDITORIA -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mi auditor">
				<img src="{{ asset('images/flaticon-png/small/mi_auditor_01.png') }}" width="35" alt=""><b>&nbsp&nbspAuditoria:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap01', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap01',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap01" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--APLICATIVO CONDUCTORES -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis conductores">
				<img src="{{ asset('images/flaticon-png/small/mis_conductores_01.png') }}" width="35" alt=""><b>&nbsp&nbspConductores:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap03', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap03',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap03" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--APLICATIVO CONSULTAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis consultas">
				<img src="{{ asset('images/flaticon-png/small/mis_consultas_01.png') }}" width="35" alt=""><b>&nbsp&nbspConsultas:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap04', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap04',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap04" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--APLICATIVO FICHA TECNICA -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mi ficha técnica">
				<img src="{{ asset('images/flaticon-png/small/mi_ficha_tecnica_011.jpg') }}" width="35" alt=""><b>&nbsp&nbspFicha técnica:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap06', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap06',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap06" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--APLICATIVO INTEGRADOR CONTABLE -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mi integrador contable">
				<img src="{{ asset('images/flaticon-png/small/mi_integrador_contable_01.png') }}" width="35" alt=""><b>&nbsp&nbspIntegrador con:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap07', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap07',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap07" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--APLICATIVO PROCESOS JURIDICOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis procesos jurídicos">
				<img src="{{ asset('images/flaticon-png/small/mis_procesos_juridicos_01.png') }}" width="35" alt=""><b>&nbsp&nbspProc. Jurídicos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap08', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap08',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap08" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--APLICATIVO PROGRAMADOR -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mi programador">
				<img src="{{ asset('images/flaticon-png/small/mi_programador_01.png') }}" width="35" alt=""><b>&nbsp&nbspProgramador:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap10', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap10',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap10" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--APLICATIVO VEHICULOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis vehículos">
				<img src="{{ asset('images/flaticon-png/small/mis_vehiculos_01.png') }}" width="35" alt=""><b>&nbsp&nbspVehículos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap14', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap14',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap14" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<hr class="separador">
	</div>
</div>

<!--MODULOS AUTORIZADOS OPERATIVOS -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -70px;"
		title="Módulos Operativos">
		<img src="{{ asset('images/flaticon-png/small/modulo_operativo.jpg') }}" width="50" alt=""><b>&nbsp&nbspOperativos:</b>
	</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_capap23', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_capap23',
					'required'=>'required',
					'placeholder'=>'OPERATIVOS',
					'title'=>"Lista de selección Autorizado [ SI - NO ]"
				])
			!!}
			<label for="m_capap23" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
			</label>
		</div>
	</div>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap233"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Aplicativos Autorizados"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarAplicativosOperativos(this.id)">
		</label>
	</div>
</div>

<!--APLICATIVOS OPERATIVOS AUTORIZADOS -->
<div class="form-group">
	<!--APLICATIVOS ADMINISTRATIVOS AUTORIZADOS -->
	<div class="mos_ocu_mod_ope" hidden="hidden">
		<h4 class="modal-title"
			id="myModalLabel"
			style="text-align: center; font-size:16px; color: #0E2FF5; margin-top: -5px; margin-bottom: 10px;">
			<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspAPLICATIVOS OPERATIVOS
		</h4>
		<div class="form-group">
			<!--APLICATIVO BIBLIOTECA -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mi biblioteca de consulta">
				<img src="{{ asset('images/flaticon-png/small/mi_biblioteca_01.png') }}" width="35" alt=""><b>&nbsp&nbspBiblioteca:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap02', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap02',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap02" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--APLICATIVO RODAMIENTOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis rodamientos">
				<img src="{{ asset('images/flaticon-png/small/mis_rodamientos_01.png') }}" width="35" alt=""><b>&nbsp&nbspRodamientos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap11', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap11',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap11" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--APLICATIVO TIQUETES -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis tiquetes">
				<img src="{{ asset('images/flaticon-png/small/mis_tiquetes_99.png') }}" width="40" alt=""><b>&nbsp&nbspTiquetes:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap12', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap12',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap12" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<hr class="separador">
	</div>
</div>

<!--MODULOS AUTORIZADOS SOPORTE -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -70px;"
		title="Mi soporte">
		<img src="{{ asset('images/flaticon-png/small/modulo_soporte.png') }}" width="50" alt=""><b>&nbsp&nbspSoporte:</b>
	</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_capap24', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_capap24',
					'required'=>'required',
					'placeholder'=>'SOPORTE',
					'title'=>"Lista de selección Autorizado [ SI - NO ]"
				])
			!!}
			<label for="m_capap24" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
			</label>
		</div>
	</div>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap244"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Aplicativos Autorizados"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarAplicativosSoporte(this.id)">
		</label>
	</div>
</div>

<!--APLICATIVOS SOPORTE AUTORIZADOS -->
<div class="form-group">
	<!--APLICATIVOS SOPORTE AUTORIZADOS -->
	<div class="mos_ocu_mod_sop" hidden="hidden">
		<h4 class="modal-title"
			id="myModalLabel"
			style="text-align: center; font-size:16px; color: #0E2FF5; margin-top: -5px; margin-bottom: 10px;">
			<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspAPLICATIVOS SOPORTE
		</h4>
		<div class="form-group">
			<!--APLICATIVO CHAT -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mi chat">
				<img src="{{ asset('images/flaticon-png/small/mi_chat_02.png') }}" width="35" alt=""><b>&nbsp&nbspChat:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap15', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap15',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap15" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--APLICATIVO PROCEDIMIENTOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis procedimientos">
				<img src="{{ asset('images/flaticon-png/small/mis_procedimientos_01.png') }}" width="35" alt=""><b>&nbsp&nbspProcedimientos:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap16', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap16',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap16" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--APLICATIVO ACERCA DE -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Acera de Mis tiquetes">
				<img src="{{ asset('images/flaticon-png/small/acerca_de_01.png') }}" width="35" alt=""><b>&nbsp&nbspAcerca de:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap17', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap17',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap17" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<hr class="separador">
	</div>
</div>

<!--MODULOS AUTORIZADOS NOSOTROS -->
<div class="form-group">
	<label class="col-sm-4 control-label"
		id="administrativos"
		style="font-size:16px; color: black; margin-top: -10px; margin-left: -70px;"
		title="Módulos Nosotros">
		<img src="{{ asset('images/flaticon-png/small/modulo_nosotros.png') }}" width="50" alt=""><b>&nbsp&nbspNosotros:</b>
	</label>
	<div class="col-sm-4">
		<div class="icon-addon addon-md">
			{!! Form::select('m_capap25', ['SI'=>'SI','NO'=>'NO'], null, [
					'class'=>'form-control',
					'id'=>'m_capap25',
					'required'=>'required',
					'placeholder'=>'NOSOTROS',
					'title'=>"Lista de selección Autorizado [ SI - NO ]"
				])
			!!}
			<label for="m_capap25" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
			</label>
		</div>
	</div>
	<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR - OCULTAR -->
	<div class="col-sm-1">
		<!--MODULOS AUTORIZADOS ADMINISTRATIVOS MOSTRAR #1880C5 -->
		<label id="m_capap255"
				class="fa fa-eye"
				rel="tooltip"
				title="Mostrar Aplicativos Autorizados"
				style="cursor: pointer; font-size: 24px; color: #1880C5; margin-left: -20px; margin-top: 10px;"
				onclick="mostarOcultarAplicativosNosotros(this.id)">
		</label>
	</div>
</div>

<!--APLICATIVOS NOSOTROS AUTORIZADOS -->
<div class="form-group">
	<!--APLICATIVOS NOSOTROS AUTORIZADOS -->
	<div class="mos_ocu_mod_nos" hidden="hidden">
		<h4 class="modal-title"
			id="myModalLabel"
			style="text-align: center; font-size:16px; color: #0E2FF5; margin-top: -5px; margin-bottom: 10px;">
			<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspAPLICATIVOS NOSOTROS
		</h4>
		<div class="form-group">
			<!--APLICATIVO EMPRESA -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Nuestra empresa">
				<img src="{{ asset('images/flaticon-png/small/nuestra_empresa_01.png') }}" width="35" alt=""><b>&nbsp&nbspEmpresa:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap18', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap18',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap18" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--APLICATIVO NOSOTROS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Nosotros">
				<img src="{{ asset('images/flaticon-png/small/nosotros_01.png') }}" width="35" alt=""><b>&nbsp&nbspNosotros:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap19', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap19',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap19" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<!--APLICATIVO DEBERES Y DERECHOS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis deberes, Mis derechos">
				<img src="{{ asset('images/flaticon-png/small/mis_deberes_mis_derechos_02.png') }}" width="35" alt=""><b>&nbsp&nbspDebe. y Dere.:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap20', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap20',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap20" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
			<!--NOTICIAS -->
			<label class="col-sm-3 control-label"
				id="administrativos"
				style="font-size:16px; color: black; margin-top: -10px;"
				title="Mis Noticias">
				<img src="{{ asset('images/flaticon-png/small/mis_noticias_04.png') }}" width="35" alt=""><b>&nbsp&nbspNoticias:</b>
			</label>
			<div class="col-sm-2">
				<div class="icon-addon addon-md">
					{!! Form::select('m_capap21', ['SI'=>'SI','NO'=>'NO'], null, [
							'class'=>'form-control',
							'id'=>'m_capap21',
							'required'=>'required',
							'placeholder'=>'SI - NO',
							'title'=>"Lista de selección Autorizado [ SI - NO ]"
						])
					!!}
					<label for="m_capap21" class="glyphicon glyphicon-search" rel="tooltip" title="Seleccionar Autorización">
					</label>
				</div>
			</div>
		</div>
		<hr class="separador">
	</div>
</div>

<script>
	//	FUNCIONES
	//	FUNCION MAYUSCULAS - ELIMINAR DOBLE ESPACIO
	function myFunction(id)
	{
		//	MODAL CREAR
	    var x = $("#modalcrear #"+id+"").val();
	    var y = x.toUpperCase();
	    
	    var res = y.replace(/\s{2,}/g, ' ');
	    $("#modalcrear #"+id+"").val(res);

	    //	MODAL EDITAR
	    var x = $("#modaleditar #"+id+"").val();
	    var y = x.toUpperCase();

	    var res = y.replace(/\s{2,}/g, ' ');
	    $("#modaleditar #"+id+"").val(res);
	}
</script>

<script>
	//	FUNCION ASIGNAR FECHA HOY
	function asignar_fecha_hoy (id) {
		var hoy_fecha = new Date();
		var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
		// ASIGNA FECHA HOY
		// CREAR
		$("#modalcrear #"+id+"").val(getFormattedDate(hoy_fecha));
		// EDITAR
		$("#modaleditar #"+id+"").val(getFormattedDate(hoy_fecha));
		// ENFOCA
		$("#modalcrear #"+id+"").focus();
		$("#modaleditar #"+id+"").focus();
	}
</script>

<script>
	//	FUNCION ASIGNAR FECHA MINIMA
	function asignar_fecha_minima (id) {
		var ant_anios = new Date(new Date().getTime() - 8760 * 60 * 60 * 1000);
		// ASIGNA FECHA MINIMA - 1 AÑO ATRAS
		// CREAR
		$("#modalcrear #"+id+"").val(getFormattedDate(ant_anios));
		// EDITAR
		$("#modaleditar #"+id+"").val(getFormattedDate(ant_anios));
		// ENFOCA
		$("#modalcrear #"+id+"").focus();
		$("#modaleditar #"+id+"").focus();
	}
</script>

<script>
	//	FUNCION BORRAR FECHA
	function borrar_fecha (id) {
		//var hoy_fecha = new Date();
		// ASIGNA FECHA HOY
		// CREAR
		$("#modalcrear #"+id+"").val("");
		// EDITAR
		$("#modaleditar #"+id+"").val("");
		// ENFOCA
		$("#modalcrear #"+id+"").focus();
		$("#modaleditar #"+id+"").focus();
	}
</script>

<script>
	//	FUNCION OCULTAR APLICATIVOS ADMINISTRATIVOS
	function mostarOcultarAplicativosAdministrativos()
	{
		//alert('entra a mostrar')
		//MODAL EDITAR
		if($('.mos_ocu_mod_adm').css('display') == 'none'){
			$(".mos_ocu_mod_adm").show();
			//	CREAR
			$("#modalcrear #m_capap222").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap222").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap222").attr({"title": "Ocultar Aplicativos Autorizados"});
			//	EDITAR
			$("#modaleditar #m_capap222").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap222").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap222").attr({"title": "Ocultar Aplicativos Autorizados"});
		} else {
			//	CREAR
			$("#modalcrear #m_capap222").css({"color": "#1880C5"});
			$("#modalcrear #m_capap222").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap222").attr({"title": "Mostrar Aplicativos Autorizados"});
			//	EDITAR
			$(".mos_ocu_mod_adm").hide();
			$("#modaleditar #m_capap222").css({"color": "#1880C5"});
			$("#modaleditar #m_capap222").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap222").attr({"title": "Mostrar Aplicativos Autorizados"});
		}
	}
</script>

<script>
	//	FUNCION OCULTAR APLICATIVOS OPERAIVOS 
	function mostarOcultarAplicativosOperativos()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_mod_ope').css('display') == 'none'){
			//	CREAR
			$("#modalcrear #m_capap233").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap233").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap233").attr({"title": "Ocultar Aplicativos Autorizados"});
			//	EDITAR
			$(".mos_ocu_mod_ope").show();
			$("#modaleditar #m_capap233").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap233").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap233").attr({"title": "Ocultar Aplicativos Autorizados"});
		} else {
			//	CREAR
			$("#modalcrear #m_capap233").css({"color": "#1880C5"});
			$("#modalcrear #m_capap233").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap233").attr({"title": "Mostrar Aplicativos Autorizados"});
			//	EDITAR
			$(".mos_ocu_mod_ope").hide();
			$("#modaleditar #m_capap233").css({"color": "#1880C5"});
			$("#modaleditar #m_capap233").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap233").attr({"title": "Mostrar Aplicativos Autorizados"});
		}		
	}
</script>

<script>
	//	FUNCION OCULTAR APLICATIVOS SOPORTE
	function mostarOcultarAplicativosSoporte()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_mod_sop').css('display') == 'none'){
			//	CREAR
			$("#modalcrear #m_capap244").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap244").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap244").attr({"title": "Ocultar Aplicativos Autorizados"});
			//	EDITAR
			$(".mos_ocu_mod_sop").show();
			$("#modaleditar #m_capap244").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap244").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap244").attr({"title": "Ocultar Aplicativos Autorizados"});
		} else {
			//	CREAR
			$("#modalcrear #m_capap244").css({"color": "#1880C5"});
			$("#modalcrear #m_capap244").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap244").attr({"title": "Mostrar Aplicativos Autorizados"});
			//	EDITAR
			$(".mos_ocu_mod_sop").hide();
			$("#modaleditar #m_capap244").css({"color": "#1880C5"});
			$("#modaleditar #m_capap244").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap244").attr({"title": "Mostrar Aplicativos Autorizados"});
		}		
	}
</script>

<script>
	//	FUNCION OCULTAR APLICATIVOS NOSOTROS
	function mostarOcultarAplicativosNosotros()
	{
		//alert('entra a mostrar')
		if($('.mos_ocu_mod_nos').css('display') == 'none'){
			$(".mos_ocu_mod_nos").show();
			//	CREAR
			$("#modalcrear #m_capap255").css({"color": "#F0AD4E"});
			$("#modalcrear #m_capap255").attr({"class": "fa fa-eye-slash"});
			$("#modalcrear #m_capap255").attr({"title": "Ocultar Aplicativos Autorizados"});
			//	EDITAR
			$("#modaleditar #m_capap255").css({"color": "#F0AD4E"});
			$("#modaleditar #m_capap255").attr({"class": "fa fa-eye-slash"});
			$("#modaleditar #m_capap255").attr({"title": "Ocultar Aplicativos Autorizados"});
		} else {
			//	CREAR
			$(".mos_ocu_mod_nos").hide();
			$("#modalcrear #m_capap255").css({"color": "#1880C5"});
			$("#modalcrear #m_capap255").attr({"class": "fa fa-eye"});
			$("#modalcrear #m_capap255").attr({"title": "Mostrar Aplicativos Autorizados"});
			//	EDITAR
			$(".mos_ocu_mod_nos").hide();
			$("#modaleditar #m_capap255").css({"color": "#1880C5"});
			$("#modaleditar #m_capap255").attr({"class": "fa fa-eye"});
			$("#modaleditar #m_capap255").attr({"title": "Mostrar Aplicativos Autorizados"});
		}		
	}
</script>
