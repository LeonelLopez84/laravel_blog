<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Categorias</h3>
	</div>
	<div class="list-group">
		@foreach($categories as $category)
	  		<a href="{{url("categories/$category->name")}}" class="list-group-item"><span class="badge">{{$category->articles->count()}}</span>{{$category->name}}</a>
	  	@endforeach
	</div>
</div>