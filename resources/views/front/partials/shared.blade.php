<div class="sidebar-widget">
  <div class="list-group">
    <a href="#" class="title list-group-item">LO MAS COMPARTIDO</a>
        @foreach($sharedArticles as $article)
          <a class="list-group-item" href="{{route('articles',$article->slug) }}">
            <div class="row">
              <div class="col-xs-4 col-sm-4 col-md-4 thumb" style="background-image:url({{url('/articles/images/'.$article->images->first()->name)}});">
              </div>
              <div class="col-xs-8 col-sm-8 col-md-8">
                <h5>{{$article->title}}</h5>
                <small> <i class="fa fa-calendar" data-original-title="" title=""></i>
                  {{$article->created_at->toFormattedDateString() }}
                </small>
              </div>
            </div>
          </a>
        @endforeach  
    </div>
</div>