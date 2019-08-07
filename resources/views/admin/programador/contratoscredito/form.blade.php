<div class="form-group">
	<label class="col-sm-2 control-label">Nro Interno:</label>
	<div class="col-sm-4">
		{!!Form::text('m_canuico',null, ['class'=>'form-control', 'placeholder'=>'Número Interno...']) !!}
	</div>
	<label class="col-sm-2 control-label">Estado:</label>
	<div class="col-sm-4">
		{!! Form::select('m_caestad', ['Activo'=>'Activo','Inactivo'=>'Inactivo','Anulado'=>'Anulado','Terminado'=>'Terminado'], null, ['placeholder' => 'Estado', 'class' => 'form-control']) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Cliente:</label>
	<div class="col-sm-10">
		{!!Form::text('m_canuipe',null, ['class'=>'form-control','placeholder'=>'Cliente...']) !!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Dirección:</label>
	<div class="col-sm-10">
		{!!Form::text('m_canombr',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Dirección...'
			]) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Objeto:</label>
	<div class="col-sm-4">
		{!!Form::text('m_caprnom',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Objeto...'
			]) 
		!!}
	</div>
	<label class="col-sm-3 control-label">Tipo de Contrato:</label>
	<div class="col-sm-3">
		{!!Form::text('m_casenom',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Tipo de Contrato...'
			]) 
		!!}
	</div>
</div>
<div class="form-group">
	<div class="col-sm-4">
		<label>Controla Vencimiento</label>
		{!!Form::checkbox('m_cacoven',null, ['class'=>'form-control'])!!} 
	</div>
	<label class="col-sm-1 control-label">Desde:</label>
	<div class="col-sm-3">
		{!!Form::date('m_fefeini',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Segundo Apellido...'
			]) 
		!!}
	</div>
	<label class="col-sm-1 control-label">Hasta:</label>
	<div class="col-sm-3">
		{!!Form::date('m_fevenci',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Segundo Apellido...'
			]) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Valor Total:</label>
	<div class="col-sm-2">
		{!!Form::number('m_nuvalco',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Valor total...']) 
		!!}
	</div>
	<label class="col-sm-1 control-label">Tiquetes:</label>
	<div class="col-sm-3">
		{!!Form::number('m_nuvalti',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Valor Tiquetes registrados...']) 
		!!}
	</div>
	<label class="col-sm-1 control-label">Saldo:</label>
	<div class="col-sm-3">
		{!!Form::number('m_nusaldo',null, [
				'class'=>'form-control', 'required'=>'required', 'placeholder'=>'Saldo...']) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Autorizado por:</label>
	<div class="col-sm-10">
		{!!Form::text('m_caautor',null, ['class'=>'form-control','placeholder'=>'Autorizado por...'	]) 
		!!}
	</div>
</div>

<a class="btn btn-danger" href="{{route('contratoscredito.index')}}">Cancelar</a>
{!!Form::submit('Guardar',['class'=>'btn btn-primary']) !!}