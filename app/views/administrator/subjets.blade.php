@extends ('layout')

@section ('title') Materias ::  @stop

@section ('content')

				<h1 class="page-header">Marerias</h1>
				
				<p class="lead">Ver las carreras ordenadas por Carrera</p>
				
				@foreach ($degrees as $degree)
				<h2>{{ $degree->name }} <small>{{ $degree->mode }}</small></h2>
				<p>{{ $degree->description }}</p>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Carrera</th>
							<!-- <th>{{ $degree->mode }}</th> -->
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($degree->subjects as $subject)
						<tr>
							<td class="text-capitalize">
								{{ @$subject->name }}
							</td>
							<td>
								{{ @$subject->description }}
							</td>
							<!-- <td>
								{{ @$subject->degree->name }}
							</td> -->
							<td>
								{{ @$subject->lapse }}
							</td>
							<td>
								<a href="{{ route('administrator_subject', array('materia' => $subject->lapse, 'id' => $subject->id)) }}" class="btn btn-info">Ver</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@endforeach

@stop