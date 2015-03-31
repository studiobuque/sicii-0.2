@extends ('layout')

@section ('title') Alumnos :: Escritorio ::  @stop

@section ('content')
				<h1 class="page-header">Administración</h1>
				
				<ol class="breadcrumb">
					<li><a href="{{ route('administrator') }}">Administración</a></li>
					<li>Inscripción</li>
					<li class="active">Documentación</li>
				</ol>
				
				{{ (Input::has('alert_mensaje') ? mensaje_alerta_redirect(Request::get('alert_mensaje'), Request::get('alert_estilo'), Request::get('alert_ico')) : null) }}
				
				<h2>Documentación</h2>
				
				<dl class="dl-horizontal">
					<dt>Matrícula:</dt>
					<dd>{{ $user->control }}</dd>
					<dt>Nombre:</dt>
					<dd>{{ $user->profile->first_name }} {{ $user->profile->father_last_name }} {{ $user->profile->mother_last_name }}</dd>
					<dt>Carrera:</dt>
					<dd>{{ $user->profile->degree->name }} <small>{{ $user->profile->degree->mode }}</small></dd>
					<dt>Grado:</dt>
					<dd>{{ $user->profile->lapse }}</dd>
				</dl>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Subir Documentos</h3>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'administrator_student_inscription_documentation_new', 'method' => 'POST', 'files'=>true)) }}
							
							<input type="hidden" name="profile_id" value="{{ $user->profile->id }}">
							
							<div class="form-group">
								{{ Form::label('image', 'Elige un archivo:', array('class'=>"control-label")) }}
								{{ Form::file('image'); }}
								{{ $errors->first('image', '<div class=" alert  alert-danger" role="alert">:message</div>'); }}
							</div>
							
							<button type="subject" class="btn btn-success">Subir</button>
							
						{{ Form::close() }}
								
					</div>
				</div>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Documentos Guardados</h3>
					</div>
					<div class="panel-body">
						
					@if ($user->profile->documents)
						
						<div class="col-xs-6 col-md-3">{{-- id="demoLightbox" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true" --}}
						
						@foreach ($user->profile->documents as $document  )
							
							
							<a href="{{ asset('uploads/documentation') }}/{{ $document->filename }}" class="thumbnail"  data-lightbox="documents">
								<img src="{{ asset('uploads/documentation') }}/{{ $document->filename }}" style="width: 200px; height: 200px;">
								{{-- $document->filename --}}
							</a>
							
							{{-- <div class='lightbox-content'>
								<img src="{{ asset('uploads/documentation') }}/{{ $document->filename }}">
								<div class="lightbox-caption"><p>Your caption here</p></div>
							</div> --}}
							
						@endforeach
						
						</div>{{--  --}}
						
					@endif
								
					</div>
				</div>
				
@stop

@section('cssAsset') 
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
			
@stop

@section('scriptAsset') 
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.js"></script>
	
			
@stop

<script>

@section('script') 
			
			// $('#demoLightbox').lightbox()
			
@stop

</script>
