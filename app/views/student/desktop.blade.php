@extends ('layout')

@section ('title') Alumnos :: Escritorio ::  @stop

@section ('content')

				<h1 class="page-header">Escritorio </h1>
				<h2 class="text-center">{{ $student->first_name }} {{ $student->last_name }}</h2>
				
				<dl class="dl-horizontal">
					<dt>Matrícula</dt>
					<dd>{{ $student->user->control }}</dd>
					<dt>Dirección</dt>
					<dd>{{ $student->address }}</dd>
					<dt>Teléfono</dt>
					<dd>{{ $student->phone }}</dd>
					<dt>Carrera</dt>
					<dd>{{ $student->degree->name }}</dd>
					<!-- 
					$student
					{"id":"20","user_id":"20","degree_id":"2","first_name":"Sergio","father_last_name":"Monta\u00f1ez","mother_last_name":"Cornejo","address":"Camino Silvia, 1, Bajos","phone":"612-36-6505","movile":"943 842342","created_at":"2014-11-06 12:30:13","updated_at":"2014-11-27 05:52:49","user":{"id":"20","control":"383557137","email":"bernal.pol@live.com","type":"student","subtype":"","remember_token":"JXvLp1IbIvvRFLRlSvZ04C6zD55o8Qosc51aBWfARibgrGHXuQy6BZpFI9Ne","created_at":"2014-11-06 12:30:13","updated_at":"2014-11-21 04:24:38"}}
					$student->degree
					{"id":"2","name":"Derecho","description":"El Osad\u00eda decirlessus Entonces la empezandodisfrutar. Dijolosno silencioso alel cima familia. Estando brillantelos Su armadura el Castillo caballo. Rey la los entendi Voluntadla pensar. Para muy paloma castillos los De yaera. Entendi entendieran Al los Me","lapse":"8","mode":"semestral","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"} -->
				</dl>
				
				<div class="col-lg-6">
					<h3>Últimas Calificaciones</h3>
					<p>Mostrar las calificaciones</p>
					<h3>Últimos Pagos</h3>
				</div>
				
				<div class="col-lg-6">
					<h3>Educación Virtual</h3>
					<h3>Asesor Académico</h3>
					<h3>Comunidad de la educación</h3>
				</div>
@stop