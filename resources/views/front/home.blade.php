@extends('front.layouts.app')

@section("title","Blog Laravel")

@if(isset($padre)) 
    
        @section('breadcrumbs', Breadcrumbs::render('subcategory',$padre,$category->name))
        @section('home_title')
            {{$category->name}}
        @endsection
        
@elseif(isset($search))
    @section('breadcrumbs', Breadcrumbs::render('search',$search))
    @section('home_title')
        {{$search}}
    @endsection
@else
    @section('breadcrumbs', Breadcrumbs::render('home'))
    @section('home_title')
        {{trans('app.home_title')}}
    @endsection
@endif

@section('content')
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            @yield('breadcrumbs')

            <p class="lead">@yield('home_title')</p>
        </div>
    
    </div>
    <div class="row">
        @foreach($articles as $article)
            <div class="col-xs-12 col-sm-6 col-md-4 col-ld-4">
                @include('front.partials.article2',['article'=>$article])
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-offset-4 col-md-offset-4 col-xs-12 col-sm-4 col-md-4">
            {{ $articles->render() }}
        </div>
    </div>

@endsection
