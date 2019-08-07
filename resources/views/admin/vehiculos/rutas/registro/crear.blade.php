@extends('template')
@section('title','Registrar Ruta')

@section('content')
<!-- MENU VEHÍCULOS -->
@include('partials.menu-vehiculos')
	<div class="container text-center">
		@if ($errors->any())
		    @include('partials.errors')
		@endif
		<div class="row">
          	<div class="col-md-10 col-md-push-1">
	            <div class="border-1px p-25">
	              <h4 class="text-theme-colored text-uppercase m-0">Registrar Ruta</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::open(['route'=>'rutas.store','class'=>'register-form']) !!}
						@include('admin.vehiculos.rutas.registro.form')
					{!!Form::close() !!}
				</div>
		   	</div>
		</div>						
	</div>
@endsection