@extends('template')
@section('title','Documentos')

@section('content')
<!-- MENU VEHÍCULOS -->
@include('partials.menu-programador')
	<div class="container text-center">
        <h3>DOCUMENTOS <a class="btn btn-success" href="{{route('documentos.create')}}"><i class="fa fa-plus"></i></a></h3>
        <div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<td><strong>ID</strong></td>
					<td><strong>Documento</strong></td>
					<td><strong>Descripción</strong></td>
					<td><strong>Código Nacional</strong></td>
					<td><strong>Editar</strong></td>
					<td><strong>Eliminar</strong></td>
				</tr>
			</thead>
			<tbody>
				@foreach($documentos as $documento)
					<tr>
						<td>{{$documento->m_nucodig}}</td>
						<td class="text-left">{{$documento->m_caprnom}}</td>
						<td>{{$documento->m_cadescr}}</td>
						<td>{{$documento->m_cacodna}}</td>
						<td>
							<a class="btn btn-warning" href="{{route('documentos.edit',$documento->m_nucodig)}}">
								<i class="fa fa-pencil"></i>
							</a>
						</td>
						<td>
							<form action="{{route('documentos.destroy',$documento->m_nucodig)}}" method="post">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="delete">
								<button class="btn btn-danger" onClick="return confirm('Eliminar Registro?')">
									<i class="fa fa-trash"></i>
								</button>								
							</form>							
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		</div>
		{{$documentos->links()}}
	</div>
@endsection