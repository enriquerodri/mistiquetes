<div class="form-group">
	<label class="col-sm-2 control-label">Nombre:</label>
	<div class="col-sm-10">
		{!!Form::text('m_canombr',null, [
			'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Nombre...']) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Código:</label>
	<div class="col-sm-10">
		{!!Form::text('m_cadirec',null, [
			'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Código Nacional...']) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Descripción:</label>
	<div class="col-sm-10">
		{!!Form::textarea('m_cadirec',null, [
			'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Descripción...']) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Aplica a:</label>
	<div class="col-sm-5 text-left">
		<input type="checkbox" name="personas"> Personas
		<input type="checkbox" name="pasajeros"> Pasajeros
		<input type="checkbox" name="carga"> Carga
		<input type="checkbox" name="remolques"> Remolques
	</div>
	<div class="col-sm-3">
		<label>Controla vencimiento:</label>
		<input type="checkbox" name="controla">
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Días de Alerta: </label>
	<div class="col-sm-2">
		<input type="text" class="form-control" placeholder="Días de Alerta">
	</div>
	<div class="col-sm-6 text-left">
		<label>Plan Estratégico de Seguridad Vial:</label>
		<input type="checkbox" name="m_caapesv"> Si
		<input type="checkbox" name="m_caapesv"> No
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-8">
		{!! Form::select('m_caestad', ['Activo'=>'Activo','Inactivo'=>'Inactivo','Retirado'=>'Retirado'], null, ['placeholder' => 'Estado', 'class' => 'form-control']) 
		!!}
	</div>
</div>
<a class="btn btn-danger" href="{{route('documentos.index')}}">Cancelar</a>
{!!Form::submit('Guardar',['class'=>'btn btn-primary']) !!}