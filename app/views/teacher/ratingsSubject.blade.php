@extends ('layout')

@section ('title') Calificar por Materia :: Profesor ::  @stop

@section ('content')

				<h1 class="page-header">Control Escolar</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('teacher') }}">Profesor</a></li>
					<li ><a href="{{ route('teacher_ratings') }}">Control Escolar</a></li>
					<li class="active">Calificar Materia</li>
				</ol>
				
				{{ (Input::has('alert_mensaje') ? mensaje_alerta_redirect(Request::get('alert_mensaje'), Request::get('alert_estilo'), Request::get('alert_ico')) : null) }}
				
				<h2>Calificar por Materia</h2>
				
				Matería: {{ $subject->name }}
				Cuatrimestre: {{ $subject->lapse }}
				Carrera: {{ $subject->degree->name }}
				
				
				
				{{ Form::open(array('route' => 'teacher_ratings_subject_save', 'method' => 'POST')) }}
				
				<input type="hidden" name="subject_id" id="subject_id" value="{{ $subject->id }}">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No. Control</th>
							<th>Alumno</th>
							<th>Calificación</th>
							<th>Faltas</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
					
					@foreach ($students as $student)
					
						<tr>
							<td>
								{{ $student->user->control }}
							</td>
							<td>
								{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}
								{{ $errors->first('studet_'.$student->id, '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</td>
							<td>
							@if ( $rating_p = Rating::where('profile_id', $student->id)->where('subject_id', $subject->id)->get()) 
								{{-- {{ $student->id }} / {{ $subject->id }} --}}
							@else
								NA
							@endif
								<div class="col-sm-4">
								<?php
								// $teacherasignatura = Teacherasignatura::where('profile_id', '=', $profile->id)->where('subject_id', '=', $subject->id)->first();
								$calificar = Rating::where('profile_id', '=', $student->id)->where('subject_id', '=', $subject->id)->first();
								?>
								
								@if(! empty($calificar))
									{{-- intval($calificar->rating) --}}
									{{ Form::select('studetRating_'.$student->id, array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10), intval($calificar->rating)); }}
								@else
								
									{{-- Form::checkbox('subject_'.$subject->id, $subject->id) --}}
									{{ Form::select('studetRating_'.$student->id, array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, '10' => 10), 10); }}
								
								@endif
									{{-- {{ Form::text('title', null, array('class' => 'form-control')) }} --}}
									{{-- <input type="number" name="rating_{{ $student->id }}" max="10" class="form-control bfh-number"> --}}
									
								</div>
							</td>
							<td>
								<div class="col-sm-4">
									<input type="number" name="falta_{{ $student->id }}" max="10" class="form-control bfh-number">
								</div>
							</td>
							<td>...</td>
						</tr>
					
					@endforeach
						
					</tbody>
					
				</table>
				
				<button type="subject" class="btn btn-success">Guardar</button>
				
				{{ Form::close() }}
				<hr>
				<pre>Poner un meta en los alumnos para alamcenar los datos extras del perfil, ver quienes mas necesitan agregar mas datos con los metas como las materias o las carreras.</pre>
				{{-- 
				$degree
				{"id":"2","name":"Derecho","description":"El Osad\u00eda decirlessus Entonces la empezandodisfrutar. Dijolosno silencioso alel cima familia. Estando brillantelos Su armadura el Castillo caballo. Rey la los entendi Voluntadla pensar. Para muy paloma castillos los De yaera. Entendi entendieran Al los Me","lapse":"8","mode":"semestral","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"} --}}
				
				{{-- 
				$subject
				{"id":"38","name":"Caballero comenz\u00f3elevarsecuando.","description":"Silencioso soloahora cosas El todoal solo. Al no Caballero al. Coraz\u00f3n veces fue porque el. Sendero: cruzadas dijono verdadmenudo era castillos Conocimiento muy. De damiselas dijo posaba injusto. Clarole loestaban futurolopasase el el m\u00e1s.","parent":"","level":"0","degree_id":"2","lapse":"1","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"}
				$students
				<!-- {"id":"1","user_id":"1","degree_id":"2","first_name":"Rayan","father_last_name":"Maldonado","mother_last_name":"Guajardo","address":"Cami\u00f1o Emma, 873, 3\u00ba A","phone":"934-93-8144","movile":"+34 941-016023","created_at":"2014-11-06 12:30:07","updated_at":"2014-11-06 12:30:07"} -->
				--}}
				<pre>El meta de los alumnos para ponerle el semestre actual</pre>
				
@stop