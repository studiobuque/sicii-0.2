@extends ('layout')

@section ('title') Profesor :: Educación Virtual ::  @stop

@section ('content')

				<h1 class="page-header">Educación Virtual</h1>
				
				<p>
					<a href="{{ route('teacher_education_new') }}" class="btn btn-primary">Crear nueva</a>
				</p> 
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tema</th>
							<th>Fecha</th>
							<th>Materia</th>
							<th>Carrera</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ($educations as $education)
						<tr>
							<td><a href="{{ route('teacher_education_edit', array($education->id)) }}">{{ $education->title }}</a></td>
							<td>{{ $education->created_at }}</td>
							<td>{{ $education->subject->name }}</td>
							<td>{{ $education->subject->degree->name }}</td>
							<!-- {"id":"1","tema_id":"0","title":"Clase Virtual 1","descripcion":"Editamos una clase virtual","url":"https:\/\/plus.google.com\/hangouts\/_\/g2mklhcnkgmshmctlsi7rmhf5qa","status":"","slug":"","profile_id":"0","subject_id":"2","degree_id":"1","lapse":"1","created_at":"2015-01-14 18:13:42","updated_at":"2015-01-14 18:37:05"} -->
						</tr>
						@endforeach
					</tbody>
				</table>
				
				<hr>
				<pre>Crear clases virtuales y subir archivos con la api de Google</pre>
				
@stop