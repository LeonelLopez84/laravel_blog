<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{$article->title}}</h3>
	</div>
	<div class="panel-body img-body" >
	@foreach($article->images as $img)
		<img src="{{url("/articles/images/$img->name")}}" alt="" class="img-thumbnail img-reponsive">
		@break
	 @endforeach
	</div>
	<div class="panel-footer"><i class="fa fa-folder-open-o"></i>{{$article->category->name}}
		<div class="pull-right"><i class="fa fa-clock-o"></i>{{$article->created_at->diffForHumans()}}</div>
	</div>
</div>