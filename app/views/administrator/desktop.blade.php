@extends ('layout')

@section ('title') Alumnos :: Escritorio ::  @stop

@section ('content')
			@if ( $usuario = "administrador" )
				<h1 class="page-header">Administración</h1>
			@elseif ( $usuario = "control" )
				<h1 class="page-header">Control Escolar</h1>
			@elseif ( $usuario = "soporte" )
				<h1 class="page-header">Soporte Tecnico</h1>
			@endif
				
			@if ( $usuario = "administrador" )
				
				<div class="col-md-6">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Control de págos</h2>
						</div>
						<div class="panel-body">
							
							<h3></h3>
							<li>Recepcion de pagos</li>
							<li>Crear recargos</li>
							<li>Crear descuentos</li>
							<li>Reporte de pagos
								<ul>
									<li>Informe de los deudores</li>
									<li>Informe de los pagos (para facturar)</li>
								</ul>
							</li>
							
						</div>
					</div>
					
				</div>
				
				<div class="col-md-6">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Historial de págos</h2>
						</div>
						<div class="panel-body">
							{{-- <li>Historial de págos</li> --}}
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Configuración</h2>
						</div>
						<div class="panel-body">
							<li>Configuracion de págos</li>
							<li>Configuración de materia</li>
							<li>Configuración de usuarios</li>
							<li>Configuración del servidor</li>
						</div>
					</div>
					
				</div>
				
				<hr>
				
			@endif
			@if ( $usuario = "control" AND $usuario = "administrador" )
				
				{{-- Control Escolar --}}
				
				<div class="col-md-6">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Ver un alumno</h2>
						</div>
						<div class="panel-body">
							<li>Ver un alumno</li>
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Reporte de las calificaciones</h2>
						</div>
						<div class="panel-body">
							<li>Reporte de las calificaciones</li>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-6">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">buscar un alumno</h2>
						</div>
						<div class="panel-body">
							<li>buscar un alumno</li>
						</div>
					</div>
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Inscripción</h2>
						</div>
						<div class="panel-body">
							<li>Inscripción</li>
						</div>
					</div>
				
				</div>
			
			@endif	
			@if ( $usuario = "soporte" AND $usuario = "administrador" )
				
				{{-- Soporte Tecnico --}}
				
				<div class="col-md-6">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Formulaio de soporte</h2>
						</div>
						<div class="panel-body">
							<li>Formulaio de soporte</li>
						</div>
					</div>
				
				</div>
					
			@endif
@stop