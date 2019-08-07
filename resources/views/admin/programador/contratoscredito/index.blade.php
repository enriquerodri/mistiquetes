@extends('template')
@section('title','Contratos Crédito')

@section('content')
<!-- MENU VEHÍCULOS -->
@include('partials.menu-programador')
	<div class="container text-center">
        <h3>ADMINISTRADOR CONTRATOS CRÉDITO <a class="btn btn-success" href="{{route('contratoscredito.create')}}"><i class="fa fa-plus"></i></a></h3>
        <div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<td><strong>ID</strong></td>
					<td><strong>Número Interno</strong></td>
					<td><strong>Objeto</strong></td>
					<td><strong>Tipo</strong></td>
					<td><strong>Fecha Inicio</strong></td>
					<td><strong>Fecha Vencimiento</strong></td>
					<td><strong>Valor</strong></td>
					<td><strong>Editar</strong></td>
					<td><strong>Eliminar</strong></td>
				</tr>
			</thead>
			<tbody>
				@foreach($contratoscredito as $contratocredito)
					<tr>
						<td>{{$contratocredito->m_nucodig}}</td>
						<td>{{$contratocredito->m_canuico}}</td>
						<td>{{$contratocredito->m_caobjet}}</td>
						<td>{{$contratocredito->m_caticon}}</td>
						<td>{{$contratocredito->m_fefeini}}</td>
						<td>{{$contratocredito->m_fevenci}}</td>
						<td>${{number_format($contratocredito->m_nuvalco,0)}}</td>
						<td>
							<a class="btn btn-warning" href="{{route('contratoscredito.edit',$contratocredito->m_nucodig)}}">
								<i class="fa fa-pencil"></i>
							</a>
						</td>
						<td>
							<form action="{{route('contratoscredito.destroy',$contratocredito->m_nucodig)}}" method="post">
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
		{{$contratoscredito->links()}}
	</div>
@endsection