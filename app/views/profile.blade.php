@extends ('layout')

@section ('title') Editar los datos ::  @stop

@section ('content')

				<h1>Edita tus datos</h1>
				
				<p>@{{ $profile }}</p>
				
				<p>
				{{ Form::model($profile, ['route' => 'profile_save', 'method' => 'POST', 'role' => 'form', 'class'=>"form-horizontal"]) }}<!-- 'route' => 'profile_update', -->
					
					<!-- <input type="hidden" id="id" name="id" value="{{ $profile->id }}"> -->
					
					@if ( $data = $profile->toArray())
					{{ $data }} 
						{{--@foreach ($data as $key => $value) 
						<p>{{ $key }} = {{ $value }} </p>
						@endforeach  --}}
					@endif
					<div class="form-group">
						{{ Form::label('first_name', 'Nombre(s)', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('first_name', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('father_last_name', 'Apellido Paterno', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('father_last_name', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('mother_last_name', 'Apellido Materno', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('mother_last_name', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('address', 'Dirección', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('address', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('phone', 'Telefono de casa', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('phone', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('movile', 'Celular', array('class'=>'col-sm-2')) }}
						<div class="col-sm-10">
						{{ Form::text('movile', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group ">
						<div class="col-sm-offset-2 col-md-6">
						{{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
						</div>
					</div>
				{{ Form::close() }}
				</p>
				
@stop