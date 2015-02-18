@extends ('layout')

@section ('title') Profesor :: Calificaciones ::  @stop

@section ('content')

				<h1 class="page-header">Calificaciones </h1>
				
				<h3>{{ $degree->name }} <small>{{ $degree->mode }}</small></h3>
				<!-- $degree  {"id":"2","name":"Derecho","description":"El Osad\u00eda decirlessus Entonces la empezandodisfrutar. Dijolosno silencioso alel cima familia. Estando brillantelos Su armadura el Castillo caballo. Rey la los entendi Voluntadla pensar. Para muy paloma castillos los De yaera. Entendi entendieran Al los Me","lapse":"8","mode":"semestral","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"} -->
				
				<div class="row">
					<div class="col-xs-6">
					@foreach(range(1, $degree->lapse) as $lapse_num)
					<h4>Cuatrimestre {{ $lapse_num }}</h4>
						
						<div class="list-group">
						@if ($subjects_lapse = Subject::where('degree_id', $degree->id)->where('lapse', $lapse_num)->get() ) @endif
						@foreach ($subjects_lapse as $subject)
							
							<a href="{{ route('teacher_ratings_subject', array($subject->id)) }}" class="list-group-item">
								{{ $subject->name }}
							</a>
							<!-- 
							$subject
							{"id":"38","name":"Caballero comenz\u00f3elevarsecuando.","description":"Silencioso soloahora cosas El todoal solo. Al no Caballero al. Coraz\u00f3n veces fue porque el. Sendero: cruzadas dijono verdadmenudo era castillos Conocimiento muy. De damiselas dijo posaba injusto. Clarole loestaban futurolopasase el el m\u00e1s.","parent":"","level":"0","degree_id":"2","lapse":"1","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54" -->
							
							
						@endforeach
						
						</div>
						<hr>
						@if ($lapse_num == round($degree->lapse / 2))
					</div>
					<div class="col-xs-6">
						@endif
						
					@endforeach
					</div>
				</div>
				
				{{--
				<div class="row">
					@foreach($degree->subjects as $subjects)
						<li>{{ $subjects->name }}</li>
					@endforeach
				
				
					<p>Luego los alumnos</p>
				</div>--}}
				
				
@stop