@extends ('layout')

@section ('title') Alumnos :: Escritorio ::  @stop

@section ('content')
				<h1 class="page-header">Administración</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administración</a></li>
					<li>Inscripción</li>
					<li class="active">Nuevo Alumno</li>
				</ol>
				
				{{-- <p>
					<a href="{{ route('student_comunity_post') }}" class="btn btn-success">Crear nuevo tema</a>
					<a href="{{ route('student_comunity_temas') }}" class="btn btn-default">Ver todos los temas</a>
				</p> --}}
				
				<h2>Inscripción de Alumnos</h2>
				
				<div class="panel panel-default">
					<div class="panel-body">
						{{ Form::open(array('route' => 'administrator_student_inscription', 'method' => 'POST')) }}
							{{-- 
							control
							email
							password
							type = 'student'
							subtype = "escolarizado", "semi", "mixto"
							
							first_name
							father_last_name
							mother_last_name
							address
							phone
							movile
							
							degree_id
							lapse
							 --}}
							<div class="form-group">
								{{ Form::label('control', 'Numero de Control:', array('class'=>"control-label")) }}
								{{ Form::text('control', null, array('class' => 'form-control')) }}
								{{ $errors->first('control', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('first_name', 'Nombre:', array('class'=>"control-label")) }}
								{{ Form::text('first_name', null, array('class' => 'form-control')) }}
								{{ $errors->first('first_name', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('father_last_name', 'Apellido Paterno:', array('class'=>"control-label")) }}
								{{ Form::text('father_last_name', null, array('class' => 'form-control')) }}
								{{ $errors->first('father_last_name', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('mother_last_name', 'Apellido Materno:', array('class'=>"control-label")) }}
								{{ Form::text('mother_last_name', null, array('class' => 'form-control')) }}
								{{ $errors->first('mother_last_name', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('email', 'Correo electrónico:', array('class'=>"control-label")) }}
								{{ Form::text('email', null, array('class' => 'form-control')) }}
								{{ $errors->first('email', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('password', 'Contraseña:', array('class'=>"control-label")) }}
								{{ Form::text('password', null, array('class' => 'form-control')) }}
								{{ $errors->first('password', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('address', 'Dirección:', array('class'=>"control-label")) }}
								{{ Form::textarea('address', null, array('class' => 'form-control')) }}
								{{ $errors->first('address', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('phone', 'Telefono de casa:', array('class'=>"control-label")) }}
								{{ Form::text('phone', null, array('class' => 'form-control')) }}
								{{ $errors->first('phone', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('movile', 'Celular:', array('class'=>"control-label")) }}
								{{ Form::text('movile', null, array('class' => 'form-control')) }}
								{{ $errors->first('movile', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('degree_id', 'Carrera:', array('class'=>"control-label")) }}
								{{ Form::select('degree_id', Degree::lists('name', 'id')) }}
								{{ $errors->first('degree_id', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<div class="form-group">
								{{ Form::label('lapse', 'Cuatrimestre:', array('class'=>"control-label")) }}
								{{ Form::text('lapse', null, array('class' => 'form-control')) }}
								{{ $errors->first('lapse', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<button type="subject" class="btn btn-success">Inscribir</button>
						{{ Form::close() }}
								
					</div>
				</div>
				
@stop