<!-- 
//Derechos:         Copyright (c) 2018 Mis tiquetes
//Ubicación:        Bogotá (Col.)
//Fecha creación:   01-01-2018 - 07:00:00 a.m.
//Nombre:           form.blade.php
//Descripción:      Crear - Editar: Página principal: Vehiculos
//					Acordeon Vehiculos
//Actualizaciones
//Número de orden:  0000-0001
//Ubicación:        Bogotá (Col.)
//Fecha:            DD-MM-AAAA - HH:MM:SS a.m.
//Descripción:       
 
-->



<h4 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="fa fa-bus"></span>
&nbsp&nbspPROPIETARIO PRINCIPAL
</h4>


<h4 class="modal-title" id="myModalLabel" style="text-align: center;"><span class="fa fa-plus"></span>
&nbsp<span class="fa fa-bus"></span>
&nbsp&nbspOTROS PROPIETARIOS
</h4>

<script>
	//	CARGOS - DIVISIONES
	function datosCargo(id)
	{
		//	MODAL CREAR
		var x = $("#modalcrear #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-cargo')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
	            console.log(data);
	            $('#modalcrear #m_nucodiv').val(data[1]);
	        }               
	    })

	    //	MODAL EDITAR 
	    var x = $("#modaleditar #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-cargo')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
	            console.log(data);
	            $('#modaleditar #m_nucodiv').val(data[1]);
	        }               
	    })
	}

	//	CARGOS - DIVISIONES
	function datosVehiculo(id)
	{

		//	MODAL CREAR
		var x = $("#modalcrear #"+id+"").val();
		if (x!="") {
			$.ajax({
		        url: "{{route('datos-vehiculo')}}",
		        data:{id: x },
		        type: "get",
		        success:function(data){
		            $('#modalcrear #m_canuint').val(data[1][0].m_canuint);

		        }               
		    })
		    return
		}
		
	    //	MODAL EDITAR 
	    var x = $("#modaleditar #"+id+"").val();
		//alert(x);
		$.ajax({
	        url: "{{route('datos-vehiculo')}}",
	        data:{id: x },
	        type: "get",
	        success:function(data){
                $('#modaleditar #m_canuint').val(data[1][0].m_canuint);
	        }               
	    })
	}


</script>

<script>

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

//	borrar_fecha 
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