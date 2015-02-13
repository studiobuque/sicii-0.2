@extends ('layout')

@section ('title') Asesor Académico ::  @stop

@section ('content')

				<h1 class="page-header">Asesor Académico</h1>
				
				<h2>Mis Preguntas</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Tema</th>
							<th>Autor</th>
							<th>Materia</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($temas as $tema)
						<tr>
							<td><a href="{{ route('student_partner_post_view', array($tema->id)) }}">{{ $tema->title }}</a></td>
							<td>{{ $tema->profile->first_name }}</td>
							<td>{{ $tema->subject->name }}</td>
						</tr>
						<!-- {"id":"1","tema_id":"0","title":"Nuevo aporte","descripcion":"aqu\u00ed mucho texto","type":"comunity","profile_id":"20","subject_id":"41","degree_id":"2","lapse":"2","created_at":"2014-12-02 02:49:21","updated_at":"2014-12-02 02:49:21"} -->
					@endforeach
					</tbody>
				</table>
					
				{{ $temas->links() }}
					
				
@stop