@extends ('layout')

@section ('title') Materias ::  @stop

@section ('content')

				<h1 class="page-header">Configurar Materias</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li><a href="{{ route('administrator_subjects') }}">Materias</a></li>
					<li><a href="{{ route('administrator_subjects_list', array($degree->id)) }}">{{ $degree->name }}</a></li>
					<li class="active">Lista</li>
				</ol>
				
				<h2>Datos de la Carrera de {{ $degree->name }}</h2>
				<!-- 
				{{ $degree->id }}
				{{ $degree->name }}
				{{ $degree->mode }}
				{{ $degree->lapse }}
				{{ $degree->description }}
				 -->
				 
				<li>
					Carrera: <strong>{{ $degree->name }}</strong> {{ $degree->mode }}
				</li>
				<li>
					No. de Periodos: <strong>{{ $degree->lapse }}</strong>
				</li>
				{{-- $subjects->first() --}}
				
				 <h2>Lista de Materias</h2>
				 
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Periodo</th>
							{{-- <th>$degree->mode</th> --}}
							<th><!-- Opciones --></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($subjects as $subject)
						<tr>
							<td class="text-capitalize">
								{{ $subject->name }}
							</td>
							<td>
								{{-- $subject->description --}}
								{{ str_limit($subject->description, $limit = 60, $end = '...') }}
							</td>
							<td>
								{{ $subject->lapse }}
							</td>
							<!-- <td>
								{{ @$subject->degree->name }}
							</td> -->
							<td>
								<a href="{{ route('administrator_subject', array('id' => $subject->id)) }}" class="btn btn-default">
									<!-- <span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
									<span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
								</a>
								<a href="{{ route('administrator_subject_edit', array('id' => $subject->id)) }}" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
				{{ $subjects->links() }}
				
				<hr>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Crear una nueva Materia</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'administrator_subjects_save', 'method' => 'POST', 'class' => 'form-horizontal')) }}
							
							<input type="hidden" name="degree_id" id="degree_id" value="{{ $degree->id }}">
							<input type="hidden" name="id" id="id" value="false">
							
							<div class="form-group">
								{{ Form::label('name', 'Nombre', array('class'=>"col-sm-2 control-label") ) }}
								<div class="col-sm-10">
								{{ Form::text('name', null, array('class' => 'form-control') ) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('description', 'Descripción', array('class'=>"col-sm-2 control-label") ) }}
								<div class="col-sm-10">
								{{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => "3")) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('lapse', 'Grado', array('class'=>"col-sm-2 control-label") ) }}
								<div class="col-sm-10">
								{{-- Form::text('lapse', null, array('class' => 'form-control', 'rows' => "3")) --}}
								{{ Form::input('number', 'lapse', null, array('class' => 'form-control')) }}
								</div>
							</div>
							
						<div class="form-group">
							{{ Form::label('mode', 'Periodo', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{-- Form::text('mode', null, array('class' => 'form-control')) --}}
							{{ Form::select('mode', array('Semestral' => 'Semestral',  'Cuatrimestral' => 'Cuatrimestral', 'Trimestral' => 'Trimestral', 'Bimestral' => 'Bimestral'), null, array('class' => 'form-control')) }}
							</div>
						</div>
						
								
							<div class="col-sm-offset-2 col-sm-10">
								<!-- <a href="#"class="btn btn-primary">Responder</a> -->
								<button type="subject" class="btn btn-primary">Responder</button>
							</div>
						
						{{ Form::close() }}
					</div>
				</div>
				

@stop

<script>

@section('script') 
			$('[data-toggle="tooltip"]').tooltip()
@stop

</script>



