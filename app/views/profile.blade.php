@extends ('layout')

@section ('title') Editar los datos ::  @stop

@section ('content')

				<h1 class="page-header">Perfil</h1>
				
				{{ (! empty($alert) ? mensaje_alerta($alert) : null) }}
				
				{{ Form::model($profile, array('route' => 'profile_save', 'method' => 'POST', 'role' => 'form', 'class'=>"form-horizontal")) }}<!-- 'route' => 'profile_update', -->
				
				<h3>Nombre</h3>
					
					<!-- <input type="hidden" id="id" name="id" value="{{ $profile->id }}"> -->
					
					@if ( $data = $profile->toArray())
					{{-- var_dump($data) --}} 
						{{--@foreach ($data as $key => $value) 
						<p>{{ $key }} = {{ $value }} </p>
						@endforeach  --}}
					@endif
					<div class="form-group">
						{{ Form::label('first_name', 'Nombre(s):', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('first_name', null, array('class' => 'form-control', 'disabled')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('father_last_name', 'Apellido Paterno:', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('father_last_name', null, array('class' => 'form-control', 'disabled')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('mother_last_name', 'Apellido Materno:', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('mother_last_name', null, array('class' => 'form-control', 'disabled')) }}
						</div>
					</div>
					
				<h3>Información del Alumno</h3>
				
					<div class="form-group">
						{{ Form::label('address', 'Dirección:', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('address', null, array('class' => 'form-control')) }}
						{{ $errors->first('address', '<p class="bg-danger" style="padding: 0.5em; margin-top: 0.5em;">:message</p>'); }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('phone', 'Telefono de casa:', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('phone', null, array('class' => 'form-control')) }}
						{{ $errors->first('phone', '<p class="bg-danger" style="padding: 0.5em; margin-top: 0.5em;">:message</p>'); }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('movile', 'Celular:', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('movile', null, array('class' => 'form-control')) }}
						{{ $errors->first('movile', '<p class="bg-danger" style="padding: 0.5em; margin-top: 0.5em;">:message</p>'); }}
						</div>
					</div>
				
					<div class="form-group ">
						<div class="col-sm-offset-2 col-md-6">
						{{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
						</div>
					</div>
				
				<h3>Información del Tutor</h3>
					
					<div class="form-group">
						<label class="col-sm-2">Nombre Completo:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2">Dirección:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2">Telefono de casa:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2">Celular:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
				
					<div class="form-group ">
						<div class="col-sm-offset-2 col-md-6">
						{{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
						</div>
					</div>
				
				<h3>Datos de Facturación</h3>
				
					<div class="form-group">
						<label class="col-sm-2">Nombre:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2">RFC:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2">Dirección:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2">Ciudad:</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2">C.P. :</label>
						<div class="col-sm-10">
							<input class="form-control"  type="text">
						</div>
					</div>
					
					
					
					<div class="form-group ">
						<div class="col-sm-offset-2 col-md-6">
						{{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
						</div>
					</div>
				
				{{ Form::close() }}
				
@stop