@extends ('layout')

@section ('title') Control Escolar :: Profesor ::  @stop

@section ('content')

				<h1 class="page-header">Control Escolar</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('teacher') }}">Profesor</a></li>
					<li class="active">Control Escolar</li>
				</ol>
				
				<h3>Selecciona una materia</h3>
				
				<div class="list-group">
				@foreach ($asignar as $subject_asign)
					
					{{-- {{ $subject_asign }} --}}
					{{-- {{ $subject_asign->subject->name }} --}}
						{{-- {"id":"2","name":"Clasificaci\u00f3n internacional del Funcionamiento de la discapacidad y de la salud CIF","description":"","parent":"","level":"0","degree_id":"1","lapse":"1","created_at":"2015-01-16 02:16:56","updated_at":"2015-01-16 02:16:56"} --}}
					<a href="{{ route('teacher_ratings_subject', array($subject_asign->subject->id)) }}" class="list-group-item">
						{{ $subject_asign->subject->name }}
					</a>
					
				@endforeach
				</div>
				
				{{--
				<div class="row">
					@foreach($degree->subjects as $subjects)
						<li>{{ $subjects->name }}</li>
					@endforeach
				
				
					<p>Luego los alumnos</p>
				</div>--}}
				
				
@stop