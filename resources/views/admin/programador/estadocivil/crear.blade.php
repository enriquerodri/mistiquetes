@extends('template')
@section('title','Crear Estado Civil')

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
	              <h4 class="text-theme-colored text-uppercase m-0">Crear Estado Civil</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::open(['route'=>'estadocivil.store','class'=>'form-horizontal']) !!}
						@include('admin.programador.estadocivil.form')
					{!!Form::close() !!}
				</div>
		   	</div>
		</div>						
	</div>
@endsection