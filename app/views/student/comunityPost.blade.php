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
					<p class="text-right">
						Ayuda <span class="glyphicon glyphicon-question-sign text-warning" aria-hidden="true"></span>
					</p>
				
				<h2>Hacer una nueva aportación</h2>
				{{ Form::open(array('route' => 'student_comunity_post_new', 'method' => 'POST', 'class' => 'form-horizontal')) }}
					<!--
					{{ $student->degree->name }}
					{{ $student->degree }}
					-->
					<input type="hidden" name="degree_id" value="{{ $student->degree->id }}">
					<input type="hidden" name="respuesta" value="0">
					
					<div class="form-group">
						{{ Form::label('title', 'Asunto', array('class'=>"control-label")) }}
						{{ Form::text('title', null, array('class' => 'form-control')) }}
						{{ $errors->first('title', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
					</div>
					<div class="form-group">
						{{ Form::label('descripcion', 'Tu aporte', array('class'=>"control-label")) }}
						{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
						{{ $errors->first('descripcion', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
					</div>
					<div class="form-group">
						{{ Form::label('subject_id', 'Elige una materia', array('class'=>"control-label")) }}
						{{ Form::select('subject_id', $student->degree->lists('name', 'id')) }}
						{{ $errors->first('subject_id', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
					</div>
					
					<button type="subject" class="btn btn-success">Guardar</button>
					
				{{ Form::close() }}
				
				
@stop


<script>

@section('script') 
			
			<?php tinymce(); ?>
@stop

</script>
