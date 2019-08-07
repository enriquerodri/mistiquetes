<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           index.blade.php
//Descripción:      Página principal: Contraseñas
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->
<style>
	.field-icon {
		float: right;
		margin-left: -25px;
		margin-top: -25px;
		position: relative;
		z-index: 2;
	}
</style>



@extends('template')
@section('title','Contraseñas')
@include('sweet::alert')
@include('partials.mensajes')

@section('content')

<!-- MENU OPERATIVOS: TIQUETES --> 
@include('partials.menu-programador')

	<div class="container text-center">
		<!-- OPERATIVOS - TIQUETES --> 
		<hr class="separador">
    		<h3>ACTUALIZAR CONTRASEÑA</h3>
    	<hr class="separador">

	    <!-- INICIO FORMULARIO DE BOTONES -->
		<div class="row text-center">
			<div class="col-md-5">
				<!-- BOTON REGRESAR -->
		        <a href="{{ route('admin-programador') }}" class="btn btn-primary boton btn-lg" data-toggle="tooltip" title="Regresar...">
		        	<span class="fa fa-mail-reply" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
		        	<font face="verdana" color="White" style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspPROGRAMADOR</font>
		        	</span>
		        </a>&nbsp&nbsp
		    </div>

			<div class="col-md-12">
				<!-- FORM DATOS USUARIO -->
				<h4 class="modal-title"
					id="myModalLabel"
					style="text-align: center; font-size:16px; color: #0E2FF5; margin-top: 10px;margin-bottom: 10px;">
					<span class="fa fa-file-archive-o"></span>&nbsp&nbspINFORMACION GENERAL
				</h4>
				<form method="POST"  id="target" role="form">
					{{ csrf_field() }}
					<!-- IDENTIFICADOR -->
	 				<div class="form-group" hidden="hidden">
				    	<label for="id">Id</label>
				    	<input id="id"
				    		name="id"
				    		type="text"
				    		class="form-control"
				    		placeholder="Cedula"
				    		value="{{ Auth::user()->id }}" readonly="true">
				  	</div>
				  	<!-- NUIP -->
				 	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="text-align: right;">Nuip:
				 		</label>
				 		<div class="col-sm-6">
					    	<input id="m_canuipe"
					    			name="m_canuipe"
					    			type="text"
					    			class="form-control"
					    			style="background-color:#fcfdff; color:#000105"
					    			title="Número único de identificación personal"
					    			placeholder="Nuip"
					    			value="{{ Auth::user()->m_canuipe }}"
					    			readonly="true">
				    	</div>
				  	</div>
				  	<!-- NOMBRE Y APELLIDOS -->
				  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="text-align: right;">Nombre:
				 		</label>
				  		<div class="col-sm-6">
					    	<input id="name"
					    			name="name"
					    			type="text"
					    			class="form-control"
					    			style="background-color:#fcfdff; color:#000105"
					    			title="Nombre y apellidos"
					    			placeholder="Nombre y apellidos"
					    			value="{{ Auth::user()->name }}"
					    			readonly="true">
				    	</div>
				  	</div>
				  	<!-- CONTRASEÑA ACTUAL -->
				  	<!-- toggle="#password" -->
		  		  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 		style="text-align: right;">Contraseña Actual:
				 		</label>
		  		  		<div class="col-sm-4">
		  		  			<body oncopy="return false" onpaste="return false">
					    		<input id="password"
					    				name="password"
					    				type="password"
					    				class="form-control"
					    				title="Contraseña actual"
					    				placeholder="Contraseña actual">
					    		<span toggle=""
					    				class="fa fa-fw fa-eye field-icon toggle-password"
					    				title="Mostrar contraseña actual"
					    				style="cursor: pointer; font-size: 22PX; margin-top: -35px; margin-right: 20px; color:#337AB7;">
					    		</span>
				    		</body>
				    	</div>
				  	</div>
				  	<!-- TECLADO MAYUSCULAS ACTIVADO - CONTRASEÑA ACTUAL -->
		  		  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="text-align: right;">
				 		</label>
				 		<label class="col-sm-4 control-label"
				 				id="passwordTecladoMayusculas"
				 				style="margin-top: -10px; font-size:14px; text-align: center; border-radius: 5px;">
				 		</label>
				  	</div>
				  	<!-- NUEVA CONTRASEÑA -->
				  	<!-- toggle="#passwordNew" -->
		  		  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="margin-top: -20px; text-align: right;">Nueva Contraseña:
				 		</label>
				 		<div class="col-sm-4">
				 			<body oncopy="return false" onpaste="return false">
					    		<input id="passwordNew"
					    				name="passwordNew"
					    				type="password"
					    				class="form-control"
					    				title="Nueva contraseña"
					    				style="margin-top: -20px;"
					    				placeholder="Nueva contraseña"
					    				onkeyup="nivelContraeniaNueva(this.id)">
					    		<span toggle=""
					    				class="fa fa-fw fa-eye field-icon toggle-passwordNew"
					    				title="Mostrar nueva contraseña"
					    				style="cursor: pointer; font-size: 22PX; margin-top: -35px; margin-right: 20px; color:#337AB7;">
					    		</span>
				    		</body>
				    	</div>
				 		<!-- NIVEL NUEVA CONTRASEÑA -->
				 		<div class="col-sm-4" style="margin-top: -13px;">
					 		<label class="col-sm-4 control-label"
					 				id="passwordNewSecutity"
					 				title="Nivel de seguridad" 
					 				style="margin-top: 0px; text-align: center; border-radius: 5px;">
					 				<b></b>
							</label>
						</div>
				  	</div>
				  	<!-- TECLADO MAYUSCULAS ACTIVADO -  NUEVA CONTRASEÑA -->
		  		  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="text-align: right;">
				 		</label>
				 		<label class="col-sm-4 control-label"
				 				id="passwordNewTecladoMayusculas"
				 				style="margin-top: -10px; font-size:14px; text-align: center; border-radius: 5px;">
				 		</label>
				  	</div>
				  	<!-- CONFIRMAR NUEVA CONTRASEÑA -->
				  	<!-- toggle="#confirmpassword" -->
				  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="margin-top: -20px; text-align: right;">Confirmar Contraseña:
				 		</label>
				 		<div class="col-sm-4">
				 			<body oncopy="return false" onpaste="return false">
					    		<input id="confirmpassword"
					    				name="confirmpassword"
					    				type="password"
					    				class="form-control"
					    				title="Confirmar contraseña"
					    				style="margin-top: -20px;"
					    				placeholder="Confirmar contraseña">
					    		<span toggle=""
					    				class="fa fa-fw fa-eye field-icon toggle-confirmpassword"
					    				title="Mostrar confirmación nueva contraseña"
					    				style="cursor: pointer; font-size: 22PX; margin-top: -35px; margin-right: 20px; color:#337AB7;">
					    		</span>
				    		</body>
				    	</div>
				  	</div>
				  	<!-- TECLADO MAYUSCULAS ACTIVADO -  CONFIRMAR NUEVA CONTRASEÑA -->
		  		  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="text-align: right;">
				 		</label>
				 		<label class="col-sm-4 control-label"
				 				id="confirmpasswordTecladoMayusculas"
				 				style="margin-top: -10px; font-size:14px; text-align: center; border-radius: 5px;">
				 		</label>
				  	</div>
				  	<!-- ULTIMA ACTUALIZACION CONTRASEÑA OCULTA hidden="hidden" -->

				  	<div class="row form-group">
				 		<label class="col-sm-4 control-label"
				 				style="text-align: right; margin-top: -20px;">Última actualización:
				 		</label>

				 		<div class="col-sm-6">
				    		<input id="m_feactco"
				    				name="m_feactco"
				    				type="text"
				    				class="form-control"
					    			style="background-color:#fcfdff; color:#000105 ; margin-top: -20px;"
					    			title="Última actualización [ DD-MM-AAAA - Hora ]"
				    				placeholder="Última actualización"
				    				value="{{ Auth::user()->m_feactco }}"
				    				readonly="true">
				    	</div>
				  	</div>
				  	<!-- BOTON ACTUALIZAR CONTRASEÑA -->
				  	<button type="submit"
				  			class="btn btn-primary"
				  			id="botonActualizar"
				  			disabled="true">
				        	<span class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;">
				        	<font face="verdana" color="White" style="font: arial; font-size:14px;text-shadow:2px 2px 4px #000000;">&nbsp&nbspActualizar</font>
				        	</span>
				  	</button>
				</form>
			</div>

		</div>
   	</div>

