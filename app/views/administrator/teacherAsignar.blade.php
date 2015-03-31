@extends ('layout')

@section ('title') Profesores ::  @stop

@section ('content')
				
				<h1 class="page-header">Asignar Materia a profesor</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li><a href="{{ route('administrator_teacher') }}">Profesores</a></li>
					<li class="active">Asignar Materia</li>
				</ol>
				
				{{ (Input::has('alert_mensaje') ? mensaje_alerta_redirect(Request::get('alert_mensaje'), Request::get('alert_estilo'), Request::get('alert_ico')) : null) }}
				
				<h2>Asignar Materia</h2>
				
				Profesor 
				
				{{ $profile->first_name }} {{ $profile->father_last_name }} {{ $profile->mother_last_name }}
				
				<!-- {"id":"2","user_id":"2","degree_id":"3","first_name":"Iker","father_last_name":"Villanueva","mother_last_name":"Bustos","address":"Carrer Oliv\u00e1rez, 15, 3\u00ba 7\u00ba","phone":"+34 613 018966","movile":"+34 662-84-0207","created_at":"2014-11-06 12:30:07","updated_at":"2014-11-06 12:30:07"} -->
				
				<hr>
				
				<h3>Lista de materias </h3>
				{{ Form::open(array('route' => 'administrator_teacher_asignar_save', 'method' => 'POST',)) }}
				
				<input type="hidden" name="profile_id" value="{{ $profile->id }}">
				
				@foreach ($degrees as $degree)
				
				<h3>Carrera: {{ $degree->name }}</h3>
				
					@foreach ($degree->subjects as $subject)
					
					<p>
						{{--<input type="checkbox" value="" id="{{ $subject->id }}" class="materiaCheck" datos='{{ json_encode(array( 
									"subject_id" => $subject->id,
									"profile_id" => $profile->id,  
									"degree_id" => $degree->id, 
									"lapse" => $subject->lapse,
								 )) }}'> --}}
						
						<label>
						<?php
						$teacherasignatura = Teacherasignatura::where('profile_id', '=', $profile->id)->where('subject_id', '=', $subject->id)->first();
						?>
						
						@if(! empty($teacherasignatura))
							@if($teacherasignatura->status === 'true')
								
						{{ Form::checkbox('subject_'.$subject->id, $subject->id, true );}}
							
							@else
							
						{{ Form::checkbox('subject_'.$subject->id, $subject->id);}}
								
							@endif
						 	({{ $teacherasignatura->status }}) - 
						
						@else
						
						{{ Form::checkbox('subject_'.$subject->id, $subject->id);}}
						
						@endif
						
						
						Cuatrimestre: {{ $subject->lapse }} 
						Materia: {{ $subject->name }}
						</label>
						
					</p>
				
					@endforeach
				
				@endforeach
				
				
							<button type="subject" class="btn btn-success">Guardar</button>
							
						{{ Form::close() }}
				{{-- 
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Carrera</th>
							<th>Periodo</th>
							<th>Materia</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
				Carrera: 
				@foreach ($degrees as $degree)
					@foreach ($degree->subjects as $subject)
						<tr>
							<td>{{ $degree->id }} / {{ $degree->name }}</td>
							<td>{{ $subject->lapse }}</td>
							<td>{{ $subject->id }} / {{ $subject->name }}</td>
							<td>
								<input type="checkbox" value="" id="{{ $subject->id }}" class="materiaCheck" datos='{{ json_encode(array( 
									"subject_id" => $subject->id,
									"profile_id" => $profile->id,  
									"degree_id" => $degree->id, 
									"lapse" => $subject->lapse,
								)) }}'>
								<div class="mensaje_{{ $subject->id }}"></div>
							</td>
						</tr>
					@endforeach
				
				@endforeach
				
					</tbody>
				</table>
				 --}}
				<p id="mensajes"></p>
				
				
@stop

<script type="text/javascript">
@section ('script')

			/*$(".materiaCheck").click( function(e){
				id = e.currentTarget.id
				datos = $("#"+ id).attr('datos');
				check = $("#"+ id)[0].checked;
				console.log(check);
			
				$.ajax({
					url: "{{ route('administrator_teacher_asignar_save') }}",
					type: "POST",
					data: { profile_id: {{ $profile->id }}, history: datos, status : check },
					beforeSend: function() {
						console.log('Se manda el ajax');
						$(".mensaje_" + id).html('<p class="text-primary">S</p>')
					},
					error: function(e) {
						// console.log(e.responseText);
						$(".mensaje_" + id).html('<p class="text-primary">E</p>')
						$("#mensajes").html('<p class="text-primary">' + e.responseText + '</p>')
					},
					success: function(e) {
						console.log(e);
						$(".mensaje_" + id).html('<p class="text-success">G</p>')
						$("#mensajes").html('<p>' + e + '</p>')
					},
			
				});
			});*/
@stop
</script>




