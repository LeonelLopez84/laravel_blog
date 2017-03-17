<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="front">
@include('front.partials.navbar')

@include("front.partials.side-navbar")

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 ">
                @include('front.partials.carousel')
                <div class="row">
                    <div class="col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-xs-8 col-sm-8 col-md-8">
                        <hr>
                    </div>
                </div>
                @include("flash::message")
                @yield('content')
                @include('front.partials.footer')
            </div>
        </div>
    </div>


    <!-- Scripts -->
 <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"  ></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"  ></script>
    <script src="{{asset('bower_components/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('bower_components/trumbowyg/dist/trumbowyg.min.js')}}"></script>
    <script src="/js/app.js"></script>
</body>
</html>
