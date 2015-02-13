@extends ('layout')

@section ('title')Ver :: Educación Virtual ::  @stop

@section ('content')

				<h1 class="page-header">Educación Virtual</h1>
				
				<p class="lead">Hola {{ $student->first_name }} aquí puedes ver las clases en vivo.</p>
				
				<!-- <h2>{{ $student->first_name }}</h2> -->
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">{{ $education->title }}</h3>
					</div>
					<div class="panel-body">
						{{ $education->descripcion }}
						<!-- {"id":"1","tema_id":"0","title":"Clase Virtual 1","descripcion":"Editamos una clase virtual","url":"https:\/\/plus.google.com\/hangouts\/_\/g2mklhcnkgmshmctlsi7rmhf5qa","status":"","slug":"","profile_id":"0","subject_id":"2","degree_id":"1","lapse":"1","created_at":"2015-01-14 18:13:42","updated_at":"2015-01-14 18:37:05"} -->
						
						<p><a href="{{ $education->url }}" class="btn btn-success" target="_blank">Entrar a la clase</a></p>
					</div>
				</div>
				
@stop