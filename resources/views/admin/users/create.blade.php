@extends("layouts.admin")

@section("title","Crear Usuario")

@section("content")
	<div class="row">
		<div class="col-sm-12 col-md-12">
			{{ Form::open(['action' => 'UsersController@store',"method"=>"POST"]) }}

				<div class="form-group">
					{{Form::label('name','Nombre')}}
					{{Form::text('name',null, ['class'=>'form-control','placeholder'=>'Nombre Completo','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('email','Correo Electrónico')}}
					{{Form::email('email',null, ['class'=>'form-control','placeholder'=>'Nuestro Email','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('password','Contraseña')}}
					{{Form::password('password', ['class'=>'form-control','placeholder'=>'***********','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('type','Tipo')}}
					{{Form::select('type',['0'=>'Selecciona','member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control']) }}
				</div>

				<div class="form-group">
					{{Form::submit('Crear',['class'=>'btn btn-success']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection