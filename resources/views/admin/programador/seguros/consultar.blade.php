@extends('template')
@section('title','Consultar Seguros')

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
			        	<span class="glyphicon glyphicon-zoom-in"></span>&nbsp&nbspCONSULTAR SEGURO:&nbsp&nbsp{{ $seguro->m_canombr }}
			        </h4>
		            <div class="line-bottom mb-30"></div>
					{!!Form::model($seguro,['route'=>['seguros.show',$seguro->m_nucodig],'method'=>'PUT','class'=>'form-horizontal']) !!}
					@include('admin.programador.seguros.form_v')
					<div class="text-center">
						<a class="btn btn-danger" href="{{ route('seguros.index') }}">Cerrar</a>&nbsp&nbsp
						<a class="btn btn-warning" href="{{route('seguros.edit',$seguro->m_nucodig)}}">Editar
						</a>
					</div>
					{!!Form::close() !!}
				</div>
			</div>
		</div>			
	</div>
@endsection