<!-- VALIDACION CONTRASEÑAS -->
<script>

	$( "#target" ).submit(function( event ) {
	  	//alert( $('#name').val() );

		//metodo ajax donde valide la contraseña
		//si no es no valide mas mas mensaje
		//valide las dos nuevas que sean iguales
		//grabe
		
		var nombre_usuario= $('#name').val();
		var nuipes_usuario= $('#m_canuipe').val();
		var password= $('#password').val();
		var passwordNew= $('#passwordNew').val();
		var confirmpassword= $('#confirmpassword').val();	

		if (password == "" || passwordNew == "" || confirmpassword == "" ) {
			event.preventDefault();
			//mensajito
			//debugger;

			//	CONTRASEÑA ACTUAL
			if (password == "") {
				//alert('Contraseña actual está vacía')
			    swal({
			        title: ('Contraseña'),
			        html: ('<b>' + nombre_usuario + '<br><br>' + nuipes_usuario + ' <br><br>La contraseña actual está vacía</b><br><br> <a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
			        type: 'error',
			        showCancelButton: false,
			        showConfirmButton: false
			    }).then((result) => {
			        if (result.value) {
			            swal(
			                'Deleted!',
			                'Your file has been deleted.',
			                'success'
			            )
			        }
			    })
			    //	ENFOCA OBJETO
			    $("#password").focus();
				return;
			}
			//	CONTRASEÑA NUEVA
			if (passwordNew == "") {
				//alert('Contraseña nueva está vacía')
			    swal({
			        title: ('Contraseña'),
			        html: ('<b>' + nombre_usuario + '<br><br>' + nuipes_usuario + ' <br><br>La contraseña nueva está vacía</b><br><br> <a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
			        type: 'error',
			        showCancelButton: false,
			        showConfirmButton: false
			    }).then((result) => {
			        if (result.value) {
			            swal(
			                'Deleted!',
			                'Your file has been deleted.',
			                'success'
			            )
			        }
			    })
				return;
			}
			//	CONFIRMAR CONTRASEÑA NUEVA
			if (confirmpassword == "") {
				//alert('Confirmar contraseña nueva está vacía')
			    swal({
			        title: ('Contraseña'),
			        html: ('<b>' + nombre_usuario + '<br><br>' + nuipes_usuario + ' <br><br>La confirmación de la contraseña nueva está vacía</b><br><br> <a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
			        type: 'error',
			        showCancelButton: false,
			        showConfirmButton: false
			    }).then((result) => {
			        if (result.value) {
			            swal(
			                'Deleted!',
			                'Your file has been deleted.',
			                'success'
			            )
			        }
			    })
				return;
			}
			//return;
		}

		if ( passwordNew == confirmpassword) {

			event.preventDefault();  
			var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
			var data={
					id: $('#id').val(),	
					password: password,	
					passwordNew: passwordNew,	
					_token:token
				}; 

			var host = "/ticket/public"

			$.ajax({
			    url: host + '/validarcontrasenia',
			    type: 'POST',
			    data: data,
			    dataType: 'JSON',
			    success: function (data) {
			    	debugger;   	
			    	if (data[0]) {
			    		//alert('correcto');
			    		//alert(data[1]);
						//debugger;
					    swal({
					        title: ('Contraseña'),
					        html: ('<b>' + nombre_usuario + '<br><br>' + nuipes_usuario + ' <br><br>Actualizada Satisfactoriamente</b><br><br> <a onclick="swal.close();" class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
					        type: 'success',
					        showCancelButton: false,
					        showConfirmButton: false
					    }).then((result) => {
					        if (result.value) {
					            swal(
					                'Deleted!',
					                'Your file has been deleted.',
					                'success'
					            )
					        }
					    })
			    	}else{
			    		//alert('error');
		    			//debugger;
					    swal({
					        title: ('Contraseña'),
					        html: ('<b>' + nombre_usuario + '<br><br>' + nuipes_usuario + ' <br><br>La contraseña actual no es válida</b><br><br> <a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
					        type: 'error',
					        showCancelButton: false,
					        showConfirmButton: false
					    }).then((result) => {
					        if (result.value) {
					            swal(
					                'Deleted!',
					                'Your file has been deleted.',
					                'success'
					            )
					        }
					    })
					    //	ENFOCA OBJETO
					    $("#password").focus();
			    	}			    
			    },
			    error: function(XMLHttpRequest, textStatus, errorThrown) { 
			    	event.preventDefault();
	        		//alert("Status: " + textStatus); alert("Error: " + errorThrown); 
	    		}     
			});
		}else{
			swal({
		        title: ('Contraseña'),
		        html: ('<b>' + nombre_usuario + '<br><br>' + nuipes_usuario + ' <br><br>La nueva contraseña y la confirmaión no coinciden</b><br><br> <a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
		        type: 'error',
		        showCancelButton: false,
		        showConfirmButton: false
		    }).then((result) => {
		        if (result.value) {
		            swal(
		                'Deleted!',
		                'Your file has been deleted.',
		                'success'
		            )
		        }
		    })
			event.preventDefault();
			debugger;  
			//mensajito
			return;		
		}
	});

</script>

<!-- NIVEL CONTRASEÑA -->
<script>
	
	function nivelContraeniaNueva(id)

	{
		//alert('entro')
		
		//	CADENA DE BUSQUEDA
		var cadena = (passwordNew.value)
		//	1- CANTIDAD - PATRON DE BUSQUEDA MAYUSCULAS
		var cantidadMayusculas = 0;
		var buscaMayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		//	BUCLE MAYUSCULAS DETECTADAS
		for (var i = 0; i < buscaMayusculas.length; i++) {
			for (var x = 0; x < cadena.length; x++) {
				if(cadena[x]==buscaMayusculas[i]){
				cantidadMayusculas+=1;
				}
			}
		 }
		//	2- CANTIDAD - PATRON DE BUSQUEDA MINUSCULAS
		var cantidadMinusculas = 0;
		var buscaMinusculas = "abcdefghijklmnopqrstuvwxyz";
		//	BUCLE MINUSCULAS DETECTADAS
		for (var i = 0; i < buscaMinusculas.length; i++) {
			for (var x = 0; x < cadena.length; x++) {
				if(cadena[x]==buscaMinusculas[i]){
				cantidadMinusculas+=1;
				}
			}
		 }
		//	3- CANTIDAD - PATRON DE BUSQUEDA NUMEROS
		var cantidadNumeros = 0;
		var buscaNumeros = "0123456789";
		//	BUCLE NUMEROS DETECTADOS
		for (var i = 0; i < buscaNumeros.length; i++) {
			for (var x = 0; x < cadena.length; x++) {
				if(cadena[x]==buscaNumeros[i]){
				cantidadNumeros+=1;
				}
			}
		 }
		//	4- CANTIDAD - PATRON DE BUSQUEDA SPACIOS
		var cantidadEspacios = 0;
		var buscaEspacios = " ";
		//	BUCLE SPACIOS DETECTADOS
		for (var i = 0; i < buscaEspacios.length; i++) {
			for (var x = 0; x < cadena.length; x++) {
				if(cadena[x]==buscaEspacios[i]){
				cantidadEspacios+=1;
				}
			}
		 }
		//	5- CANTIDAD - PATRON DE BUSQUEDA SIMBOLOS
		var cantidadSimbolos = 0;
		var buscaSimbolos = ",;.:!@#$%/^&()=?*_-~";
		//	BUCLE SPACIOS DETECTADOS
		for (var i = 0; i < buscaSimbolos.length; i++) {
			for (var x = 0; x < cadena.length; x++) {
				if(cadena[x]==buscaSimbolos[i]){
				cantidadSimbolos+=1;
				}
			}
		 }
		
		//alert('Mayusculas: '+ cantidadMayusculas + ' - Minusculas: ' + cantidadMinusculas + ' - Numeros: ' + cantidadNumeros + ' - Espacios: ' + cantidadEspacios + ' - Simbolos: ' + cantidadSimbolos);

		//	VARIABLES RESULTADOS
		var puntaje = 0;
		var puntaje_patrones = 0;
		var tamanio = 0;
		var resulta = 0;
		//	VALORES OBTENIDOS
		//	MAYUSCULAS
		if (cantidadMayusculas==0) {
			cantidadMayusculas=0;
		} else {
			if (cantidadMayusculas==1) {
				cantidadMayusculas=1;
			} else {
				cantidadMayusculas=2;
			}
		}
		//	MINUSCULAS
		if (cantidadMinusculas==0) {
			cantidadMinusculas=0;
		} else {
			if (cantidadMinusculas==1) {
				cantidadMinusculas=1;
			} else {
				cantidadMinusculas=2;
			}
		}
		//	NUMEROS
		if (cantidadNumeros==0) {
			cantidadNumeros=0;
		} else {
			if (cantidadNumeros==1) {
				cantidadNumeros=1;
			} else {
				cantidadNumeros=2;
			}
		}
		//	ESPACIOS
		if (cantidadEspacios==0) {
			cantidadEspacios=0;
		} else {
			if (cantidadEspacios==1) {
				cantidadEspacios=1;
			} else {
				cantidadEspacios=2;
			}
		}
		//	SIMBOLOS
		if (cantidadSimbolos==0) {
			cantidadSimbolos=0;
		} else {
			if (cantidadSimbolos==1) {
				cantidadSimbolos=1;
			} else {
				cantidadSimbolos=2;
			}
		}
		//	PUNTAJE PATRONES DE BUSQUEDA
		var puntaje_patrones = cantidadMayusculas + cantidadMinusculas + cantidadNumeros + cantidadEspacios + cantidadSimbolos;
		//	VALORES TAMAÑO
		var tamanio = passwordNew.value.length;

		//	VALOR PUNTAJE
		var resulta = puntaje_patrones + tamanio;

		//alert('Tamaño: ' + tamanio + ' - Puntaje: ' + puntaje +  ' - Puntaje Patrones: ' + puntaje_patrones + ' - Resultado: ' + resulta);

		//	CHEQUEA RESULTADOS
		if (resulta == 0) {
			$('#passwordNewSecutity').attr({
				'style': 'background-color: #FFFFFF; text-align: center; color: #FCF9F9; border-radius: 10px; text-shadow:2px 2px 4px #000000; ',
				'placeholder': 'Nivel de seguridad',
			});
			$('#passwordNewSecutity').html("");
			$('#passwordNewSecutityTexto').html("");
			document.getElementById('botonActualizar').disabled = true;
		} else {
			if (resulta < 12) {
				$('#passwordNewSecutity').attr({
					'style': 'background-color:#FB0707; text-align: center; color: #FCF9F9; border-radius: 10px; text-shadow:2px 2px 4px #000000; ',
					'placeholder': 'Inseguro'
				});
				$('#passwordNewSecutity').html("Inseguro");
				$('#passwordNewSecutityTexto').html("Nivel de seguridad");
				document.getElementById('botonActualizar').disabled = true;
			} else {
				if (resulta < 16) {
					$('#passwordNewSecutity').attr({
						'style': 'background-color:#FAC306; text-align: center; color: #FCF9F9; font-weight: bold; border-radius: 10px; text-shadow:2px 2px 4px #000000; ',
						'placeholder': 'Bajo'
					});
					$('#passwordNewSecutity').html("Bajo");
					$('#passwordNewSecutityTexto').html("Nivel de seguridad")
					document.getElementById('botonActualizar').disabled = true;
				} else {
					if (resulta < 20) {
						$('#passwordNewSecutity').attr({
							'style': 'background-color:#0E2FD5; text-align: center; color: #FCF9F9; font-weight: bold; border-radius: 10px; text-shadow:2px 2px 4px #000000; ',
							'placeholder': 'Regular'
						});
						$('#passwordNewSecutity').html("Regular");
						$('#passwordNewSecutityTexto').html("Nivel de seguridad");
						$('#botonActualizar').removeAttr("disabled");
					} else {
						if (resulta < 24) {
							$('#passwordNewSecutity').attr({
								'style': 'background-color:#08FB52; text-align: center; color: #FCF9F9; font-weight: bold; border-radius: 10px; text-shadow:2px 2px 4px #000000;',
								'placeholder': 'Bueno'
							});
							$('#passwordNewSecutity').html("Bueno");
							$('#passwordNewSecutityTexto').html("Nivel de seguridad");
							$('#botonActualizar').removeAttr("disabled");
						} else {
							$('#passwordNewSecutity').attr({
								'style': 'background-color:#05B851; text-align: center; color: #FCF9F9; font-weight: bold; border-radius: 10px; text-shadow:2px 2px 4px #000000;',
								'placeholder': 'Excelente'
							});
							$('#passwordNewSecutity').html("Excelente");
							$('#passwordNewSecutityTexto').html("Nivel de seguridad");
							$('#botonActualizar').removeAttr("disabled");
							$('#botonActualizar').removeAttr("disabled");
						}
					}
				}
			}
		}
	}

</script>

<!-- MOSTRAR / OCULTAR CONTRASEÑAS -->
<script>

	//	CONTRASEÑA ACTUAL
	$(".toggle-password").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
			$('.toggle-password').attr("title", "Ocultar ontraseña actual");
		} else {
			input.attr("type", "password");
			$('.toggle-password').attr("title", "Mostrar ontraseña actual");
		}
	});

	//	NUEVA CONTRASEÑA
	$(".toggle-passwordNew").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
			$('.toggle-passwordNew').attr("title", "Ocultar nueva contraseña");
		} else {
			input.attr("type", "password");
			$('.toggle-passwordNew').attr("title", "Mostrar nueva contraseña");
		}
	});

	//	CONFIRMAR NUEVA CONTRASEÑA
	$(".toggle-confirmpassword").click(function() {

		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
			$('.toggle-confirmpassword').attr("title", "Ocultar confirmación nueva contraseña");
		} else {
			input.attr("type", "password");
			$('.toggle-confirmpassword').attr("title", "Mostrar confirmación nueva contraseña");
		}
	});

