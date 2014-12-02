@extends ('layout')

@section ('title') Alumnos :: Comunidad ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad</h1>
				<!-- <h2 class="text-center">{{ $student->first_name }}</h2> -->
				
				
				<h2>Ver las últimas aportaciones</h2>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Tema</th>
							<th>Respuestas/Visto</th>
							<th>Ver</th>
						</tr>
					</thead>
					<tbody>
					@foreach (range(1, 4) as $index)
						<tr>
							<td>24/01/2014</td>
							<td>Las mejores formas de estudiar</td>
							<td>12/34</td>
							<td>..</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				
				<hr>
				
				
				<h2>Hacer una nueva aportación</h2>
				{{ Form::open(array('route' => 'student_create_post_comunity', 'method' => 'POST')) }}
					<p>
						<label>Asunto</label>
						{{ Form::label('title', 'Asunto') }}
						{{ Form::text('title', null, ['class' => 'form-control']) }}
						<input type="text" class="form-control">
					</p>
					<p>
						<textarea class="form-control" rows="5"></textarea>
					</p>
					<p>
						{{ $student->degree->name }}
						<hr>
						{{-- $student->degree --}}
						{{-- $student->degree->subjects --}}
						{{-- Subject::where('degree_id', '=', $student->degree_id) --}}
						
						@foreach ($student->degree->subjects as $key)
						{{ $key->id }} {{ $key->name }}
							@if ( $select[] = array($key->id, $key->name ) ) @endif
						@endforeach
						<hr>
						{{ $select }}
					</p>
					<p>
						Materia
						{{ Form::select('size', array('A', 'b')) }}{{-- Subject::materias( ) --}}
					</p>
					<button type="button" class="btn btn-primary">Enviar</button>
				{{ Form::close() }}
@stop