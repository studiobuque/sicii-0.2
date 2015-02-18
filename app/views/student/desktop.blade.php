@extends ('layout')

@section ('title') Alumno :: Escritorio ::  @stop

@section ('content')

				<h1 class="page-header">Escritorio </h1>
				
				<h3 class="text-center">{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}</h3 class="">
				
				<dl class="dl-horizontal">
					<dt>Matrícula:</dt>
					<dd>{{ $student->user->control }}</dd>
					<dt>Dirección:</dt>
					<dd>{{ $student->address }}</dd>
					<dt>Teléfono:</dt>
					<dd>{{ $student->phone }}</dd>
					<dt>Carrera:</dt>
					<dd>{{ $student->degree->name }} <small>{{ $student->degree->mode }}</small></dd>
					<dt>Grado:</dt>
					<dd>{{ $student->degree->lapse }}</dd>
					<!-- 
					$student
					{"id":"20","user_id":"20","degree_id":"2","first_name":"Sergio","father_last_name":"Monta\u00f1ez","mother_last_name":"Cornejo","address":"Camino Silvia, 1, Bajos","phone":"612-36-6505","movile":"943 842342","created_at":"2014-11-06 12:30:13","updated_at":"2014-11-27 05:52:49","user":{"id":"20","control":"383557137","email":"bernal.pol@live.com","type":"student","subtype":"","remember_token":"JXvLp1IbIvvRFLRlSvZ04C6zD55o8Qosc51aBWfARibgrGHXuQy6BZpFI9Ne","created_at":"2014-11-06 12:30:13","updated_at":"2014-11-21 04:24:38"}}
					$student->degree
					{"id":"2","name":"Derecho","description":"El Osad\u00eda decirlessus Entonces la empezandodisfrutar. Dijolosno silencioso alel cima familia. Estando brillantelos Su armadura el Castillo caballo. Rey la los entendi Voluntadla pensar. Para muy paloma castillos los De yaera. Entendi entendieran Al los Me","lapse":"8","mode":"semestral","created_at":"2014-11-06 13:18:54","updated_at":"2014-11-06 13:18:54"} -->
				</dl>
				
				<!-- <div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<p>Mensajes</p>
						</div>
					</div>
				</div> -->
				
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h1>
							Educación Virtual
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h1>
							Asesor Académico
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default text-center">
						<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h1>
							Comunidad del Conocimiento
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default text-center">
						<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h1>
							Digital Book
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default text-center">
						<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h1>
							Control Escolar
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default text-center">
						<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h1>
							Administración
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-default text-center">
						<h1><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h1>
							Soporte Técnico
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Últimos Pagos</h2>
						</div>
						<div class="panel-body">
							<p>Mostrar los pagos</p>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Últimas Calificaciones</h2>
						</div>
						<div class="panel-body">
							<p>Mostrar las calificaciones</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Educación Virtual</h2>
						</div>
						<div class="panel-body">
							<ul class="list-unstyled">
							@foreach ($educations as $education)
								<li><a href="{{ route('student_education_view', array($education->id)) }}">{{ $education->title }}</a>, <small>{{ mi_fecha($education->created_at, true) }}</small></li>
							@endforeach
							</ul>
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Asesor Académico</h2>
						</div>
						<div class="panel-body">
							<ul class="list-unstyled">
							@foreach ($partners as $partner)
								<li><a href="{{ route('student_partner_post_view', array($partner->id)) }}">{{ $partner->title }}</a>, <small>{{ mi_fecha($education->created_at, true) }}</small></li>{{----}}
								
								<!-- {"id":"15","tema_id":"0","title":"","descripcion":"
fsdf<\/p>","type":"partner","profile_id":"3","subject_id":"4","degree_id":"2","lapse":"1","created_at":"2015-02-07 01:01:11","updated_at":"2015-02-07 01:01:11"}  -->
							@endforeach
							</ul>
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Comunidad del conocimineto</h2>
						</div>
						<div class="panel-body">
							<ul class="list-unstyled">
							@foreach ($comunitys as $comunity)
							
								<li><a href="{{ route('student_comunity_post_view', array($comunity->id)) }}">{{ $comunity->title }}</a>, <small>{{ mi_fecha($education->created_at, true) }}</small></li>
								
							@endforeach
							</ul>
						</div>
					</div>
				</div>
@stop