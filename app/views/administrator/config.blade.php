@extends ('layout')

@section ('title') Alumnos :: Escritorio ::  @stop

@section ('content')
				<h1 class="page-header">Configuración</h1>
				
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Configuracion de págos</h2>
						</div>
						<div class="panel-body">
							<p></p>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Configuración de materia</h2>
						</div>
						<div class="panel-body">
							<p><a href="{{ route('administrator_subjects') }}">Ver materias</a></p>
							<p><a href="{{ route('administrator_subjects') }}">Crear materia</a></p>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Configuración de usuarios</h2>
						</div>
						<div class="panel-body">
							<p><a href="{{ route('administrator_user') }}">Crear Administradores</a></p>
							<p><a href="{{ route('administrator_teacher') }}">Crear profesor</a></p>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Configuración de profesores</h2>
						</div>
						<div class="panel-body">
							{{-- <p><a href="{{ route('administrator_teacher_asignar') }}">Asignar materias al profesor</a></p> --}}
						</div>
					</div>
				</div>
				
@stop