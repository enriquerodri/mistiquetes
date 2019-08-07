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

<!-- INICIO NOTIFICACIONES REGISTROS -->
<!-- AGREGAR -->
@if(\Session::has('notificacion_agregar'))
	<script>
		swal({
			type: 'success',
			title: ('{{\Session::get('notificacion_agregar')}}'),
			confirmButtonText: 'Listo',
			confirmButtonColor: '#5CB85C'
		})
  	</script>
@endif

<!-- EDITAR -->
@if(\Session::has('notificacion_editar'))
	<script>
		swal({
			type: 'success',
			title: ('{{\Session::get('notificacion_editar')}}'),
			confirmButtonText: 'Listo',
			confirmButtonColor: '#5CB85C'
		})
  	</script>
@endif

<!-- ELIMINAR -->
@if(\Session::has('notificacion_eliminar'))
	<script>
		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				swal(
				  'Deleted!',
				  'Your file has been deleted.',
				  'success'
				)
			}
		})
  	</script>
@endif

<!-- FIN NOTIFICACIONES REGISTROS -->
