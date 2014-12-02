@extends ('layout')

@section ('title') Alumnos :: Escritorio ::  @stop

@section ('content')

				<h1 class="page-header">Escritorio </h1>
				<h2 class="text-center">{{ $student->first_name }} {{ $student->last_name }}</h2>
				
				<dl class="dl-horizontal">
					<dt>Matrícula</dt>
					<dd>{{ $student->user->control }}</dd>
					<dt>Dirección</dt>
					<dd>{{ $student->address }}</dd>
					<dt>Teléfono</dt>
					<dd>{{ $student->phone }}</dd>
				</dl>
				
				<div class="col-lg-6">
					<h3>Últimas Calificaciones</h3>
					<p>Mostrar las calificaciones</p>
					<h3>Últimos Pagos</h3>
				</div>
				
				<div class="col-lg-6">
					<h3>Educación Virtual</h3>
					<h3>Asesor Académico</h3>
					<h3>Comunidad de la educación</h3>
				</div>
@stop