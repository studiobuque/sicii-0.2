@extends ('layout')

@section ('title') Comunidad del Conocimiento ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad del Conocimiento</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Estudiante</a></li>
					<li><a href="{{ route('student_comunity') }}">Comunidad</a></li>
					<li class="active">Editar tema: "{{ str_limit($tema->title, $limit = 18, $end = ' ...') }}"</li>
				</ol>
				
				<!-- <h2>Editar tema</h2> -->
					<!--
					{{ $student->degree->name }}
					{{ $student->degree }}
					-->
				
				@if ( $tipo == "pregunta" ) 
				
					<h3>Estas editando una {{ $tipo }}</h3>
					
				{{ Form::model($tema, array('route' => 'student_comunity_post_save', 'method' => 'POST')) }}
					
					<!-- {{ $tema }} -->
					<input type="hidden" name="degree_id" value="{{ $student->degree->id }}">
					<input type="hidden" name="id" id="id" value="{{ $tema->id }}">
					
				@elseif ( $tipo == "respuesta" )
				
					<h3>Estas editando una {{ $tipo }}</h3>
				
				<!-- {{ Form::open(array('route' => 'student_comunity_post_save', 'method' => 'POST')) }} -->
				{{ Form::model($tema, array('route' => 'student_comunity_post_save', 'method' => 'POST')) }}
						
					{{-- $tema --}}
					<input type="hidden" name="id" id="id" value="{{ $tema->id }}">
					<input type="hidden" name="tema_id" value="{{ $tema->tema_id }}">
					<input type="hidden" name="subject_id" value="{{ $tema->subject_id }}">
					<input type="hidden" name="respuesta" value="1">
					
					
				@endif
					
					<p>
						<!-- <label>Asunto</label>
						<input type="text" class="form-control"> -->
						{{ Form::label('title', 'Asunto') }}
						{{ $errors->first('title', '<p class="bg-danger" style="padding: 15px;">:message</p>'); }}
						{{-- Form::text('title', null, array('class' => 'form-control', 'disabled' => 'disabled') ) --}}
						{{ Form::text('title', null, array('class' => 'form-control') ) }}
					</p>
					<p>
						<!-- <textarea class="form-control" rows="5"></textarea> -->
						{{ Form::label('descripcion', 'Tu aporte') }}
						{{ $errors->first('descripcion', '<p class="bg-danger" style="padding: 15px;">:message</p>'); }}
						{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
					</p>
					<p>
						
						
					</p>
					{{-- <p>
						{{ Form::label('subject_id', 'Elige una materia') }}
						{{ Form::select('subject_id', $student->degree->subjects->lists('name', 'id'), array('class' => 'form-control', 'disabled' => 'disabled')) }}
					</p> --}}
					<button type="subject" class="btn btn-success">Guardar</button>
				{{ Form::close() }}
				
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
@stop


<script>

@section('script') 
			tinymce.init({
				selector:"textarea#descripcion",
				plugins: ["link paste anchor preview"],
			});
@stop

</script>
