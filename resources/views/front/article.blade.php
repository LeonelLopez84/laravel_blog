@extends('front.layouts.app')

@section("title",$article->title)
 
@section('breadcrumbs',Breadcrumbs::render('post',$article->title))

@section('content')

<div class="row">
    
    <div class="col-xs-12 col-sm-8 col-md-8 section">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                   @yield('breadcrumbs')
                </div>
            </div>
        </div>
    </div>
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12">
	            <div class="panel">
					<div class="panel-heading">
						<h1>{{$article->title}}</h1>
					</div>
					<div class="panel-body img-body" >
						<p class="text-right">Por:<a href="https://twitter.com/{{$article->user->twitter_user}}">{{$article->user->twitter_user}}</a></p>
						<p class="text-right">{{$article->created_at->format('l jS \\of F Y')}}</p>
						@foreach($article->images as $img)
							<img src="{{url("/articles/images/$img->name")}}" alt="" class="img-thumbnail img-reponsive">
							@break
						 @endforeach
						 <blockquote>
							{!! $article->content !!}
						</blockquote>
					</div>
				</div>
			</div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div id="disqus_thread"></div>
			<script>

			/**
			*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
			/*
			var disqus_config = function () {
			this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
			this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			};
			*/
			(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://blog-laravel-2.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                
            </div>
        </div>
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12">
        		<p class="lead">De tu interes</p>
        	</div>
        </div>
        <div class="row related">

				@foreach($related as $relate)
	                <div class="col-xs-12 col-sm-4 col-md-4">
	                   @include('front.partials.article',['article'=>$relate])
	                </div>
            	@endforeach
	
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
    	@include('front.partials.search')
        @include('front.partials.categories')
        @include('front.partials.tags')
    </div>
</div>

@endsection

