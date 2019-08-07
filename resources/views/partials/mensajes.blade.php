<!-- 

//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           mensajes.blade.php
//Descripción:      Mensajes global
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:      
 
-->

<!-- INICIO MENSAJES GLOBAL -->
@if(\Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	   {{\Session::get('mensaje')}}
	</div>
@endif
<!-- FIN MENSAJES GLOBAL -->

<!-- INICIO MENSAJES REGISTROS -->
<!-- RESULTADO CORRECTO -->
@if(\Session::has('tit_men_res_cor'))
	<script>
		swal({
			type: 'success',
			title: ('{{\Session::get('tit_men_res_cor')}}'),
			html: ('<b>{{\Session::get('tx1_men_res_cor')}}</b> <!-- INICIO VALIDACION TEXTOS --> <!-- INICIO TEXTO2 --> @if(\Session::get('tx2_men_res_cor')!="") <br> {{\Session::get('tx2_men_res_cor')}} @else @endif  <!-- FIN TEXTO2 --> <!-- INICIO TEXTO3 --> @if(\Session::get('tx3_men_res_cor')!="") <br> {{\Session::get('tx3_men_res_cor')}} @else @endif  <!-- FIN TEXTO3 --> <!-- INICIO TEXTO4 --> @if(\Session::get('tx4_men_res_cor')!="") <br> {{\Session::get('tx4_men_res_cor')}} @else @endif  <!-- FIN TEXTO4 --> <!-- INICIO TEXTO5 --> @if(\Session::get('tx5_men_res_cor')!="") <br> {{\Session::get('tx5_men_res_cor')}} @else @endif  <!-- FIN TEXTO5 --> <!-- FIN VALIDACION TEXTOS --> <br><br> {{\Session::get('fo1_men_res_cor')}} <br> <!-- INICIO VALIDACION PIES --> <!-- INICIO PIE2 --> @if(\Session::get('fo2_men_res_cor')!="") <br> {{\Session::get('fo2_men_res_cor')}} @else @endif  <!-- FIN PIE2 --> <!-- INICIO PIE3 --> @if(\Session::get('fo3_men_res_cor')!="") <br> {{\Session::get('fo3_men_res_cor')}} @else @endif  <!-- FIN PIE3 --> <!-- INICIO PIE4 --> @if(\Session::get('fo4_men_res_cor')!="") <br> {{\Session::get('fo4_men_res_cor')}} @else @endif  <!-- FIN PIE4 --> <!-- INICIO PIE5 --> @if(\Session::get('fo5_men_res_cor')!="") <br> {{\Session::get('fo5_men_res_cor')}} @else @endif  <!-- FIN PIE5 --> <!-- FIN VALIDACION PIES --> <br><br> <a onclick="swal.close();" class="btn btn-success btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
			confirmButtonText: 'Listo',
			confirmButtonColor: '#5CB85C',
			showConfirmButton: false
		})
  	</script>
@endif

<!-- RESULTADO ERROR -->
@if(\Session::has('tit_men_res_err'))
	<script>
		swal({
			type: 'error',
			title: ('{{\Session::get('tit_men_res_err')}}'),
			html: ('<b>{{\Session::get('tx1_men_res_err')}}</b> <!-- INICIO VALIDACION TEXTOS --> <!-- INICIO TEXTO2 --> @if(\Session::get('tx2_men_res_err')!="") <br> {{\Session::get('tx2_men_res_err')}} @else @endif <!-- FIN TEXTO2 --> <!-- INICIO TEXTO3 --> @if(\Session::get('tx3_men_res_err')!="") <br> {{\Session::get('tx3_men_res_err')}} @else @endif <!-- FIN TEXTO3 --> <!-- INICIO TEXTO4 --> @if(\Session::get('tx4_men_res_err')!="") <br> {{\Session::get('tx4_men_res_err')}} @else @endif <!-- FIN TEXTO4 --> <!-- INICIO TEXTO5 --> @if(\Session::get('tx5_men_res_err')!="") <br> {{\Session::get('tx5_men_res_err')}} @else @endif <!-- FIN TEXTO5 --> <!-- FIN VALIDACION TEXTOS --> <br><br> {{\Session::get('fo1_men_res_err')}} <br> <!-- INICIO VALIDACION PIES --> <!-- INICIO PIE2 --> @if(\Session::get('fo2_men_res_err')!="") <br> {{\Session::get('fo2_men_res_err')}} @else @endif <!-- FIN PIE2 --> <!-- INICIO PIE3 --> @if(\Session::get('fo3_men_res_err')!="") <br> {{\Session::get('fo3_men_res_err')}} @else @endif <!-- FIN PIE3 --> <!-- INICIO PIE4 --> @if(\Session::get('fo4_men_res_err')!="") <br> {{\Session::get('fo4_men_res_err')}} @else @endif <!-- FIN PIE4 --> <!-- INICIO PIE5 --> @if(\Session::get('fo5_men_res_err')!="") <br> {{\Session::get('fo5_men_res_err')}} @else @endif <!-- FIN PIE5 --> <!-- FIN VALIDACION PIES --> <br><br> <a onclick="swal.close();" class="btn btn-Warning btn-lg" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspListo</a>'),
			confirmButtonText: 'Listo',
			confirmButtonColor: '#ff1a1a',
			showConfirmButton: false
		})
  	</script>
@endif
<!-- FIN MENSAJES REGISTROS -->
