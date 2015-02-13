@extends ('layout')

@section ('title') Ver usuarios administradores ::  @stop

@section ('content')
				
				<h1 class="page-header">Usuarios Administradores</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li class="active">Usuarios</li>
				</ol>
				
				<h2>Ver Cuentas</h2>
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Telefono</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach ( $users as $user )
						{{--@foreach (range(1, 4) as $index)--}}
						<tr>
							<td>{{ $user->control }} </td>
							<td>{{ $user->profile->first_name }} {{ $user->profile->father_last_name }} {{ $user->profile->mother_last_name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->profile->phone }}</td>
							<td>
								<a href="{{ route('administrator_user_view', array('id' => $user->id)) }}" class="btn btn-default">
									<!-- <span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
									<span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
								</a>
								<a href="" class="btn btn-default">
									<span class="glyphicon glyphicon-pencil text-primary" aria-hidden="true"></span>
								</a>{{-- route('administrator_subject_edit', array('id' => $subject->id)) --}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
				<hr>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Crear una nueva cuenta</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'administrator_user_new', 'method' => 'POST', 'role' => 'form', 'class'=>'form-horizontal')) }}
						
							<div class="form-group">
								{{ Form::label('first_name', 'Nombre(s)', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::text('first_name', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('father_last_name', 'Apellido Paterno', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::text('father_last_name', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('mother_last_name', 'Apellido Materno', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::text('mother_last_name', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('address', 'Dirección', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::textarea('address', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('phone', 'Telefono', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::text('phone', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('movile', 'Celular', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::text('movile', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('control', 'Numero de Control', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::text('control', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('email', 'Correo Electronico', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::email('email', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="form-group">
								{{ Form::label('password', 'Contraseña', array('class'=>"col-sm-2 control-label")) }}
								<div class="col-sm-10">
								{{ Form::password('password', array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="col-sm-offset-2 col-sm-10">
								{{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
								<!-- <button type="button" class="btn btn-primary">Primary</button> -->
							</div>
							
						{{ Form::close() }}
					</div>
				</div>
				
@stop