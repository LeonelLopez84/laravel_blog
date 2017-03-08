@extends("admin.layouts.panel")

@section("title","Lista de usuarios")

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">@yield('title')</div>
  <div class="panel-body">
   
   	<a href="{{route('users.create')}}" class="pull-right btn btn-success"><i class="fa fa-plus"></i></a>
	<table class="table table-striped">
		<thead>
			<tr><th>#</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Type</th>
				<th colspan="2">Actions</th>
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
				<td>
					<a href="{{route('users.edit',$user->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						@include("admin.users.delete",['id'=>$user->id])
					</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->render() }}
  </div>
</div>
@endsection