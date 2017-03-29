<div class="row" id="wrap-block">
    <div class="col-sm-12 col-md-8 col-lg-8" id="main" style="background-image:url({{url('/articles/images/'.$lastArticles[0]->images->first()->name)}})">
        <a href="{{url('articles/'.$lastArticles[0]->slug)}}">{{$lastArticles[0]->title}}</a>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4" id="side">
    	<div class="row">
    		<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 wrap" style="background-image:url({{url('/articles/images/'.$lastArticles[1]->images->first()->name)}})" >
                <a href="{{url('articles/'.$lastArticles[1]->slug)}}">{{$lastArticles[1]->title}}</a>
    		</div>
    		<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 wrap" style="background-image:url({{url('/articles/images/'.$lastArticles[2]->images->first()->name)}})" >    			  
                <a href="{{url('articles/'.$lastArticles[2]->slug)}}">{{$lastArticles[2]->title}}</a>
    		</div>
    	</div>
    </div>
</div>