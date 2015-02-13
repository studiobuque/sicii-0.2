@extends ('layout')

@section ('title') Comunidad del Conocimiento ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad del Conocimiento</h1>
				<!-- <h2 class="text-center">{{ $student->first_name }}</h2> -->
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Estudiante</a></li>
					<li><a href="{{ route('student_comunity') }}">Comunidad</a></li>
					<li class="active">Nuevo tema</li>
				</ol>
				
				<h2>Hacer una nueva aportación</h2>
				{{ Form::open(array('route' => 'student_comunity_post_new', 'method' => 'POST', 'class' => 'form-horizontal')) }}
					<!--
					{{ $student->degree->name }}
					{{ $student->degree }}
					-->
					<input type="hidden" name="degree_id" value="{{ $student->degree->id }}">
					<input type="hidden" name="respuesta" value="0">
					
					<div class="form-group">
						<!-- <label>Asunto</label>
						<input type="text" class="form-control"> -->
						{{ Form::label('title', 'Asunto', array('class'=>"col-sm-2 control-label")) }}
						<div class="col-sm-10">
						{{ Form::text('title', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<!-- <textarea class="form-control" rows="5"></textarea> -->
						{{ Form::label('descripcion', 'Tu aporte', array('class'=>"col-sm-2 control-label")) }}
						<div class="col-sm-10">
						{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('subject_id', 'Elige una materia', array('class'=>"col-sm-2 control-label")) }}
						<div class="col-sm-10">
						{{ Form::select('subject_id', $student->degree->subjects->lists('name', 'id')) }}
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-10">
						<button type="subject" class="btn btn-success">Guardar</button>
					</div>
				{{ Form::close() }}
				
				
@stop


<script>

@section('script') 
			
			<?php tinymce(); ?>
@stop

</script>
