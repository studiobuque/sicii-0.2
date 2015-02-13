@extends ('layout')

@section ('title') Ver usuarios administradores ::  @stop

@section ('content')
				
				<h1 class="page-header">Usuarios Administradores</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administrador</a></li>
					<li><a href="{{ route('administrator_config') }}">Configuración</a></li>
					<li><a href="{{ route('administrator_user') }}">Usuarios</a></li>
					<li class="active">Ver un administrador</li>
				</ol>
				
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nombre:</label>
						<div class="col-sm-10">
							<p class="form-control-static">{{ $profile->first_name }} {{ $profile->father_last_name }} {{ $profile->mother_last_name }}</p>
							<!-- <input type="text" value="{{ $profile->first_name }} {{ $profile->father_last_name }} {{ $profile->mother_last_name }}" class="form-control"> -->
						</div>
					</div>	
					<div class="form-group">
						<label class="col-sm-2 control-label">Dirección:</label>
						<div class="col-sm-10">
							<textarea class="form-control">{{ $profile->address }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Telefono:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $profile->phone }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Celular:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $profile->movile }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Numero de Control:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $profile->user->control }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Correo: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="{{ $profile->user->email }}">
						</div>
					</div>
				</div>
				
				
				
@stop