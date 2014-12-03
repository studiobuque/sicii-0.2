@extends ('layout')

@section ('title') Alumnos :: Comunidad ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad</h1>
				
				
				
				<h2>Editar tema</h2>
				{{-- Form::open(array('route' => 'student_comunity_post_new', 'method' => 'POST')) --}}
				{{ Form::model($tema, array('route' => 'student_comunity_post_save', 'method' => 'POST')) }}
					<!--
					{{ $student->degree->name }}
					{{ $student->degree }}
					-->
					<input type="hidden" name="degree_id" value="{{ $student->degree->id }}">
					<input type="hidden" name="id" value="{{ $tema->id }}">
					
					<p>
						<!-- <label>Asunto</label>
						<input type="text" class="form-control"> -->
						{{ Form::label('title', 'Asunto') }}
						{{-- Form::text('title', null, array('class' => 'form-control', 'disabled' => 'disabled') ) --}}
						{{ Form::text('title', null, array('class' => 'form-control') ) }}
					</p>
					<p>
						<!-- <textarea class="form-control" rows="5"></textarea> -->
						{{ Form::label('descripcion', 'Tu aporte') }}
						{{ Form::textarea('descripcion', null, ['class' => 'form-control']) }}
					</p>
					<p>
						
						
					</p>
					{{-- <p>
						{{ Form::label('subject_id', 'Elige una materia') }}
						{{ Form::select('subject_id', $student->degree->subjects->lists('name', 'id'), array('class' => 'form-control', 'disabled' => 'disabled')) }}
					</p> --}}
					<button type="subject" class="btn btn-primary">Guardar</button>
				{{ Form::close() }}
				
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
@stop