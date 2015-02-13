@extends ('layout')

@section ('title') Profesor :: Asesor Académico ::  @stop

@section ('content')

				<h1 class="page-header">Asesor Académico </h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('teacher') }}">Escritorio</a></li>
					<li><a href="{{ route('teacher_advisor') }}">Asesor</a></li>
					<li class="active">Editar respuesta  "{{ str_limit($tema->title, $limit = 18, $end = ' ...') }}"</li>
				</ol>
				
				<h2>Editar respuesta</h2>
				
				{{ Form::model($tema, array('route' => 'teacher_advisor_post_save', 'method' => 'POST')) }}
					
					<input type="hidden" name="title" value="{{ $tema->title }}">
					<input type="hidden" name="id" value="{{ $tema->id }}">
					<input type="hidden" name="tema_id" value="{{ $tema->tema_id }}">
					<input type="hidden" name="subject_id" value="{{ $tema->subject_id }}">
					<input type="hidden" name="respuesta" value="1">
					
					<p>
						<label for="title_disabled">Asunto</label>
						<input class="form-control" disabled="disabled" name="title_disabled" type="text" value="{{ $tema->title }}" id="title">
					</p>
					<p>
						{{ Form::label('descripcion', 'Tu aporte') }}
						{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
					</p>
					<p></p>
					<button type="subject" class="btn btn-success">Guardar</button>
					
				{{ Form::close() }}
				
				
@stop

<script>

@section('script') 
			<?php tinymce(); ?>
@stop

</script>
