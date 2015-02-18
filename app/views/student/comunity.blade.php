@extends ('layout')

@section ('title') Comunidad del Conocimiento ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad del Conocimiento</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Escritorio</a></li>
					<li class="active">Comunidad</li>
				</ol>
				
				<p>
					<a href="{{ route('student_comunity_post') }}" class="btn btn-success">Crear nuevo tema</a>
					<a href="{{ route('student_comunity_temas') }}" class="btn btn-default">Ver todos los temas</a>
				</p>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tema</th>
							<th>Participante</th>
							<th>Fecha</th>
							<th>Materia</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($temas as $tema)
						<tr>
							<td><a href="{{ route('student_comunity_post_view', array($tema->id)) }}">{{ $tema->title }}</a></td>
							<td>{{ $tema->profile->first_name }} {{ $tema->profile->father_last_name }} {{ $tema->profile->mother_last_name }}</td>
							<td>{{ mi_fecha($tema->created_at, true) }}</td>
							<td>{{ $tema->subject->name }}</td>
						</tr>
						<!-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} -->
					@endforeach
					</tbody>
					
				</table>
				
				<p>
					<a href="{{ route('student_comunity_post') }}" class="btn btn-success">Crear nuevo tema</a>
					<a href="{{ route('student_comunity_temas') }}" class="btn btn-default">Ver todos los temas</a>
				</p>
				
@stop