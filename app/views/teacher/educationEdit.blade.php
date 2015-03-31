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
								{{ $errors->first('title', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</p>
							<p>
								{{ Form::label('descripcion', 'Descripcion') }}
								{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
								{{ $errors->first('descripcion', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</p>
							<p>
								{{ Form::label('subject_id', 'Elige una materia') }}
								{{-- Form::select('subject_id', $student->degree->subjects->lists('name', 'id')) --}}
								{{ Form::select('subject_id', array(1 => "Materia1", 2 => "Materia2")) }}
								{{ $errors->first('subject_id', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</p>
							
							<p>
								<a href="https://www.youtube.com/my_live_events?action_create_live_event=1" style="text-decoration:none;" class="btn btn-primary" target="_blank" {{ (!empty($education->url )) ? 'disabled="disabled"' : null ;}}>
									Crear evento en vivo
								</a>
									
								{{-- 
								https://plus.google.com/hangouts/_?gid=205776620907 
									<img src="https://ssl.gstatic.com/s2/oz/images/stars/hangout/1/gplus-hangout-24x100-normal.png" alt="Start a Hangout" style="border:0;height:24px;width:100px;"/>
								--}}
							</p>
							
							<p>
								{{ Form::label('url', 'Enlace') }}
								{{ Form::text('url', null, array('class' => 'form-control')) }}
							</p>
							<p><a href="https://www.youtube.com/live_event_analytics?v={{ $url_embeded = substr($education->url, strpos($education->url, 'youtu.be/') + 9, strlen($education->url)) }}" class="btn btn-primary" target="_blank" {{ (empty($education->url )) ? 'disabled="disabled"' : null ;}}>Entrar a la sala de control</a></p>
							
							
							<button type="subject" class="btn btn-success">Guardar</button>
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

