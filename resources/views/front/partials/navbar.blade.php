<nav class="navbar navbar-default navbar-fixed-top hidden-xs ">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
              @foreach($categories as $k=>$category)
                  @if($category->count() > 0)
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        {{$k}}<span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                      @foreach($category as $cat)
                        @if($cat->articles->count())
                          <li>
                            <a href="{{url('categories/'.$cat->upcategory->name."/$cat->name")}}">
                              <span class="badge"> {{$cat->articles->count()}}</span> 
                                {{$cat->name}}
                              
                            </a>
                          </li>
                        @endif
                      @endforeach
                      </ul>
                    </li>
                  @endif
              @endforeach
          </ul>

          {{ Form::open(['route'=>'home','method'=>'GET','class'=>' navbar-form navbar-right','id'=>'search-form']) }}
      <div class="input-group">
        {{Form::text('search',$search,['class'=>'form-control','placeholder'=>'Buscar Articulo'])}}
        <span class="input-group-btn">
          {{Form::submit('Buscar',['class'=>'btn btn-success']) }}
        </span>
      </div>
    {{Form::close()}}

        </div><!--/.nav-collapse -->
      </div>
    </nav>