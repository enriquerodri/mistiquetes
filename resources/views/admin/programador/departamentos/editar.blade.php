@extends('template')
@section('title','Editar Departamento')

@section('content')
<!-- MENU ADMINISTRATIVOS: PROGRAMADOR -->
@include('partials.menu-programador')
	<div class="container text-center">
		@if ($errors->any())
		    @include('partials.errors')
		@endif
		<div class="row">
          	<div class="col-md-8 col-md-push-2">
	            <div class="border-1px p-25">
			        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
			        	<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITAR DEPARTAMENTO
			        </h4>
		            <div class="line-bottom mb-30"></div>
					{!!Form::model($departamento,['route'=>['departamentos.update',$departamento->m_nucodig],'method'=>'PUT','class'=>'form-horizontal']) !!}
					@include('admin.programador.departamentos.form')
					<div class="text-center">
						<a class="btn btn-danger" href="{{ route('departamentos.index') }}">Cancelar</a>&nbsp&nbsp
						{!!Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
					</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>
@endsection