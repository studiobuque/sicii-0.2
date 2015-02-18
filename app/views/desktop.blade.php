@extends ('layout')

@section ('title') Escritorio ::  @stop

@section ('content')

				<h1 class="page-header">Login</h1>
				
				<div class="col-lg-6">
					
					@if (Auth::check())
					{{ $profiles }}
					
					Hola {{ Auth::user()->profile->first_name}}
					
					<a href="{{ route('logout') }}" class="btn btn-success">Salir</a>
					
					@else
					
					{{ Form::open( array('route' => 'login', 'method' => 'POST', 'role' => 'form')) }}
						<div class="form-group">
							{{ Form::text('control', null, array('class' => 'form-control', 'placeholder' => 'Control' )) }}
						</div>
						<div class="form-group">
							{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
						</div>
						<div class="form-group">
							<!-- <input type="checkbox"> Remember me -->
							{{ Form::checkbox('remember') }} Recuerdame
							<!-- <button type="submit" class="btn btn-success">Entrar</button> -->
							{{ Form::submit('Entrar', array('class' => 'btn btn-default')) }}
						</div>
					{{ Form::close() }}
					
					@if (Session::has('login_error'))
					<div class="alert alert-danger" role="alert">Numero de control o Contraseña no vailda</div>
					@endif
					
					
					@endif
				</div>
				
				<div class="col-lg-6">&nbsp;</div>
				<div style="clear:both;"></div>
				
@stop