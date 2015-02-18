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
				<a class="navbar-brand" href="{{ route('home') }}">SICII <small>Sistema de Control Interno Institucional</small></a>
			</div>
			<div class="navbar-collapse collapse">
				@if (  Auth::check() )
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span> 
							{{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->father_last_name }}
							<span class="caret"></span>
						</a>
						<!-- <a href="@{{ route('desktop') }}"><span class="glyphicon glyphicon-dashboard"></span> Escritorio</a> -->
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('home') }}"><span class="glyphicon glyphicon-dashboard"></span> Escritorio</a></li>
							<li class="divider"></li>
							<li><a href="{{ route('profile') }}"><span class="glyphicon glyphicon-cog"></span> Editar Perfil</a></li>
							<li><a href="{{-- route('logout') --}}"><span class="glyphicon glyphicon-comment"></span> Soporte Tecnico</a></li>
							<li class="divider"></li>
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
			<div class="col-md-2 sidebar"><!-- col-sm-3 -->
				<ul class="nav nav-sidebar navbar-collapse collapse">
					{{-- Route::currentRouteName() --}}
					{{-- Request::is('alumno/calificaciones') --}}
					
				@if (  Auth::check() )
					
					@if (  Auth::user()->type == 'student')
					<li>
						<a href="{{ route('student') }}" {{(Request::is('alumno') ? 'class="active"' : null)}}>
							Escritorio
						</a>
					</li>
					<li>
						<a href="{{ route('student_rating') }}" {{(Request::is('alumno/calificaciones') ? 'class="active"' : null)}} {{(Request::is('alumno/calificaciones/*') ? 'class="active"' : null)}}>
							Control Escolar
						</a>
					</li>
					<!--
					<li>
						<a href="{{ route('student_pay') }}" {{(Request::is('alumno/pagos') ? 'class="active"' : '')}}>
							Administración
						</a>
					</li>
					-->
					<li>
						<a href="{{ route('student_education') }}" {{(Request::is('alumno/educacion') ? 'class="active"' : '')}} {{(Request::is('alumno/educacion/*') ? 'class="active"' : '')}}>
							Educación Virtual
						</a>
					</li>
					<li>
						<a href="{{ route('student_partner') }}" {{(Request::is('alumno/asesor') ? 'class="active"' : '')}} {{(Request::is('alumno/asesor/*') ? 'class="active"' : '')}}>
							Asesor Académico
						</a>
					</li>
					<li>
						<a href="{{ route('student_comunity') }}" {{(Request::is('alumno/comunidad') ? 'class="active"' : '')}} {{(Request::is('alumno/comunidad/*') ? 'class="active"' : '')}}>
							Comunidad del Conocimiento
						</a>
					</li>
					@endif
					
					
					@if (  Auth::user()->type == 'teacher')
					<li>
						<a href="{{ route('teacher') }}" {{(Request::is('maestro') ? 'class="active"' : '')}}>
							Escritorio
						</a>
					</li>
					<li>
						<a href="{{ route('teacher_ratings') }}" {{(Request::is('maestro/calificacion') ? 'class="active"' : '')}} {{(Request::is('maestro/calificacion/*') ? 'class="active"' : '')}}>
							Control Escolar
						</a>
					</li>
					<li>
						<a href="{{ route('teacher_education') }}" {{(Request::is('maestro/educacion') ? 'class="active"' : '')}} {{(Request::is('maestro/educacion/*') ? 'class="active"' : '')}}>
							Educación Virtual
						</a>
					</li>
					<li>
						<a href="{{ route('teacher_advisor') }}" {{(Request::is('maestro/asesor') ? 'class="active"' : '')}} {{(Request::is('maestro/asesor/*') ? 'class="active"' : '')}}>
							Asesor Academico
						</a>
					</li>
					<li>
						<a href="#">
							Comunidad del Conocimiento
						</a>
					</li>
					@endif
				
					@if (  Auth::user()->type == 'admin')
					<li><a href="{{ route('administrator') }}" {{(Request::is('administrator_students') ? 'class="active"' : '')}}>Administrador</a></li>
					<li><a href="#" >Control de pagos</a></li>
					<li><a href="#" >Historia de pagos</a></li>
					<li><a href="{{ route('administrator_config') }}" {{(Request::is('teacher') ? 'class="active"' : '')}}>Configuración</a></li>
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
				
				<hr>
				<div class="center-block"><img src="{{ asset('img/logotipo-ucil-50.png') }}" class="center-block"></div>
				<p></p>
				<p class="text-center text-muted">
					
					Universidad Científica e Idiomas de América Latina, S.C. <br>
					Tuxtla Gutierrez, Chiapas.
				</p>
			</div>
			
			<!-- Contenido -->
			<div class="col-md-10 col-md-offset-2 main">
				<!-- ruta [ {{ Request::path() }} ] -->
				@yield('content')
				
				<div></div>
			</div>
		</div>
	</div>
	
	
	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<!-- <script src="{{ asset('js/tinymce.min.js') }}"></script> -->
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready( function(){

			@yield('script')
			
		});
	</script>
</body>
</html>
