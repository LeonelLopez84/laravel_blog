@extends("admin.layouts.panel")

@section("title","Lista de Tags")

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">@yield('title')</div>
  <div class="panel-body">
   
   	<a href="{{route('tags.create')}}" class="pull-right btn btn-success"><i class="fa fa-plus"></i></a>
	<table class="table table-striped">
		<thead>
			<tr><th>#</th>
				<th>Nombre</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach($tags as $tag)
			<tr>
				<td>{{$tag->id}}</td>
				<td>{{$tag->name}}</td>
				<td>
					@if($tag->type=="admin")
						<span class="label label-danger">{{$tag->type}}</span>
					@else
						<span class="label label-primary">{{$tag->type}}</span>
					@endif
				</td>
				<td>
					<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						@include("admin.tags.delete",['id'=>$tag->id])
					</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $tags->render() }}
  </div>
</div>
@endsection