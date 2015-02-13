@extends ('layout')

@section ('title') Materias ::  @stop

@section ('content')

				<h1 class="page-header">Mareria</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li><a href="{{ route('administrator_subjects') }}">Materias</a></li>
					<li class="active">Editar Materia</li>
				</ol>
				
				<h2>Editar los datos de la materia</h2>
				
				@if (!empty($validation))
				{{ $validation }}
				@endif
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Editar la materia</h3>
					</div>
					<div class="panel-body">
						{{ Form::model($subject, array('route' => 'administrator_subjects_save', 'method' => 'POST')) }}
							<input type="hidden" name="id" id="id" value="{{ $subject->id }}">
							<input type="hidden" name="degree_id" id="degree_id" value="{{ $subject->degree_id }}">
							<p>
								<!-- <label>Asunto</label>
								<input type="text" class="form-control"> -->
								{{ Form::label('name', 'Nombre') }}
								{{ Form::text('name', null, array('class' => 'form-control')) }}
							</p>
							<p>
								<!-- <textarea class="form-control" rows="5"></textarea> -->
								{{ Form::label('description', 'Descripción') }}
								{{ Form::textarea('description', null, array('class' => 'form-control')) }}
							</p>
							
							
							<!-- <p>Carrera id: <strong>{{ $subject->degree_id }}</strong></p> -->
							<p>Carrera: <strong>{{ $subject->degree->name }}</strong></p>
							<p>
								Periodo: <strong>{{ $subject->degree->mode }}</strong>
								<!-- {{ Form::label('mode', 'Periodo', array('class'=>"col-sm-2 control-label")) }}
								{{ Form::text('mode', null, array('class' => 'form-control')) }} -->
								{{-- Form::select('mode', array('Semestral' => 'Semestral',  'Cuatrimestral' => 'Cuatrimestral', 'Trimestral' => 'Trimestral', 'Bimestral' => 'Bimestral'), null, array('class' => 'form-control')) --}}
							</p>
							<p>
								<!-- Grado: <strong>{{ $subject->lapse }}</strong> -->
								{{ Form::label('lapse', 'Grado:') }}
								{{ Form::input('number', 'lapse', null, array('class' => 'form-control')) }}
							</p>
							
							<button type="subject" class="btn btn-primary">Guardar</button>
							<!-- <a href="{{ route('administrator_subjects') }}" class="btn btn-default">Cerrar</a> -->
							<a href="{{ URL::previous() }}" class="btn btn-default">Cerrar</a>
							
							
						{{ Form::close() }}
					</div>
				</div>

@stop


<script>

@section('script') 
			/*tinymce.init({
				selector:"textarea#description"
			});*/
@stop

</script>