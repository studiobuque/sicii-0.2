@extends ('layout')

@section ('title') Alumnos :: Comunidad ::  @stop

@section ('content')

				<h1 class="page-header">Comunidad</h1>
				
				<h2>{{ $tema->title }}</h2>
				<p class="meta">
					Por <strong>{{ $student->first_name }}  {{ $student->father_last_name }}</strong>.
					Carrera <strong>{{ $student->degree->name }}</strong>
					Materia <strong>{{ $tema->subject->name }}</strong> 
				</p>
				<p>{{{ $tema->descripcion }}}</p>
				
				@if ($tema->profile_id == $student->id )
				<a href="{{ route('student_comunity_post_edit', array('pregunta', $tema->id)) }}" class="btn btn-primary">Editar</a>
				<a href="#" class="btn btn-primary">Cerrar</a> 
				@endif
				
				<hr>
				
				<h3>Respuestas</h3>
				
				
				@foreach (Tema::where('tema_id', '=', $tema->id)->get() as $respuestas)
				
				<div class="respuesta" style="margin-top: 20px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px 4px 0 0; padding: 0.5em 1em;">
					
					<h3>{{ $respuestas->title }}</h3>
					
					<p class="meta">
						Por <strong>{{ $respuestas->profile->first_name }}  {{ $respuestas->profile->father_last_name }}</strong>.
						Carrera <strong>{{ $respuestas->profile->degree->name }}</strong>
						En <strong>{{ $tema->subject->name }}</strong> 
					</p>
					
					<hr>
					
					<p>{{ $respuestas->descripcion }}</p>
					
					<hr>
					
					<h5>Opciones</h5>
					
					@if ($respuestas->profile_id == $student->id )
					<a href="{{ route('student_comunity_post_edit', ['respuesta', $respuestas->id]) }}" class="btn btn-primary">Editar</a>
					@endif
					
				</div>
				
				@endforeach
				
				<hr>
				
				<h3>Deja tu respuesta</h3>
				
				{{ Form::open(array('route' => 'student_comunity_post_new', 'method' => 'POST', 'class' => 'form-horizontal')) }}
					
					<input type="hidden" name="tema_id" value="{{ $tema->id }}">
					<input type="hidden" name="subject_id" value="{{ $tema->subject_id }}">
					<input type="hidden" name="respuesta" value="1">
					
					<div class="form-group">
						{{ Form::label('title', 'Asunto', array('class'=>"col-sm-2 control-label") ) }}
						<div class="col-sm-10">
						{{ Form::text('title', null, array('class' => 'form-control') ) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('descripcion', 'Tu respuesta', array('class'=>"col-sm-2 control-label") ) }}
						<div class="col-sm-10">
						{{ Form::textarea('descripcion', null, array('class' => 'form-control', 'rows' => "3")) }}
						</div>
					</div>
						
					<div class="col-sm-offset-2 col-sm-10">
						<!-- <a href="#"class="btn btn-primary">Responder</a> -->
						<button type="subject" class="btn btn-primary">Responder</button>
					</div>
				
				{{ Form::close() }}
				
				<!-- <p>{{ $tema->subject }}</p> -->
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
				
@stop