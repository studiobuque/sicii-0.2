@extends ('layout')

@section ('title') Profesor :: Asesor Académico ::  @stop

@section ('content')

				<h1 class="page-header">Asesor Académico </h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('teacher') }}">Escritorio</a></li>
					<li class="active">Asesor</li>
				</ol>
				
				<p>Responde las preguntas de los alumnos.</p>
				
				{{-- var_dump($temas) --}}
				
				
				<h2>Ver las últimas aportaciones</h2>
				
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tema:</th>
							<th>Alumno:</th>
							<th>Fecha:</th>
							<th>Materia:</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($temas as $tema)
						<tr>
							<td>
								<a href="{{ route('teacher_advisor_post_view', array($tema->id)) }}">
									{{ $tema->title }}
								</a>
							</td>
							<td>{{ $tema->profile->first_name }} {{ $tema->profile->father_last_name }}</td>
							<td>{{ mi_fecha($tema->created_at) }}</td>
							<td>{{ $tema->subject->name }}</td>
						</tr>
						<!-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} -->
					@endforeach
					</tbody>
					
				</table>
@stop