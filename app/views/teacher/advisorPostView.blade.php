@extends ('layout')

@section ('title') Profesor :: Asesor Académico ::  @stop

@section ('content')

				<h1 class="page-header">Asesor Académico </h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('teacher') }}">Escritorio</a></li>
					<li><a href="{{ route('teacher_advisor') }}">Asesor</a></li>
					<li class="active">{{ str_limit($tema->title, $limit = 18, $end = ' ...') }}</li>
				</ol>
				
				{{ (Input::has('alert_mensaje') ? mensaje_alerta_redirect(Request::get('alert_mensaje'), Request::get('alert_estilo'), Request::get('alert_ico')) : null) }}
				
				<div class="panel panel-default">
					<div class="panel-heading">
						
						<p class="meta"><!--  style="font-size: 0.8em;" -->
							Por <strong>{{ $tema->profile->first_name }} {{ $tema->profile->father_last_name }}</strong>.
							<!-- Carrera <strong>{{ $tema->degree->name }}</strong> -->
							Materia <strong>{{ $tema->subject->name }}</strong> 
							<!-- Periodo <strong>{{ $tema->subject->lapse }}</strong>  -->
						</p>
						
					</div>
					<div class="panel-body">
						<div id="tema-{{ $tema->id }}" class="pregunta {{ $tema->id }} {{ $tema->type }}">
							
							<h2>{{ $tema->title }}</h2>
							
							{{ $tema->descripcion }}
							
							@if ($tema->profile_id == $teacher->id )
							
							<a href="{{ route('student_partner_post_edit', array('pregunta', $tema->id)) }}" class="btn btn-success">Editar</a>
							
							@endif
							
							<a href="#" class="btn btn-default btn-sm">Cerrar la pregunta</a>
							
						</div>
						
						@foreach (Tema::where('tema_id', '=', $tema->id)->get() as $respuestas)
						
						<hr>
						
						<div id="tema-{{ $respuestas->id }}" class="respuesta {{ $respuestas->id }} {{ $respuestas->type }}">
							
							{{ $respuestas->descripcion }}
							
							<p class="meta" style="font-size: 0.8em; margin-top: 0.5em;">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								<strong>{{ $respuestas->profile->first_name }} {{ $respuestas->profile->father_last_name }}</strong>. 
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
								<strong>{{ mi_fecha($respuestas->created_at, true) }} </strong>
								
								@if ($respuestas->profile_id == $teacher->id )
								<a href="{{ route('teacher_advisor_post_edit', array($respuestas->id)) }}" class="btn btn-success btn-xs">Editar</a>
								@endif
							</p>
						</div>
						
						@endforeach
						
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Deja tu respuesta</h3>
					</div>
					<div class="panel-body">
						
						{{ Form::open(array('route' => 'teacher_advisor_post_new', 'method' => 'POST', 'class' => 'form-horizontal')) }}
							
							<input type="hidden" name="title" value="RE: {{ $tema->title }}">
							<input type="hidden" name="tema_id" value="{{ $tema->id }}">
							<input type="hidden" name="subject_id" value="{{ $tema->subject_id }}">
							<input type="hidden" name="respuesta" value="1">
							
							{{--<div class="form-group">
								{{ Form::label('title', 'Asunto', array('class'=>"col-sm-2 control-label") ) }}
								<div class="col-sm-10">
								{{ Form::text('title', null, array('class' => 'form-control') ) }}
								</div>
							</div> --}}
							<div class="form-group">
								{{ Form::label('descripcion', ' ') }}
								<div class="col-sm-12">
								{{ Form::textarea('descripcion', null, array('class' => 'form-control', 'rows' => "3")) }}
								</div>
							</div>
							
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
