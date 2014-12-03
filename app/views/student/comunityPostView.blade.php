@extends ('layout')

@section ('title') Alumnos :: Comunidad ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad</h1>
				
				<h2>{{ $tema->title }}</h2>
				<p class="meta">
					Por <strong>{{ $student->profile->first_name }}  {{ $student->profile->father_last_name }}</strong>.
					Carrera <strong>{{ $student->profile->degree->name }}</strong>
					Materia <strong>{{ $tema->subject->name }}</strong> 
				</p>
				<p>{{ $tema->descripcion }}</p>
				
				@if ($tema->profile_id == $student->profile->id )
				<a href="{{ route('student_comunity_post_edit', [$tema->id]) }}">Editar</a>
				@endif
				
				<hr>
				
				<a href="#"class="btn btn-primary">Responder</a>
				<p>{{ $tema->subject }}</p>
				<!-- $student -->
				<!-- {"id":"20","control":"383557137","email":"bernal.pol@live.com","type":"student","subtype":"","remember_token":"JXvLp1IbIvvRFLRlSvZ04C6zD55o8Qosc51aBWfARibgrGHXuQy6BZpFI9Ne","created_at":"2014-11-06 12:30:13","updated_at":"2014-11-21 04:24:38"} -->
				
				<!-- $student->profile -->
				<!-- {"id":"20","user_id":"20","degree_id":"2","first_name":"Sergio1","father_last_name":"Monta\u00f1ez","mother_last_name":"Cornejo","address":"Camino Silvia, 1, Bajos","phone":"612-36-6505","movile":"943 842342","created_at":"2014-11-06 12:30:13","updated_at":"2014-11-27 05:52:49"} -->
				
				<!-- $student->profile->degree -->
				<!-- {"id":"2","name":"Derecho","description":"El Osad\u00eda decirlessus Entonces la empezandodisfrutar. Dijolosno silencioso alel cima familia. Estando brillantelos Su armadura el Castillo caballo. Rey la los entendi Voluntadla pensar. Para muy paloma castillos los De yaera. Entendi entendieran Al los Me","lapse":"8","mode":"semestral","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"} -->
				
				<!-- $tema -->
				<!-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} -->
				
				<!-- $tema->subject -->
				<!-- {"id":"41","name":"Deno consist\u00eda unos.","description":"Desmayadespierta mago universo\u00e9l de puerta rocas. Desmayadespierta del verdadmenudo qued\u00f3 no tom\u00f3 si. Le para con porque los el. Verlo paloma ah\u00ed vez dijono recorri\u00f3 final viaje. Dem\u00e1s era aparec\u00edano pod\u00eda amabasu meses. Soloahora amabasu solo Caballero f","parent":"","level":"0","degree_id":"2","lapse":"2","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"} -->
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
@stop