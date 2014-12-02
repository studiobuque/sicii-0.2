@extends ('layout')

@section ('title') Materias ::  @stop

@section ('content')

				<h1 class="page-header">Mareria</h1>
				
				<p class="lead">Ver los datos de la Carrera</p>
				
				<p>Nombre: <strong>{{ $subject->name }}</strong></p>
				<p>Descripción: <strong>{{ $subject->description }}</strong></p>
				<p>Carrera: <strong>{{ $subject->degree->name }}</strong></p>
				<p>Periodo: <strong>{{ $subject->lapse }}</strong></p>

@stop