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
    <link rel="stylesheet" href="{{asset('bower_components/trumbowyg/dist/ui/trumbowyg.min.css')}}">    
    <link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('https://cdn.datatables.net/buttons/1.2.4/css/buttons.bootstrap.min.css') }}" />


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
<body id="panel">
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
    <script src="{{asset('bower_components/trumbowyg/dist/trumbowyg.min.js')}}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js') }}"></script>
    
	<script src="{{asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
        var table=$('#articles').DataTable( {
            processing: true,
            serverSide: true,
            ajax: {
                url: "articles/api",
                type: "post"
            },

            columns: [
                 { data: "id", name:"articles.id"},
                { data: "title",name:"articles.title"},
                { data: "user", name:"users.name"},
                { data: "padre" ,name:"padres.name"},
                { data: "category", name:"categories.name" },
                { data: "created_at",name:"articles.created_at"},
                { data: "status", name:"status.name"},
                { data: "id",name:"articles.id"}
            ],
             dom:"Blfrtip",
            buttons: [
                    {
                        extend: 'pdf',
                        text: 'Exportar PDF',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    },
                    {   extend: 'excelHtml5',
                        text: 'Exportar a Excel',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }
                ],
            columnDefs: [
             {
                    "render": function (data, type, row) {
                        var label=(data=='Invisible')?'label-default':'label-success';
                        return "<span class='label "+label+"'>"+data+"</span>";
                    },
                    "targets": 6
                },
                {
                    "render": function (data, type, row) {
                        return "<a href='articles/"+data+"/edit' class='btn btn-info'><i class='fa fa-pencil'></i></a>";
                    },
                    "targets": 7
                },
                {
                    "searchable":true,
                    "targets":[1,2,3,4]
                }
            ]
            });
        });    


    </script>

</body>
</html>