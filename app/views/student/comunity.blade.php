@extends ('layout')

@section ('title') Comunidad del Conocimiento ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad del Conocimiento</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Escritorio</a></li>
					<li class="active">Comunidad</li>
				</ol>
				
				{{-- <p>
					<a href="{{ route('student_comunity_post') }}" class="btn btn-success">Crear nuevo tema</a>
					<a href="{{ route('student_comunity_temas') }}" class="btn btn-default">Ver todos los temas</a>
				</p> --}}
				
				<h2>Lista de Temas</h2>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tema</th>
							<th>Participante</th>
							<th>Fecha</th>
							<th>Materia</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($temas as $tema)
						<tr>
							<td>
								<a href="{{ route('student_comunity_post_view', array($tema->id)) }}">
									{{-- $tema->title --}}
									{{ str_limit($tema->title, $limit = 38, $end = ' ...') }}
								</a>
							</td>
							<td>{{ $tema->profile->first_name }} {{ $tema->profile->father_last_name }} {{ $tema->profile->mother_last_name }}</td>
							<td>{{ mi_fecha($tema->created_at, true) }}</td>
							<td>{{ $tema->subject->name }}</td>
						</tr>
						<!-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} -->
					@endforeach
					</tbody>
					
				</table>
				
				{{ $temas->links() }}
				
				{{-- <p>
					<a href="{{ route('student_comunity_post') }}" class="btn btn-success">Crear nuevo tema</a>
					<a href="{{ route('student_comunity_temas') }}" class="btn btn-default">Ver todos los temas</a>
				</p> --}}
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Hacer una nueva aportación</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'student_comunity_post_new', 'method' => 'POST')) }}
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
								
					</div>
				</div>
				
@stop