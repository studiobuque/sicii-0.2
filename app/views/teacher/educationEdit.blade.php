@extends ('layout')

@section ('title') Profesor :: Educación Virtual ::  @stop

@section ('content')

				<h1 class="page-header">Educación Virtual</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('teacher') }}">Profesor</a></li>
					<li><a href="{{ route('teacher_education') }}">Educación Virtual</a></li>
					<li class="active">Editar "{{ $education->title }}"</li>
				</ol>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Crear una nueva clase virtual</h3>
					</div>
					<div class="panel-body">
						{{-- Form::open(array('route' => 'teacher_education_save', 'method' => 'POST')) --}}
						{{ Form::model($education, array('route' => 'teacher_education_save', 'method' => 'POST')) }}
							<input type="hidden" name="education_id" value="{{ $education->id }}">
							<p>
								{{ Form::label('title', 'Titulo') }}
								{{ Form::text('title', null, array('class' => 'form-control')) }}
							</p>
							<p>
								{{ Form::label('descripcion', 'Descripcion') }}
								{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
							</p>
							<p>
								{{ Form::label('subject_id', 'Elige una materia') }}
								{{-- Form::select('subject_id', $student->degree->subjects->lists('name', 'id')) --}}
								{{ Form::select('subject_id', array(1 => "Materia1", 2 => "Materia2")) }}
							</p>
							
							<p>
								<a href="https://plus.google.com/hangouts/_?gid=205776620907" style="text-decoration:none;" target="_blank">
									<img src="https://ssl.gstatic.com/s2/oz/images/stars/hangout/1/gplus-hangout-24x100-normal.png" alt="Start a Hangout" style="border:0;height:24px;width:100px;"/>
								</a>
							</p>
							
							<p>
								{{ Form::label('url', 'Enlace') }}
								{{ Form::text('url', null, array('class' => 'form-control')) }}
							</p>
							<p><a href="{{ $education->url }}" class="btn btn-primary" target="_blank">Entrar a la clase</a></p>
							
							
							<button type="subject" class="btn btn-primary">Guardar</button>
						{{ Form::close() }}
					</div>
				</div>
				
@stop

<script>

@section('script') 
			tinymce.init({
				selector:"textarea#descripcion",
				plugins: ["link paste anchor preview"],
			});
@stop

</script>

