@extends ('layout')

@section ('title') Escritorio ::  @stop

@section ('content')

				<!-- <h1 class="page-header">Escritorio</h1>
				
				<p class="lead">El uso de los nuevos medios y productos basados en la tecnología digitan, para control administrativo y académico, se hace indispensable en un proyecto de carácter educativo, en este contexto, se utilizara en un 70% para el desarrollo de materiales educativos.</p>
				<p>mientras los textos normales llenan la pantalla</p>
				<p>uso educativo de dispositivos y soportes, que permitan visualizar información académica de forma remota, realizar pagos de colegiaturas en línea, consulta de historial académico y de pagos, disminuyendo la brecha digital y la distancia entre el alumno, el aula y la institución, siendo el maestro la parte insustituible, desde la presencia oportuna antes del periodo de evaluación, hasta la elaboración de materiales de apoyo y seguimiento de proyectos.</p> -->
				
				<div class="col-lg-6">
					<h1 class="page-header">Login</h1>
					
					
					@if (Auth::check())
					
					Hola {{ Auth::user()->profile->first_name}}
					
					<a href="{{ route('logout') }}" class="btn btn-success">Salir</a>
					
					@else
					
					@if (Session::has('login_error'))
					<p class="text-warning">Numero de control o Contraseña no vailda</p>
					@endif
					
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
					
					
					@endif
				</div>
				
				<div class="col-lg-6">
					<!-- <h1 class="page-header">Entrar como</h1>
					<ul>
						<li><a href="{{-- route('student') --}}">Alumnos</a></li>
						<li><a href="{{-- route('teacher') --}}">Maestros</a></li>
						<li><a href="{{-- route('administrator') --}}">Administrativo</a></li>
					</ul> -->
				</div>
				
@stop