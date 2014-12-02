@extends ('layout')

@section ('title') Ver usuarios administradores ::  @stop

@section ('content')


				<h1 class="page-header">Usuarios Administradores</h1>
				
				<h2>Crear una nueva cuenta</h2>
				{{ Form::open(array('route' => 'administrator_user_new', 'method' => 'POST', 'role' => 'form', 'class'=>'form-horizontal')) }}
				
					<div class="form-group">
						{{ Form::label('first_name', 'Nombre(s)') }}
						{{ Form::text('first_name', null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('father_last_name', 'Apellido Paterno') }}
						{{ Form::text('father_last_name', null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('mother_last_name', 'Apellido Materno') }}
						{{ Form::text('mother_last_name', null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('control', 'Numero de Control') }}
						{{ Form::text('control', null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('email', 'Correo Electronico') }}
						{{ Form::email('email', null, array('class' => 'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('password', 'Contraseña') }}
						{{ Form::password('password', array('class' => 'form-control')) }}
					</div>
						{{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
					<!-- <button type="button" class="btn btn-primary">Primary</button> -->
					
				{{ Form::close() }}
				
				<h2>Ver Cuentas</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Telefono</th>
							<th>Ver</th>
						</tr>
					</thead>
					<tbody>
	@foreach (range(1, 4) as $index)
						<tr>
							<td>1111</td>
							<td>Antonio</td>
							<td>usuari@gmail.com</td>
							<td>61 23 4567</td>
							<td>...</td>
						</tr>
	@endforeach
					</tbody>
				</table>
			
			
			

@stop