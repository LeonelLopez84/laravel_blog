   <div class="sidebar-widget">
       <h2 class="title-widget-sidebar">// LO MAS VISITADO</h2>
       <div class="content-widget-sidebar">
           <ul>
              @foreach($visitedArticles as $article)
               <li class="recent-post">
                   <div class="post-img">
                       <img src="{{url('/articles/images/'.$article->images->first()->name)}}" class="img-responsive"></div>
                   <a href="#">
                       <h5>{{$article->title}}</h5>
                   </a>
                   <p>
                       <small> <i class="fa fa-calendar" data-original-title="" title=""></i>
                           {{$article->created_at->toFormattedDateString() }}
                       </small>
                   </p>
               </li>
               <hr> 
               @endforeach  
           </ul>
       </div>
   </div>