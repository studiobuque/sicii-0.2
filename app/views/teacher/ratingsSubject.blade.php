@extends ('layout')

@section ('title') Profesor :: Calificaciones ::  @stop

@section ('content')

				<h1 class="page-header">{{ $subject->name }}</h1>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Alumno</th>
							<th>Calificación</th>
							<th>Faltas</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($students as $student)
						<tr>
							<td>{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}</td>
							@if ( $rating_p = Rating::where('profile_id', $student->id)->where('subject_id', $subject->id)->get()) @endif
							<td>
								{{ $student->id }} / {{ $subject->id }}
								{{-- $rating_p->first() --}}
							</td>
							{{--{"id":"1","profile_id":"1","subject_id":"38","degree_id":"2","lapse":"1","rating":"9.99","created_at":"2014-11-06 14:56:58","updated_at":"2014-11-06 14:56:58"}--}}
							<td>0</td>
							<td>...</td>
						</tr>
						<!-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} -->
					@endforeach
					</tbody>
					
				</table>
				
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