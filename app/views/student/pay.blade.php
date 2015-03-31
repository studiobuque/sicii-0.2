@extends ('layout')

@section ('title')Administración ::  @stop

@section ('content')

				<h1 class="page-header">Administración</h1>
				
				<h2>Ver Pagos</h2>
				
				{{-- Trend\Trend::profilesTrendFull() --}}
				<a href="{{ route('student_pay_send') }}"  class="btn btn-success">Pagar</a>
				
				<hr>
				
				
				{{-- <h3 class="text-center">{{ $student->first_name }} {{ $student->father_last_name }} {{ $student->mother_last_name }}</h3 class="">
				
				<dl class="dl-horizontal">
					<dt>Carrera:</dt>
					<dd>{{ $student->degree->name }}</dd>
				</dl> --}}
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Mis pagos</h2>
					</div>
					<div class="panel-body">
						<h2>No existen datos registrados</h2>
						{{-- <p><a href="{{ route('student_rating_todo') }}">Ver todas las calificaciones</a></p> --}}
					</div>
				</div>
				
@stop