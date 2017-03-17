<div class="side-menu hidden-sm hidden-md hidden-lg">
    
    <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <div class="brand-wrapper">
            <!-- Hamburger -->
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Brand -->
            <div class="brand-name-wrapper">
                <a class="navbar-brand" href="#">
                    jueves 16 de marzo de 2017                </a>
            </div>

            <!-- Search -->
            <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger" aria-expanded="true">
                <span class="glyphicon glyphicon-search"></span>
            </a>

            <!-- Search body -->
            <div id="search" class="panel-collapse collapse" aria-expanded="true">
                <div class="panel-body">
                    <div class="navbar-form" role="search">
                        <div class="form-group date-container hidden-sm hidden-md hidden-lg">

                         {{ Form::open(['route'=>'home','method'=>'GET','class'=>' navbar-form navbar-right','id'=>'search-form']) }}
                          <div class="input-group">
                            {{Form::text('search',$search,['class'=>'form-control','placeholder'=>'Buscar Articulo'])}}
                            <span class="input-group-btn">
                            <button class="btn btn-default"><span class="btn glyphicon glyphicon-ok"></span></button>
                            </span>
                          </div>
                        {{Form::close()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">

            <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>

            @foreach($categories as $k=>$category)
                @if($category->count())
                    <li class="panel panel-default" id="dropdown">
                        <a data-toggle="collapse" href="#{{$k}}" class="collapse" aria-expanded="false">
                            <span class="glyphicon glyphicon-tag"></span> {{$k}} <span class="caret"></span>
                        </a>

                    <div id="{{$k}}" class="panel-collapse collapse" aria-expanded="false">
                        <div class="panel-body">
                            <ul class="nav navbar-nav">
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
                        </div>
                    </div>
                </li>
                @endif
            @endforeach
             <li><a href="#"><span class="fa fa-envelope"></span>   Contactanos</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

            <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
</div>