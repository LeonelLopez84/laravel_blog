<nav class="navbar navbar-default navbar-fixed-top hidden-xs ">

  <div class="container">
    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <a class="navbar-brand" href="#">
            <img alt="Brand" src="...">
        </a>
    </div>
  </div>

  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>        
  </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{url('/')}}">Home</a></li>
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
          {{Form::text('search',$search,['class'=>'form-control','placeholder'=>'Buscar Articulo','required'=>'required'])}}
          <span class="input-group-btn">
            <button class="btn btn-success"><i class="fa fa-search"></i></button>
          </span>
        </div>
      {{Form::close()}}
      <ul class="nav navbar-nav navbar-right">
          <li><a href=""><i class="fa fa-twitter"></i></a></li>
          <li><a href=""><i class="fa fa-facebook"></i></a></li>
      </ul>
  </div>
  </div>
</nav>