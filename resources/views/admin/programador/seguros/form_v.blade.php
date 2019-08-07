<div class="form-group"> 
	<label class="col-sm-3 control-label">Seguro:</label>
	<div class="col-sm-9">
		{!!Form::text('m_canombr',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Código nacional:</label>
	<div class="col-sm-9">
		{!!Form::text('m_cacodna',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Descripción:</label>
	<div class="col-sm-9">
		{!!Form::textarea('m_cadescr',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group"> 
	<label class="col-sm-3 control-label">Ordenamiento: </label>
	<div class="col-sm-9">
		{!!Form::number('m_nuorden',null, [
				'class'=>'form-control',
				'readonly'
			])
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Resolución:</label>
	<div class="col-sm-9">
		{!!Form::textarea('m_caresol',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Fecha Resolución:</label>
	<div class="col-sm-9">
		{!!Form::date('m_feresol',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Controla vencimiento:</label>
	<div class="col-sm-9">
		{!!Form::text('m_cacoven',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Días de Alerta: </label>
	<div class="col-sm-9">
		{!!Form::number('m_nudiapv',null, [
				'class'=>'form-control',
				'readonly'
			])
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-8 control-label">ESTE SEGURO APLICA A</label>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Personas:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caapper',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Vehículos Pasajeros:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caapvpa',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Vehículos Carga:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caapvca',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Remolques:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caaprem',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Actualizaciones masivas:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caacmav',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">PESV:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caapesv',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">Estado:</label>
	<div class="col-sm-9">
		{!!Form::text('m_caestad',null, [
				'class'=>'form-control',
				'readonly'
			]) 
		!!}
	</div>
</div>
