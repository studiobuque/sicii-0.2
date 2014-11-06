@extends ('student/layout')

@section ('title')Mis Calificaciónes ::  @stop

@section ('content')

				<h1 class="page-header">Calificaciones</h1>
				
				<p class="lead">Mostrar todas las calificaciones del alumno</p>
				
				<h2>{{ $student->first_name }}</h2>
				
@stop