@extends('template')
@section('title','Editar Oficina')

@section('content')
<!-- MENU ADMINISTRATIVOS: PROGRAMADOR -->
@include('partials.menu-programador')
	<div class="container text-center">
		@if ($errors->any())
		    @include('partials.errors')
		@endif
		<div class="row">
          	<div class="col-md-12">
	            <div class="border-1px p-25">
			        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">
			        	<span class="glyphicon glyphicon-edit"></span>&nbsp&nbspEDITAR OFICINA
			        </h4>
		            <div class="line-bottom mb-30"></div>
					{!!Form::model($oficina,['route'=>['oficinas.update',$oficina->m_nucodig],'method'=>'PUT','class'=>'form-horizontal']) !!}
					@include('admin.programador.oficinas.form')
					<div class="text-center">
						<a class="btn btn-danger" href="{{ route('oficinas.index') }}">Cancelar</a>&nbsp&nbsp
						{!!Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
					</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>
@endsection