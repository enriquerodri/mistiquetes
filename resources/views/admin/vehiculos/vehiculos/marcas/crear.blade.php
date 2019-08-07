@extends('template')
@section('title','Crear Marca de Vehículo')

@section('content')
<!-- MENU VEHÍCULOS -->
@include('partials.menu-vehiculos')
<section>
	<div class="container text-center">
		@if ($errors->any())
		    @include('partials.errors')
		@endif
		<div class="row">
          	<div class="col-md-6 col-md-push-3">
	            <div class="border-1px p-25">
	              <h4 class="text-theme-colored text-uppercase m-0">Marcas de Vehículos</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::open(['route'=>'marcas.store']) !!}
						@include('admin.vehiculos.vehiculos.marcas.form')
					{!!Form::close() !!}
				</div>
		   	</div>
		</div>						
	</div>
</section>
@endsection