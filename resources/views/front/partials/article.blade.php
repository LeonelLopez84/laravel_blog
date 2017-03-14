<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><a href="{{url('articles/'.$article->slug) }}">{{$article->title}}</a> </h3>
	</div>
	<div class="panel-body img-body" >
	<a href="{{route('articles',$article->slug) }}">
		@foreach($article->images as $img)
			<img src="{{url("/articles/images/$img->name")}}" alt="" class="img-thumbnail img-reponsive">
			@break
		 @endforeach
	 </a>
	</div>
	<div class="panel-footer">
		<a href="{{url("categories/".$article->category->name)}}"><i class="fa fa-folder-open-o"></i>{{$article->category->name}}</a>
		<div class="pull-right"><i class="fa fa-clock-o"></i>{{$article->created_at->diffForHumans()}}</div>
	</div>
</div>