</script>

<!-- DETECTAR TECLADO MAYUSCULAS ACTIVADO -->
<script>
	//	DETECTAR TECLADO MAYUSCULAS ACTIVADO
	//	CONTRASEÑA ACTUAL
	$('#password').keypress(function(e) { 
	    var s = String.fromCharCode( e.which );
	    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
	    	//	CONTRASEÑA ACTUAL
	    	$('#passwordTecladoMayusculas').html("( Bloq Mayus está activado )");
	    	//	NUEVA CONTRASEÑA
	    	$('#passwordNewTecladoMayusculas').html("( Bloq Mayus está activado )");
	    	//	CONFIRMAR NUEVA CONTRASEÑA
	    	$('#confirmpasswordTecladoMayusculas').html("( Bloq Mayus está activado )");
	        //alert('ACTUAL Bloq Mayus está activado.');
	    }else{
	    	//	CONTRASEÑA ACTUAL
	    	$('#passwordTecladoMayusculas').html("");
	    	//	NUEVA CONTRASEÑA
	    	$('#passwordNewTecladoMayusculas').html("");
	    	//	CONFIRMAR NUEVA CONTRASEÑA
	    	$('#confirmpasswordTecladoMayusculas').html("");
	    	//alert('ACTUAL Bloq Mayus está desactivado.');
	    }
	});
	//	NUEVA CONTRASEÑA
	$('#passwordNew').keypress(function(e) { 
	    var s = String.fromCharCode( e.which );
	    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
	    	//	CONTRASEÑA ACTUAL
	    	$('#passwordTecladoMayusculas').html("( Bloq Mayus está activado )");
	    	//	NUEVA CONTRASEÑA
	    	$('#passwordNewTecladoMayusculas').html("( Bloq Mayus está activado )");
	    	//	CONFIRMAR NUEVA CONTRASEÑA
	    	$('#confirmpasswordTecladoMayusculas').html("( Bloq Mayus está activado )");
	        //alert('NUEVA Bloq Mayus está activado.');
	    }else{
	    	//	CONTRASEÑA ACTUAL
	    	$('#passwordTecladoMayusculas').html("");
	    	//	NUEVA CONTRASEÑA
	    	$('#passwordNewTecladoMayusculas').html("");
	    	//	CONFIRMAR NUEVA CONTRASEÑA
	    	$('#confirmpasswordTecladoMayusculas').html("");
	    	//alert('NUEVA Bloq Mayus está desactivado.');
	    }
	});
	//	CONFIRMACION NUEVA CONTRASEÑA
	$('#confirmpassword').keypress(function(e) { 
	    var s = String.fromCharCode( e.which );
	    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
	    	//	CONTRASEÑA ACTUAL
	    	$('#passwordTecladoMayusculas').html("( Bloq Mayus está activado )");
	    	//	NUEVA CONTRASEÑA
	    	$('#passwordNewTecladoMayusculas').html("( Bloq Mayus está activado )");
	    	//	CONFIRMAR NUEVA CONTRASEÑA
	    	$('#confirmpasswordTecladoMayusculas').html("( Bloq Mayus está activado )");
	        //alert('CONFIRMARBloq Mayus está activado.');
	    }else{
	    	//	CONTRASEÑA ACTUAL
	    	$('#passwordTecladoMayusculas').html("");
	    	//	NUEVA CONTRASEÑA
	    	$('#passwordNewTecladoMayusculas').html("");
	    	//	CONFIRMAR NUEVA CONTRASEÑA
	    	$('#confirmpasswordTecladoMayusculas').html("");
	    	//alert('CONFIRMAR Bloq Mayus está desactivado.');
	    }
	});

</script>

@endsection
