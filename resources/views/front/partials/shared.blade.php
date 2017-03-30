   <div class="sidebar-widget">
       <h2 class="title-widget-sidebar">// LO MAS COMPARTIDO</h2>
       <div class="content-widget-sidebar">
           <ul>
              @foreach($sharedArticles as $article)
               <li class="recent-post">
                   <div class="post-img">
                       <img src="https://lh3.googleusercontent.com/-ndZJOGgvYQ4/WM1ZI8dH86I/AAAAAAAADeo/l67ZqZnRUO8QXIQi38bEXuxqHfVX0TV2gCJoC/w424-h318-n-rw/thumbnail8.jpg" class="img-responsive"></div>
                   <a href="#">
                       <h5>{{$article->title}}</h5>
                   </a>
                   <p>
                       <small> <i class="fa fa-calendar" data-original-title="" title=""></i>
                           30 Juni 2014
                       </small>
                   </p>
               </li>
               <hr> 
               @endforeach  
           </ul>
       </div>
   </div>