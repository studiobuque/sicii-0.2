@extends ('layout')

@section ('title') Materias ::  @stop

@section ('content')

				<h1 class="page-header">Configurar Mareria</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li><a href="{{ route('administrator_subjects') }}">Materias</a></li>
					<li class="active">Ver Materia</li>
				</ol>
				
				<h2>Ver los datos de la Materia</h2>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">{{ $subject->name }}</h3>
					</div>
					<div class="panel-body">
						<p>Nombre: <strong>{{ $subject->name }}</strong></p>
						<p>Descripción: <strong>{{ $subject->description }}</strong></p>
						<p>Carrera: <strong>{{ $subject->degree->name }}</strong></p>
						<p>Periodo: <strong>{{ $subject->lapse }}</strong></p>
						
					</div>
					<div class="panel-footer clearfix">
						<div class="pull-right">
							<a href="{{ route('administrator_subject_edit', array('id' => $subject->id)) }}" class="btn btn-default">
								<span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span>
								<!-- <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> -->
							</a>
							<a href="" class="btn btn-default">
								<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
							</a>
						</div>
						
					</div>
				</div>
						

@stop