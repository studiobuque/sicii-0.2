@extends ('layout')

@section ('title')Educación Virtual ::  @stop

@section ('content')

				<h1 class="page-header">Educación Virtual</h1>
				
				<!-- <p class="lead">Aquí puede interactuar para el mejor aprovechaminto de las clases</p> -->
				
				<h2>{{ $student->first_name }}</h2>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Título</th>
							<th>Fecha</th>
							<th>Materia</th>
							<th>Carrera</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($educations as $education)
						<tr>
							<td><a href="{{ route('student_education_view', array($education->id)) }}">{{ $education->title }}</a></td>
							<td>{{ $education->created_at }}</td>
							<td>{{ $education->subject->name }}</td>
							<td>{{ $education->subject->degree->name }}</td>
							<td>..</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
				{{-- $educations --}}
				<!-- 
				<div class="col-lg-6">
					<h3>Asesor Académico</h3>
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
				</div> -->
				
@stop