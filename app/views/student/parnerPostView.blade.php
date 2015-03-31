@extends ('layout')

@section ('title') Asesor Académico ::  @stop

@section ('content')

				<h1 class="page-header">Asesor Académico</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Estudiante</a></li>
					<li><a href="{{ route('student_partner') }}">Asesor</a></li>
					<li class="active">{{ str_limit($tema->title, $limit = 18, $end = ' ...') }}</li>
				</ol>
				
				{{ (Input::has('alert_mensaje') ? mensaje_alerta_redirect(Request::get('alert_mensaje'), Request::get('alert_estilo'), Request::get('alert_ico')) : null) }}
				
				<div class="panel panel-default">
					<div class="panel-heading">
						
						<p class="meta"><!--  style="font-size: 0.8em;" -->
							
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }} &nbsp;
							<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
							{{ mi_fecha($tema->created_at, true) }} &nbsp;
							<!-- Carrera <strong>{{ $tema->degree->name }}</strong> -->
							<span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
							<strong>{{ $tema->subject->name }}</strong> 
							<!-- Periodo <strong>{{ $tema->subject->lapse }}</strong>  -->
						</p>
					</div>
					<div class="panel-body">
						
						<div id="tema-{{ $tema->id }}" class="pregunta {{ $tema->id }} {{ $tema->type }}">
							
							<h2>{{ $tema->title }}</h2>
							
							<p>{{ $tema->descripcion }} </p>
							
							@if ($tema->profile_id == $student->id )
							
							<a href="{{ route('student_partner_post_edit', array('pregunta', $tema->id)) }}" class="btn btn-success">Editar</a>
							<!-- <a href="#" class="btn btn-success">Cerrar</a>  -->
							
							@endif
							
						</div>
						
						@foreach (Tema::where('tema_id', '=', $tema->id)->get() as $respuestas)
						
						<hr>
						
						<div id="tema-{{ $respuestas->id }}" class="respuesta {{ $respuestas->id }} {{ $respuestas->type }}">
							
							<p>{{ $respuestas->descripcion }}</p>
							
							<p class="meta" style="font-size: 0.8em; margin-top: 0.5em;">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								{{ $respuestas->profile->first_name }} {{ $respuestas->profile->father_last_name }}&nbsp;
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
								{{ mi_fecha($respuestas->created_at, true) }}&nbsp;
								
								@if ($respuestas->profile_id == $student->id )
								<a href="{{ route('student_partner_post_edit', array('respuesta', $respuestas->id)) }}" class="btn btn-success btn-xs">Editar</a>
								@endif
								
							</p>
							
							
							{{-- "id":"21","tema_id":"18","title":"","descripcion":"","type":"partner","profile_id":"3","subject_id":"9","degree_id":"1","lapse":"3","created_at":"2015-02-12 23:58:40","updated_at":"2015-02-12 23:58:40","profile":{"id":"3","user_id":"3","degree_id":"1","lapse":"1","first_name":"Eddy","father_last_name":"Ramos","mother_last_name":"Costa","address":"Travesia Mat\u00edas, 1, 7\u00ba 1\u00ba","phone":"997325455","movile":"9611234567","created_at":"2014-11-06 12:30:08","updated_at":"2015-02-07 08:04:02" --}}
						
						</div>
						
						@endforeach
						
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Deja tu respuesta</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'student_partner_post_new', 'method' => 'POST')) }}
							
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
