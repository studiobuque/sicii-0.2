@extends ('layout')

@section ('title')Mis Calificaciones ::  @stop

@section ('content')

				<h1 class="page-header">Calificaciones</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('student') }}">Estudiante</a></li>
					<li><a href="{{ route('student_rating') }}">Calificaciones</a></li>
					<li class="active">Todas</li>
				</ol>
				
				<h3 class="text-center">{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}</h3 class="">
				
				<p>Carrera: <strong>{{ $student->degree->name }}</strong> {{ $student->degree->mode }}</p>
				
				<div class="row">
					@if ($lapses_num = $student->degree->lapse / 2) @endif
					<div class="col-xs-6">
					@foreach(range(1, $student->degree->lapse) as $lapse_num)
						<h3>Cuatrimestre {{ $lapse_num }} </h3>
						
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Materia:</th>
									<th>Calif.:</th>
									<th>Faltas:</th>
								</tr>
							</thead>
							<tbody>
								@if ($subjects_lapse = Subject::where('degree_id', $student->degree->id)->where('lapse', $lapse_num)->get() ) @endif
								
								@foreach ($subjects_lapse as $subject_lapse)
								
								@if ($subject_name = $subject_lapse->name) @endif
								
								@if ($rating_p = Rating::where('profile_id', $student->id)->where('subject_id', $subject_lapse->id)->first()) 
								
								<tr>
									<td>{{ $subject_name }}</td>
									<td>{{ $rating_p->rating }}</td>
									<td>0</td>
								</tr>
								
								@else
								
								<tr>
									<td>{{ $subject_name }}</td>
									<td>NA</td>
									<td>0</td>
								</tr>
								
								@endif
								
								@endforeach
							</tbody>
						</table>
						
						@if ($lapse_num == $lapses_num)
						
					</div>
					<div class="col-xs-6">
							
						@endif
						
					@endforeach
					
					</div>
					
				</div>
				
				
				{{-- @if ($student_degree = $student->degree) 
				{{ $student->degree }}
				@endif
				<hr>
				@if($student_rating = $student->rating)
				{{ $student->rating }}
				@endif --}}
				<!-- 
				{"id":"38","name":"Caballero comenz\u00f3elevarsecuando.","description":"Silencioso soloahora cosas El todoal solo. Al no Caballero al. Coraz\u00f3n veces fue porque el. Sendero: cruzadas dijono verdadmenudo era castillos Conocimiento muy. De damiselas dijo posaba injusto. Clarole loestaban futurolopasase el el m\u00e1s.","parent":"","level":"0","degree_id":"2","lapse":"1","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"}
				 -->
@stop