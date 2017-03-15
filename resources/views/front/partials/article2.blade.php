<div class="post">
	<div class="post-img-content">
		@foreach($article->images as $img)
		<img src="{{url("/articles/images/$img->name")}}" class="img-responsive" />
			@break
		@endforeach
		<span class="post-title"> <b>{{$article->title}}</b>
			<br /> <b>{{$article->category->name}}</b>
		</span>
	</div>
	<div class="content">
		<div class="author text-center">
			<b>{{$article->user->name}}</b> | <time datetime="2014-01-20">{{$article->created_at->diffForHumans()}}</time>
		</div>
		<div class="preview">
			{!! str_limit($article->content,300)!!}
		</div>
		<div>
			<a href="{{route('articles',$article->slug) }}" class="btn btn-warning btn-sm">Read more</a>
		</div>
	</div>
</div>