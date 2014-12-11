@extends ('layout')

@section ('title') Profesor :: Asesor Académico ::  @stop

@section ('content')

				<h1 class="page-header">Asesor Académico </h1>
				
				<h2>{{ $tema->title }}</h2>
				
				<p class="meta">
					Por <strong>{{ $tema->profile->first_name }} {{ $tema->profile->father_last_name }}</strong>.
					Carrera <strong>{{ $tema->degree->name }}</strong>
					Materia <strong>{{ $tema->subject->name }}</strong> 
					Periodo <strong>{{ $tema->subject->lapse }}</strong> 
				</p>
				
				<p style="margin-top: 20px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px 4px 0 0; padding: 0.5em 1em;">
					{{{ $tema->descripcion }}}
				</p>
				
				<p>
					<!-- <a href="{{ route('student_comunity_post_edit', array('pregunta', $tema->id)) }}" class="btn btn-primary">Responder</a> -->
					<a href="#" class="btn btn-default">Cerrar la pregunta</a> 
				</p>
				
				<hr>
				
				<h3>Respuestas</h3>
				<?php $respuestas = Tema::where('tema_id', '=', $tema->id)->get(); ?>
				@if ($respuestas->first()) 
				
				@foreach (Tema::where('tema_id', '=', $tema->id)->get() as $respuestas)
				
				<div class="respuesta" style="margin-top: 20px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px 4px 0 0; padding: 0.5em 1em;">
					
					<h3>{{ $respuestas->title }}</h3>
					
					<p class="meta">
						Por <strong>{{ $respuestas->profile->first_name }} {{ $respuestas->profile->father_last_name }}</strong>.
						Carrera <strong>{{ $respuestas->degree->name }}</strong>
						Materia <strong>{{ $respuestas->subject->name }}</strong> 
						Periodo <strong>{{ $respuestas->subject->lapse }}</strong>  
					</p>
					
					<hr>
					
					<p>{{ $respuestas->descripcion }}</p>
					
					<hr>
					
					<h5>Opciones</h5>
					
					{{--@if ($respuestas->profile_id == $student->id )
					<a href="{{ route('student_comunity_post_edit', ['respuesta', $respuestas->id]) }}" class="btn btn-primary">Editar</a>
					@endif--}}
					
				</div>
				
				@endforeach
				
				@else
				<div class="respuesta" style="margin-top: 20px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px 4px 0 0; padding: 0.5em 1em;">
					No existen respuestas.
				</div>
				
				@endif
				
				<hr>
				
				<h3>Responder</h3>
				
				
				{{ Form::open(array('route' => 'teacher_advisor_post_new', 'method' => 'POST', 'class' => 'form-horizontal')) }}
					
					<input type="hidden" name="tema_id" value="{{ $tema->id }}">
					<input type="hidden" name="subject_id" value="{{ $tema->subject_id }}">
					<input type="hidden" name="respuesta" value="1">
					
					<div class="form-group">
						{{ Form::label('title', 'Asunto', array('class'=>"col-sm-2 control-label") ) }}
						<div class="col-sm-10">
						{{ Form::text('title', null, array('class' => 'form-control') ) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('descripcion', 'Tu respuesta', array('class'=>"col-sm-2 control-label") ) }}
						<div class="col-sm-10">
						{{ Form::textarea('descripcion', null, array('class' => 'form-control', 'rows' => "3")) }}
						</div>
					</div>
						
					<div class="col-sm-offset-2 col-sm-10">
						<!-- <a href="#"class="btn btn-primary">Responder</a> -->
						<button type="subject" class="btn btn-primary">Responder</button>
					</div>
				
				{{ Form::close() }}
				
				
					<!-- <strong>$tema</strong>
					{{ $tema }}
					<strong>$tema->profile</strong>
					{{ $tema->profile }}
					<strong>$tema->subject</strong>
					{{ $tema->subject }} -->
				
@stop