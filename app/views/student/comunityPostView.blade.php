@extends ('layout')

@section ('title') Comunidad del Conocimiento ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad del Conocimiento</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Estudiante</a></li>
					<li><a href="{{ route('student_comunity') }}">Comunidad</a></li>
					<li class="active">{{ str_limit($tema->title, $limit = 18, $end = ' ...') }}</li>
				</ol>
				
				{{ (Input::has('alert_mensaje') ? mensaje_alerta_redirect(Request::get('alert_mensaje'), Request::get('alert_estilo'), Request::get('alert_ico')) : null) }}
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<!--  class="panel-title" -->
						<p class="meta"><!--  style="font-size: 0.8em;" -->
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}<strong></strong>.
							<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
							{{ $tema->degree->name }}<strong></strong>
							<!--  Materia <strong>{{ $tema->subject->name }}</strong> 
							Periodo <strong>{{ $tema->subject->lapse }}</strong> --> 
						</p>
					</div>
					<div class="panel-body">
						<h2>{{ $tema->title }}</h2>
						<p>{{ $tema->descripcion }}</p>
						<p>
							@if ($tema->profile_id == $student->id )
							<a href="{{ route('student_comunity_post_edit', array('pregunta', $tema->id)) }}" class="btn btn-success">Editar</a>
							<!-- <a href="#" class="btn btn-success">Cerrar</a>  -->
							@endif
							&nbsp;
						</p>
						
						
						@foreach (Tema::where('tema_id', '=', $tema->id)->get() as $respuestas)
						
						<hr>
						
						<p>{{ $respuestas->descripcion }}</p>
						<p class="meta" style="font-size: 0.8em; margin-top: 0.5em;">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							{{ $respuestas->profile->first_name }} {{ $respuestas->profile->father_last_name }}
							<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
							{{ mi_fecha($respuestas->created_at, true) }}&nbsp;
							
							<!-- Carrera <strong>{{ $respuestas->degree->name }}</strong>
							Materia <strong>{{ $respuestas->subject->name }}</strong> 
							Periodo <strong>{{ $respuestas->subject->lapse }}</strong> -->
							
							@if ($respuestas->profile_id == $student->id )
							<a href="{{ route('student_comunity_post_edit', array('respuesta', $respuestas->id)) }}" class="btn btn-success btn-xs">Editar</a>
							@endif
						</p>
						
						@endforeach
				
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Deja tu respuesta</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'student_comunity_post_new', 'method' => 'POST')) }}
							
							<input type="hidden" name="tema_id" value="{{ $tema->id }}">
							<input type="hidden" name="subject_id" value="{{ $tema->subject_id }}">
							<input type="hidden" name="respuesta" value="1">
							<input type="hidden" name="title" value="RE: {{ $tema->title }}">
							
							{{--<div class="form-group">
								{{ Form::label('title', 'Asunto', array('class'=>"col-sm-2 control-label") ) }}
								<div class="col-sm-10">
								{{ Form::text('title', null, array('class' => 'form-control') ) }}
								</div>
							</div> --}}
							<div class="form-group">
								{{ Form::label('descripcion', ' ', array('class'=>"control-label") ) }}
								{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
								{{ $errors->first('descripcion', '<p class="bg-danger" style="padding: 0.5em; margin-top: 0.5em;">:message</p>'); }}
							</div>
							
							<!-- <a href="#"class="btn btn-success">Responder</a> -->
							<button type="subject" class="btn btn-success">Responder</button>
						
						{{ Form::close() }}
					</div>
				</div>
				
				
@stop

<script>

@section('script') 
			<?php tinymce(); ?>
@stop

</script>
