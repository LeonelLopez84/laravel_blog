@extends("layouts.admin")

@section("title","Crear Usuario")

@section("content")

@include("admin.partials.errors")
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">@yield('title')</div>
			  <div class="panel-body">
			{{ Form::open(['route' => 'users.store',"method"=>"POST"]) }}

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
					{{Form::label('password_confirmation','Confirmar Contraseña')}}
					{{Form::password('password_confirmation', ['class'=>'form-control','placeholder'=>'***********','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('type','Tipo')}}
					{{Form::select('type',[''=>'Selecciona...','member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control']) }}
				</div>

				<div class="form-group pull-right">
					{{Form::submit('Crear',['class'=>'btn btn-success']) }}
				</div>
			{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection