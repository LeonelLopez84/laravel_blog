<div class="post">
	<div class="post-img-content">
		<img src="{{url("/articles/images/".$article->images->first()->name)}}" class="img-responsive" />
		<span class="post-title"> <b>{{$article->title}}</b>
			<br /> <b>{{$article->category->name}}</b>
		</span>
	</div>
	<div class="content">
		<div class="author text-center">
			<b>{{$article->user->name}}</b> | <time datetime="2014-01-20">{{$article->created_at->diffForHumans()}}</time>
		</div>
		<div class="preview">
			{!! $article->preview!!}
		</div>
		<div>
			<a href="{{route('articles',$article->slug) }}" class="btn btn-warning btn-sm">Read more</a>
		</div>
	</div>
</div>