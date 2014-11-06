@extends ('administrator/layout')

@section ('title') Escritorio ::  @stop

@section ('content')


				<h1 class="page-header">Alumnos</h1>
				
				<p class="lead">Ver todos los datos del Alumno</p>
				
				<p>Nombre: <strong>{{ $student->first_name }} {{ $student->last_name }}</strong></p>
				<p>No. Control: <strong>{{ $student->user->control }}</strong></p>
				<p>Dirección: <strong>{{ $student->address }}</strong></p>
				<p>Telefono: <strong>{{ $student->phone }}</strong></p>
			
			
			

@stop