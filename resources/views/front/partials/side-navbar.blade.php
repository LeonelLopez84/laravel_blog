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
                <span class="glyphicon glyphicon-calendar"></span>
            </a>

            <!-- Search body -->
            <div id="search" class="panel-collapse collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="navbar-form" role="search">
                        <div class="form-group fecha-container hidden-xs">
                            <input type="text" id="fecha" class="form-control" value="2017-03-16" data-date-language="es" data-date-format="yyyy-mm-dd" data-date-start-date="-1y" data-date-end-date="0d">
                        </div>    
                        <div class="form-group date-container hidden-sm hidden-md hidden-lg">
                            <input type="date" id="date" class="form-control">
                            <a href="#" class="btn btn-default"><span class="btn glyphicon glyphicon-ok"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Main Menu -->
    <div class="side-menu-container">
        <ul class="nav navbar-nav">

            <li><a href="#"><span class="glyphicon glyphicon-send"></span> Link</a></li>
            <li class="active"><a href="#"><span class="glyphicon glyphicon-plane"></span> Active Link</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

            <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-lvl1" class="" aria-expanded="true">
                    <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-lvl1" class="panel-collapse collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>

                            <!-- Dropdown level 2 -->
                            <li class="panel panel-default" id="dropdown">
                                <a data-toggle="collapse" href="#dropdown-lvl2">
                                    <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
                                </a>
                                <div id="dropdown-lvl2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                            <li><a href="#">Link</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
</div>