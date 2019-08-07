@extends('template')
@section('title','Crear oficina')

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
	              <h4 class="text-theme-colored text-uppercase m-0">Crear oficinas</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::open(['route'=>'oficinas.store','class'=>'form-horizontal']) !!}
						@include('admin.programador.oficinas.form')
					{!!Form::close() !!}
				</div>
		   	</div>
		</div>						
	</div>
@endsection