<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', '')SICII</title>
	
	<!-- Movile First -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Estilos -->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('css/sistema.css') }}" rel="stylesheet">
</head>
<body>
	
	<!-- Menú de arriba -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('home') }}">SICII</a>
			</div>
			<div class="navbar-collapse collapse">
				@if (  Auth::check() )
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ route('desktop') }}"><span class="glyphicon glyphicon-dashboard"></span> Escritorio</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Opciones <span class="caret"></span></a>
						<!-- <a href="@{{ route('desktop') }}"><span class="glyphicon glyphicon-dashboard"></span> Escritorio</a> -->
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
							<li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
						</ul>
					</li>
					{{--
					<li><a href="{{ route('profile') }}"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
					<li><a href="{{ route('student') }}"><span class="glyphicon glyphicon-cog"></span> Opciones</a></li>
					<li><a href="{{ route('student') }}"><span class="glyphicon glyphicon-exclamation-sign"></span> Ayuda</a></li>
					--}}
				</ul>
				@endif
				<!-- <form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
				</form> -->
			</div>
		</div>
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<!-- Menú lateral -->
			<div class=" col-md-2 sidebar"><!-- col-sm-3 -->
				<ul class="nav nav-sidebar navbar-collapse collapse">
					{{-- Route::currentRouteName() --}}
					{{-- Request::is('alumno/calificaciones') --}}
					
				@if (  Auth::check() )
					
					@if (  Auth::user()->type == 'student')
					<li>
						<a href="{{ route('student') }}" {{(Request::is('alumno') ? 'class="active"' : null)}}>
							Alumno
						</a>
					</li>
					<li>
						<a href="{{ route('student-rating') }}" {{(Request::is('alumno/calificaciones') ? 'class="active"' : null)}}>
							Calificaciones
						</a>
					</li>
					<li>
						<a href="{{ route('student-pay') }}" {{(Request::is('alumno/pagos') ? 'class="active"' : '')}}>
							Pagos
						</a>
					</li>
					<li>
						<a href="{{ route('student-education') }}" {{(Request::is('alumno/educacion') ? 'class="active"' : '')}}>
							Educación Virtual
						</a>
					</li>
					<li>
						<a href="{{ route('student') }}" {{(Request::is('') ? 'class="active"' : '')}}>
							Asesor Académico
						</a>
					</li>
					<li>
						<a href="{{ route('student_ask_comunity') }}" {{(Request::is('alumno/comunidad') ? 'class="active"' : '')}}>
							Comunidad de la educación
						</a>
					</li>
					@endif
					
					
					@if (  Auth::user()->type == 'teacher')
					<li><a href="{{ route('teacher') }}" {{(Request::is('teacher') ? 'class="active"' : '')}}>Escritorio</a></li>
					<li><a href="{{ route('teacher-ratings') }}" {{(Request::is('teacher-ratings') ? 'class="active"' : '')}}>Calificaciónes</a></li>
					<li><a href="{{ route('teacher-education') }}" {{(Request::is('teacher-education') ? 'class="active"' : '')}}>Educación Virtual</a></li>
					<li><a href="{{ route('teacher-advisor') }}" {{(Request::is('teacher-advisor') ? 'class="active"' : '')}}>Asesor Academico</a></li>
					@endif
				
					@if (  Auth::user()->type == 'admin')
					<li><a href="{{ route('desktop') }}" {{(Request::is('administrator_students') ? 'class="active"' : '')}}>Administrador</a></li>
					<li><a href="#" >Control de pagos</a></li>
					<li><a href="#" >Historia de pagos</a></li>
					<li><a href="#" >Configuración</a></li>
					<hr>
					<li><a href="#" >Inscripción de alumnos</a></li>
					<li><a href="#" >Reporte de calificaciones</a></li>
					<li><a href="#" >Ver un alumno</a></li>
					<li><a href="#" >Administrador</a></li>
					<hr>
					<li><a href="#" >Soporte tecnico</a></li>
					<!-- 
					<li><a href="{{ route('administrator_students') }}" {{(Request::is('administrator_students') ? 'class="active"' : '')}}>Alumnos</a></li>
					<li><a href="{{ route('administrator_subjects') }}" {{(Request::is('administrator_subjects') ? 'class="active"' : '')}}>Materias</a></li>
					 -->
					@endif
				@endif
					
				</ul>
			</div>
			
			<!-- Contenido -->
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				ruta [ {{ Request::path() }} ]
				@yield('content')
			</div>
		</div>
	</div>
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
