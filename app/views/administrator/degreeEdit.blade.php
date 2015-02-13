@extends ('layout')

@section ('title') Materias ::  @stop

@section ('content')

				<h1 class="page-header">Materias</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li><a href="{{ route('administrator_subjects') }}">Materias</a></li>
					<li><a href="{{ route('administrator_subjects_list', array($degree->id)) }}">{{ $degree->name }}</a></li>
					<li class="active">Editar Carrera</li>
				</ol>
				
				<p class="lead">Editar la Carrera</p>
				
				@if (!empty($validation))
				{{ $validation }}
				@endif
				<div class="panel panel-default">
					<div class="panel-body">
						{{ Form::model($degree, array('route' => 'administrator_degree_save', 'method' => 'POST', 'class' => 'form-horizontal')) }}
						
						<input type="hidden" name="id" id="id" value="{{ $degree->id }}">
							
							
						<div class="form-group">
							{{ Form::label('name', 'Nombre', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{ Form::text('name', null, array('class' => 'form-control')) }}
							</div>
						</div>
						
						<div class="form-group">
							{{ Form::label('description', 'Descripción', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{ Form::textarea('description', null, array('class' => 'form-control')) }}
							</div>
						</div>
						
						<div class="form-group">
							{{ Form::label('lapse', 'No. de grados', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{ Form::input('number', 'lapse', null, array('class' => 'form-control')) }}
							</div>
						</div>
						
						<div class="form-group">
							{{ Form::label('mode', 'Periodo', array('class'=>"col-sm-2 control-label")) }}
							<div class="col-sm-10">
							{{-- Form::text('mode', null, array('class' => 'form-control', 'disabled' => 'disabled')) --}}
							{{ Form::select('mode', array('Semestral' => 'Semestral',  'Cuatrimestral' => 'Cuatrimestral', 'Trimestral' => 'Trimestral', 'Bimestral' => 'Bimestral'), null, array('class' => 'form-control')) }}
							</div>
						</div>
						
						<div class="col-sm-offset-2 col-sm-10">
							<button type="subject" class="btn btn-primary">Guardar</button>
						</div>
						<!-- <button type="subject" class="btn btn-primary">Guardar</button> -->
						{{ Form::close() }}
					</div>
				</div>

@stop


<script>

@section('script') 
			tinymce.init({
				selector:"textarea#description",
				plugins: ["link paste anchor preview"],
				style_formats: [
					{title: "Bold", icon: "bold", format: "bold"},
					{title: "Italic", icon: "italic", format: "italic"},
					// {title: "Code", icon: "code", format: "code"}
				]
			});
@stop

</script>