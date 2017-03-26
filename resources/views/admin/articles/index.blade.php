@extends("admin.layouts.panel")

@section("title","Lista de Articulos")

@section('content')
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="panel panel-default">
  <div class="panel-heading">@yield('title')</div>
  <div class="panel-body">
   
   	<a href="{{route('articles.create')}}" class="pull-left btn btn-success"><i class="fa fa-plus"></i></a>

   
	<table class="table table-striped" id="articles">
		<thead>
			<tr><th>id</th>
				<th>Nombre</th>
				<th>User</th>
				<th>UpCategory</th>
				<th>Category</th>
				<th>Estatus</th>
				<th>Created</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			
		</tbody>
	</table>
	
  </div>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-4 col-md-4 col-lg-4">
	{{ $articles->render() }}
</div>
</div>
@endsection