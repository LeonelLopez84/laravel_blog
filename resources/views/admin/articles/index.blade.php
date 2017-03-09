@extends("admin.layouts.panel")

@section("title","Lista de Articulos")

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">@yield('title')</div>
  <div class="panel-body">
   
   	<a href="{{route('articles.create')}}" class="pull-left btn btn-success"><i class="fa fa-plus"></i></a>

   	{{ Form::open(['route'=>'articles.index','method'=>'GET','class'=>'navbar-form pull-right']) }}
   		<div class="input-group">
   			{{Form::text('title',$title,['class'=>'form-control','placeholder'=>'Buscar tag'])}}
   			<span class="input-group-btn">
   				{{Form::submit('Buscar',['class'=>'btn btn-default']) }}
      		</span>
   		</div>
   	{{Form::close()}}
	<table class="table table-striped">
		<thead>
			<tr><th>#</th>
				<th>Nombre</th>
				<th>Categoría</th>
				<th>User</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach($articles as $article)
			<tr>
				<td>{{$article->id}}</td>
				<td>{{$article->title}}</td>
				<td>{{$article->category->name}}</td>
				<td>{{$article->user->name}}</td>
				<td>
					<a href="{{route('articles.edit',$article->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
					</td>
					<td>
						@include("admin.articles.delete",['id'=>$article->id])
					</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $articles->render() }}
  </div>
</div>
@endsection