@extends("admin.layouts.panel")

@section("title","Lista de Categorías")

@section('content')
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="panel panel-default">
  <div class="panel-heading">@yield('title')</div>
  <div class="panel-body">
   
<a href="{{route('categories.create')}}" class="pull-left btn btn-success"><i class="fa fa-plus"></i></a>

{{ Form::open(['route'=>'categories.index','method'=>'GET','class'=>'navbar-form pull-right']) }}
	<div class="input-group">
		{{Form::text('name',$name,['class'=>'form-control','placeholder'=>'Buscar Categoría'])}}
		<span class="input-group-btn">
			{{Form::submit('Buscar',['class'=>'btn btn-default']) }}
		</span>
	</div>
{{Form::close()}}
	<table class="table table-striped">
		<thead>
			<tr><th>#</th>
				<th>Nombre</th>
				<th>Padre</th>
				<th colspan="3">Actions</th>
			</tr>
		</thead>

		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</td>
				<td>{{ (isset($category->upcategory))?$category->upcategory->name:''}}</td>
				<td>
					<a href="{{route('categories.edit',$category->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
				</td>
				<td>
					@include("admin.categories.delete",['id'=>$category->id])
				</td>
				<td>
					<span class="label {{($category->statu->id==1)?'label-default':'label-success'}}">
				 			{{$category->statu->name}}
					</span>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
  </div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-4 col-md-4 col-lg-4">
{{ $categories->render() }}

	</div>
	</div>
@endsection