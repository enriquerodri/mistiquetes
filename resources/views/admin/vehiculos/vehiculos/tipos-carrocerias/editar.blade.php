@extends('template')
@section('title','Editar Tipo de Carrocería')

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
	              <h4 class="text-theme-colored text-uppercase m-0">Tipo de Carrocería</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::model($tipo,['route'=>['tiposcarrocerias.update',$tipo->m_nucodig],'method'=>'PUT']) !!}
						@include('admin.vehiculos.vehiculos.tipos-carrocerias.form')
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>
@endsection