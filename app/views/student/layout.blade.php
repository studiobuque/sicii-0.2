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
				<a class="navbar-brand" href="#">SICII</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ route('student') }}"><span class="glyphicon glyphicon-dashboard"></span> Escritorio</a></li>
					<li><a href="{{ route('student') }}"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
					<li><a href="{{ route('student') }}"><span class="glyphicon glyphicon-cog"></span> Opciones</a></li>
					<li><a href="{{ route('student') }}"><span class="glyphicon glyphicon-exclamation-sign"></span> Ayuda</a></li>
				</ul>
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
				<!-- <h4>Escritorio</h4>
				<ul class="nav nav-sidebar">
					<li><a href="">Inicio</a></li><!- -  class="active" - ->
					<li><a href="#">Perfil</a></li>
				</ul>
				<hr> -->
				<ul class="nav nav-sidebar navbar-collapse collapse">
					<li><a href="{{ route('student') }}">Alumno</a></li>
					<li><a href="{{ route('student-rating') }}">Calificacion</a></li>
					<li><a href="{{ route('student-pay') }}">Pagos</a></li>
					<li><a href="{{ route('student-education') }}">Educación Virtual</a></li>
					<li><a href="{{ route('student') }}">Asesor Academico</a></li>
					<li><a href="{{ route('student') }}">Comunidad de la educación</a></li>
				</ul>
			</div>
			
			<!-- Contenido -->
			
			{{ Route::currentRouteName() }}
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
