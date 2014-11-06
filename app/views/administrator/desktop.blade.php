@extends ('student/layout')

@section ('title') Alumnos :: Escritorio ::  @stop

@section ('content')

				<h1 class="page-header">Escritorio </h1>
				<h2 class="text-center">{{ $student->first_name }} {{ $student->last_name }}</h2>
				
				<dl class="dl-horizontal">
					<dt>Matricula</dt>
					<dd>{{ $student->user->control }}</dd>
					<dt>Dirección</dt>
					<dd>{{ $student->address }}</dd>
					<dt>Telefono</dt>
					<dd>{{ $student->phone }}</dd>
				</dl>
				
				<div class="col-lg-6">
					<h3>Ultimas Calificaciones</h3>
					<h3>Ultimos Pagos</h3>
				</div>
				
				<div class="col-lg-6">
					<h3>Educaion Virtual</h3>
				</div>
@stop