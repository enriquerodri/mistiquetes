@extends('template')
@section('title','Crear contrato crédito')

@section('content')
<!-- MENU ADMINISTRATIVOS: PROGRAMADOR -->
@include('partials.menu-programador')
	<div class="container text-center">
		@if ($errors->any())
		    @include('partials.errors')
		@endif
		<div class="row">
          	<div class="col-md-10 col-md-push-1">
	            <div class="border-1px p-25">
	              <h4 class="text-theme-colored text-uppercase m-0">Crear contrato crédito</h4>
	              <div class="line-bottom mb-30"></div>
					{!!Form::open(['route'=>'contratoscredito.store','class'=>'form-horizontal']) !!}
						@include('admin.programador.contratoscredito.form')
					{!!Form::close() !!}
				</div>
		   	</div>
		</div>						
	</div>
@endsection