<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Default') | Panel de Administración</title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('bower_components/chosen/chosen.css')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
@include('admin.partials.nav')
<div class="container-fluid" id="body">
    <div class="container">
        @include("flash::message")
	   @yield('content')
	</div>
</div>
<footer class="footer">
@include('admin.partials.footer')
</footer>
	<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"  ></script>
    <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"  ></script>
    <script src="{{asset('bower_components/chosen/chosen.jquery.js')}}"></script>
	<script src="{{asset('js/app.js') }}"></script>
</body>
</html>