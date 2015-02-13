@extends ('layout')

@section ('title')Mis Calificaciones ::  @stop

@section ('content')
				
				<h1 class="page-header">Calificaciones</h1>
				
				<h3 class="text-center">{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}</h3 class="">
				
				<p>Carrera: <strong>{{ $student->degree->name }}</strong> {{ $student->degree->mode }}</p>
				
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Calificaciones actuales</h2>
						</div>
						<div class="panel-body">
							<p><a href="{{ route('student_rating_actual') }}">Ver las calificaciones actuales</a></p>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Todas las calificaciones</h2>
						</div>
						<div class="panel-body">
							<p><a href="{{ route('student_rating_todo') }}">Ver todas las calificaciones</a></p>
						</div>
					</div>
				</div>
				
@stop