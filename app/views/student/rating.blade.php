@extends ('layout')

@section ('title')Control Escolar ::  @stop

@section ('content')
				
				<h1 class="page-header">Control Escolar</h1>
				
				<h2>Ver Calificaciones</h2>
				
				<h3 class="text-center">{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}</h3 class="">
				
				<dl class="dl-horizontal">
					<dt>Carrera:</dt>
					<dd><strong>{{ $student->degree->name }}</strong> </dd>
					{{-- <span class="text-capitalize">{{ $student->degree->mode }}</span> --}}
					<dt>Cuatrimestre:</dt>
					<dd><strong>{{ $student->lapse }}</dd>
				</dl>
				
				@if (! empty($calificacion))
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Materia</th>
							<th>Calificación</th>
							<th>Faltas</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($subjects as $subject)
						<tr>
						{{-- $student->degree->subjects --}}
							<td>
								{{-- {{ $subject->id }} -  --}}
								{{ $subject->name }}
							</td>
							<td>
								{{ (! empty( $calificacion[$subject->id]))? $calificacion[$subject->id] : 'N/A'; }}
							</td>
							<td>00</td>
							<td></td>
						</tr>
						
						@endforeach
					</tbody>
					
				</table>
				
				@else
				
				{{-- <h3 class="text-center">{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}</h3 class="">
				
				<dl class="dl-horizontal">
					<dt>Carrera:</dt>
					<dd>{{ $student->degree->name }}</dd>
				</dl>
				
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Calificaciones actuales</h2>
						</div>
						<div class="panel-body">
							<p><a href="{{ route('student_rating_actual') }}">Ver las calificaciones actuales</a></p>
						</div>
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">Todas las calificaciones</h2>
						</div>
						<div class="panel-body">
							<p><a href="{{ route('student_rating_todo') }}">Ver todas las calificaciones</a></p>
						</div>
					</div>
				</div>--}}
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Mis calificaciones</h2>
					</div>
					<div class="panel-body">
						<h2>No existen datos registrados</h2>
						{{-- <p><a href="{{ route('student_rating_todo') }}">Ver todas las calificaciones</a></p> --}}
					</div>
				</div>
				
				@endif
				
				
@stop