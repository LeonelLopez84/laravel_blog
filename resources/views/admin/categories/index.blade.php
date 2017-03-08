@extends("admin.layouts.panel")

@section("title","Lista de Categorías")

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">@yield('title')</div>
  <div class="panel-body">
   
   	<a href="{{route('categories.create')}}" class="pull-right btn btn-success"><i class="fa fa-plus"></i></a>
	<table class="table table-striped">
		<thead>
			<tr><th>#</th>
				<th>Nombre</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>
					@if($category->type=="admin")
						<span class="label label-danger">{{$category->type}}</span>
					@else
						<span class="label label-primary">{{$category->type}}</span>
					@endif
				</td>
				<td>
					<a href="{{route('categories.edit',$category->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						@include("admin.categories.delete",['id'=>$category->id])
					</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $categories->render() }}
  </div>
</div>
@endsection