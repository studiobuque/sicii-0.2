@extends ('layout')

@section ('title') Asesor Académico ::  @stop

@section ('content')

				<h1 class="page-header">Asesor Académico</h1>
				
				<h2>Ver las últimas aportaciones</h2>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tema:</th>
							<th>Fecha:</th>
							<th>Materia:</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($temas as $tema)
						<tr>
							<td><a href="{{ route('student_partner_post_view', array($tema->id)) }}">{{ $tema->title }}</a></td>
							<td>{{ mi_fecha($tema->created_at, true) }}</td>
							<td>{{ $tema->subject->name }}</td>
						</tr>
						{{-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} --}}
					@endforeach
					</tbody>
					
				</table>
				
				{{--<a href="{{ route('student_partner_post_list') }}" class="btn btn-default">
					Ver todas mis preguntas
				</a>--}}
				{{ $temas->links() }}
				
				<hr>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Hacer una pregunta</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'student_partner_post_new', 'method' => 'POST')) }}
							<input type="hidden" name="degree_id" value="{{ $student->degree->id }}">
							<input type="hidden" name="respuesta" value="0">
							
							<p>
								<!-- <label>Asunto</label>
								<input type="text" class="form-control"> -->
								{{ Form::label('title', 'Asunto') }}
								{{ Form::text('title', null, array('class' => 'form-control')) }}
								{{ $errors->first('title', '<p class="bg-danger" style="padding: 15px;">:message</p>'); }}
							</p>
							<p>
								<!-- <textarea class="form-control" rows="5"></textarea> -->
								{{ Form::label('descripcion', 'Tu aporte') }}
								{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
								{{ $errors->first('descripcion', '<p class="bg-danger" style="padding: 15px;">:message</p>'); }}
							</p>
							<p>
								
								
							</p>
							<p>
								{{ Form::label('subject_id', 'Elige una materia') }}
								{{ Form::select('subject_id', $student->degree->subjects->lists('name', 'id')) }}
							</p>
							<button type="subject" class="btn btn-success">Enviar</button>
						{{ Form::close() }}
								
					</div>
				</div>
				
@stop


<script>

@section('script') 
			
			<?php tinymce(); ?>
@stop

</script>
