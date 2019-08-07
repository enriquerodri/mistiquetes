<a id="btncrear"
	class="btn btn-success"
	data-toggle="modal"
	data-target="#modalcrear"
	onclick="nuevo_preparar_registros()">
	<i class="fa fa-plus" style="font-size:18px;text-shadow:2px 2px 4px #000000;" data-toggle="tooltip" title="Agregar..." data-placement="right"></i>
</a>&nbsp&nbsp

<div id="modalcrear" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Encabezado -->
			<div class="modal-header" style="background-color: #3498db">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
				<h3 class="modal-title" id="myModalLabel" style="text-align: center;">
					<span class="glyphicon glyphicon-check"></span>&nbsp&nbspCREAR Usuario
				</h3>
			</div>
			<!-- Contenido -->
			<div class="modal-body">
				<!-- ERRORES -->
			
			</div>
			<!-- Pie -->
			<div class="modal-footer">
				<div class="text-center">
					<!-- BOTON CANCELAR -->
					<a class="btn btn-warning"
						data-dismiss="modal"
						href="#"
						style="text-shadow:2px 2px 4px #000000;">
						<i class="fa fa-close" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspCancelar
					</a>
					<!-- BOTON GUARDAR -->
					<button type="submit" class="btn btn-primary" style="text-shadow:2px 2px 4px #000000;"><i class="fa fa-check" style="font-size:18px;text-shadow:2px 2px 4px #000000;"></i>&nbsp&nbspGuardar</button>
				</div>
			</div>
			
		</div>
	</div>
</div>