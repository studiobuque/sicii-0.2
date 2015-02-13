@extends ('layout')

@section ('title') Comunidad del Conocimiento ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad del Conocimiento</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Estudiante</a></li>
					<li><a href="{{ route('student_comunity') }}">Comunidad</a></li>
					<li class="active">Lista de temas</li>
				</ol>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tema</th>
							<th>Alumno</th>
							<th>Materia</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($temas as $tema)
						<tr>
							<td><a href="{{ route('student_comunity_post_view', array($tema->id)) }}">{{ $tema->title }}</a></td>
							<td>{{ $tema->profile->first_name }} {{ $tema->profile->father_last_name }}</td>
							<td>{{ $tema->subject->name }}</td>
						</tr>
						<!-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} -->
					@endforeach
					</tbody>
					
				</table>
				
				
				{{ $temas->links() }}
				
				{{-- 
				<hr>
				{{ $tema->profile }}
				<h2>{{ $tema->title }}</h2>
				<p class="meta">
					Por <strong>{{ $student->first_name }}  {{ $student->father_last_name }}</strong>.
					Carrera <strong>{{ $student->degree->name }}</strong>
					Materia <strong>{{ $tema->subject->name }}</strong> 
				</p>
				<p>{{{ $tema->descripcion }}}</p>
				
				@if ($tema->profile_id == $student->id )
				<a href="{{ route('student_comunity_post_edit', ['pregunta', $tema->id]) }}" class="btn btn-primary">Editar</a>
				<a href="#" class="btn btn-primary">Cerrar</a>
				@endif
				--}}
				
				
@stop