@extends("layouts.admin")

@section("title","Editar Usuario ".$user->name)

@section("content")
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">@yield('title')</div>
			  <div class="panel-body">
			{{ Form::open(['route' => ['users.update',$user->id],"method"=>"PUT"]) }}

				<div class="form-group">
					{{Form::label('name','Nombre')}}
					{{Form::text('name',$user->name, ['class'=>'form-control','placeholder'=>'Nombre Completo','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('email','Correo Electrónico')}}
					{{Form::email('email',$user->email, ['class'=>'form-control','placeholder'=>'Nuestro Email','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('password','Contraseña')}}
					{{Form::password('password', ['class'=>'form-control','placeholder'=>'***********'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('type','Tipo')}}
					{{Form::select('type',['0'=>'Selecciona','member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control']) }}
				</div>

				<div class="form-group pull-right">
					{{Form::submit('Editar',['class'=>'btn btn-primary']) }}
				</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection