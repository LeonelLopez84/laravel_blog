@extends("layouts.admin")

@section("title","Lista de usuarios")

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Usuarios</div>
  <div class="panel-body">
   
   	<a href="{{action('UsersController@create')}}" class="pull-right btn btn-success"><i class="fa fa-plus"></i></a>
	<table class="table table-striped">
		<thead>
			<tr><th>#</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Type</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					@if($user->type=="admin")
						<span class="label label-danger">{{$user->type}}</span>
					@else
						<span class="label label-primary">{{$user->type}}</span>
					@endif
				</td>
				<td><a href="#" class="btn btn-info"><i class="fa fa-pencil"></i></a>
					<a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->render() }}
  </div>
</div>
@endsection