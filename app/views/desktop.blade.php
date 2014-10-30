@extends ('layout')

@section ('title') Escritorio ::  @stop

@section ('content')

				<h1 class="page-header">Escritorio</h1>
				
				<!-- <p class="lead">El uso de los nuevos medios y productos basados en la tecnología digitan, para control administrativo y académico, se hace indispensable en un proyecto de carácter educativo, en este contexto, se utilizara en un 70% para el desarrollo de materiales educativos, uso educativo de dispositivos y soportes, que permitan visualizar información académica de forma remota, realizar pagos de colegiaturas en línea, consulta de historial académico y de pagos, disminuyendo la brecha digital y la distancia entre el alumno, el aula y la institución, siendo el maestro la parte insustituible, desde la presencia oportuna antes del periodo de evaluación, hasta la elaboración de materiales de apoyo y seguimiento de proyectos.</p>
				<p>mientras los textos normales llenan la pantalla</p> -->
				
				
				<h2>Alumnos</h2>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Alumno</th>
							<th>Materia</th>
							<th>Telefono</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
	@foreach ($profiles as $profiles)
						<tr>
							<td>
								{{ $profiles->user_id }}
							</td>
							<td>
								{{ $profiles->subjects_id }}
							</td>
							<td>
								{{ $profiles->phone }}
							</td>
							<td>
								<a class="btn btn-info">Ver</a>
							</td>
						</tr>
					</tbody>
	@endforeach
				</table>
				
				<h2>Carrera</h2>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Alumno</th>
							<th>No. Control</th>
							<th>Telefono</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								Eddy
							</td>
							<td>
								999999999
							</td>
							<td>
								611234567
							</td>
							<td>
								<a class="btn btn-info">Ver</a>
							</td>
						</tr>
					</tbody>
				</table>
			
			

@stop