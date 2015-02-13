@extends ('layout')

@section ('title') Materias ::  @stop

@section ('content')

				<h1 class="page-header">Configurar Materias</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li class="active">Materias</li>
				</ol>
				
				<h2>Elige una carrera</h2>
				
				@foreach ($degrees as $degree)
				
				<div class="panel panel-default">
					<div class="panel-heading">
						{{ $degree->name }} <small>{{ $degree->mode }}</small>
					</div>
					<div class="panel-body">
						{{ $degree->description }}
					</div>
					<div class="panel-footer clearfix">
						<div class="pull-right">
							<a href="{{ route('administrator_subjects_list', array($degree->id)) }}" class="btn btn-default" title="Listar Materias" data-toggle="tooltip" data-placement="bottom">
								<span class="glyphicon glyphicon-list text-primary" aria-hidden="true"></span>
								<!-- <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> -->
							</a>
							<a href="{{ route('administrator_degree_edit', array($degree->id)) }}" class="btn btn-default" title="Editar la Carrera" data-toggle="tooltip" data-placement="bottom">
								<span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span>
								<!-- <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> -->
							</a>
							<a href="#" class="btn btn-default" title="Borrar la Carrera" data-toggle="tooltip" data-placement="bottom">
								<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
				
				@endforeach
				
				<hr>
				
				<h2>Crea una carrera</h2>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						Nueva carrera
					</div>
					<div class="panel-body">
						
						{{ Form::open(array('route' => 'administrator', 'method' => 'POST', 'class' => 'form-horizontal')) }}
						
						<div class="form-group">
							{{ Form::label('name', 'Nombre', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{ Form::text('name', null, array('class' => 'form-control')) }}
							</div>
						</div>
						
						<div class="form-group">
							{{ Form::label('description', 'Descripción', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{ Form::textarea('description', null, array('class' => 'form-control')) }}
							</div>
						</div>
						
						<div class="form-group">
							{{ Form::label('lapse', 'Grado', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{-- Form::text('lapse', null, array('class' => 'form-control')) --}}
							{{ Form::input('number', 'lapse', null, array('class' => 'form-control')) }}
							</div>
						</div>
						
						<div class="form-group">
							{{ Form::label('mode', 'Periodo', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{ Form::text('mode', null, array('class' => 'form-control')) }}
							{{-- Form::select('mode', array('Semestral' => 'Semestral',  'Cuatrimestral' => 'Cuatrimestral', 'Trimestral' => 'Trimestral', 'Bimestral' => 'Bimestral'), null, array('class' => 'form-control')) --}}
							</div>
						</div>
						
						<div class="col-sm-offset-2 col-sm-10">
							<button type="subject" class="btn btn-primary">Guardar</button>
						</div>
						
						{{ Form::close() }}
					</div>
				</div>

@stop

<script>

@section('script') 
			$('[data-toggle="tooltip"]').tooltip()
@stop

</script>


