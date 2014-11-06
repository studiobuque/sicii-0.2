@extends ('student/layout')

@section ('title')Mis Calificaciónes ::  @stop

@section ('content')

				<h1 class="page-header">Educación Virtual</h1>
				
				<p class="lead">Aqui puede interactuar para el mejor aprobechaminto de las clases</p>
				
				<h2>{{ $student->first_name }}</h2>
				
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
				
				<div class="col-lg-6">
					<h3>Acesor Academico</h3>
					<ul>
						<li>Ver</li>
						<li>Preguntar</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<h3>Comunidad</h3>
					<ul>
						<li>Ver</li>
						<li>Preguntar</li>
					</ul>
				</div>
				
@stop