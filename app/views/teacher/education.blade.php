@extends ('layout')

@section ('title') Profesor :: Educación Virtual ::  @stop

@section ('content')

				<h1 class="page-header">Educación Virtual</h1>
				
				<p>Crear clases virtuales y subir archivos con la api de Google</p>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Tema</th>
							<th>No se</th>
							<th>Ver</th>
						</tr>
					</thead>
					<tbody>
	@foreach (range(1, 4) as $index)
						<tr>
							<td>24/01/2014</td>
							<td>Las mejores formas de estudiar</td>
							<td>Algo más</td>
							<td>..</td>
						</tr>
	@endforeach
					</tbody>
				</table>
				
@stop