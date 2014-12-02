@extends ('layout')

@section ('title') Escritorio ::  @stop

@section ('content')


				<h1 class="page-header">Alumnos</h1>
				
				<p class="lead">Ver todos los Alumnos</p>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Control</th>
							<th>Nombre</th>
							<th>Telefono</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($students as $student)
						<tr>
							<td class="text-capitalize">
								{{ $student->user->control }}
							</td>
							<td class="text-capitalize">
								{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}
							</td>
							<td class="text-capitalize">
								{{ $student->phone }}
							</td>
							<td class="">
								<a href="{{ route('administrator-student', array($student->first_name, $student->id)) }}" class="btn btn-info hidden-print">Ver</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			
			
			

@stop