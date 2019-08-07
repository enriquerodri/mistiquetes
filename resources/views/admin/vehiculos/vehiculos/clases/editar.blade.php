@extends('template')
@section('title','Editar Clase de Vehículo')

@section('content')
<!-- MENU VEHÍCULOS -->
@include('partials.menu-vehiculos')
	<div class="container text-center">
		@if ($errors->any())
		    @include('partials.errors')
		@endif
		<div class="row">
          	<div class="col-md-6 col-md-push-3">
	            <div class="border-1px p-25">
	              <h4 class="text-theme-colored text-uppercase m-0">Clases de Vehículos</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::model($clase,['route'=>['clases.update',$clase->m_nucodig],'method'=>'PUT']) !!}
						@include('admin.vehiculos.vehiculos.clases.form')
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>
@endsection