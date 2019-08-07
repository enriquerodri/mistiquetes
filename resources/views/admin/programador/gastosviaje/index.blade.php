@extends('template')
@section('title','Gastos de Viaje')

@section('content')
<!-- MENU VEHÍCULOS -->
@include('partials.menu-programador')
	<div class="container text-center">
        <h3>GASTOS DE VIAJE <a class="btn btn-success" href="{{route('gastosviaje.create')}}"><i class="fa fa-plus"></i></a></h3>
        <div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<thead>
				<tr>
					<td><strong>ID</strong></td>
					<td><strong>Ruta</strong></td>
					<td><strong>Oficina</strong></td>
					<td><strong>Valor</strong></td>
					<td><strong>Editar</strong></td>
					<td><strong>Eliminar</strong></td>
				</tr>
			</thead>
			<tbody>
				@foreach($gastosviaje as $gastoviaje)
					<tr>
						<td>{{$gastoviaje->m_nucodig}}</td>
						<td class="text-left">{{$gastoviaje->m_nucorut}}</td>
						<td>{{$gastoviaje->m_nuofior}}</td>
						<td>{{$gastoviaje->m_nuvalor}}</td>
						<td>
							<a class="btn btn-warning" href="{{route('gastosviaje.edit',$gastoviaje->m_nucodig)}}">
								<i class="fa fa-pencil"></i>
							</a>
						</td>
						<td>
							<form action="{{route('gastosviaje.destroy',$gastoviaje->m_nucodig)}}" method="post">
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
		{{$gastosviaje->links()}}
	</div>
@endsection