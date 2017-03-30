@extends('front.layouts.app')

@section("title","Blog Laravel")

    @section('breadcrumbs', Breadcrumbs::render('subcategory',$category))
    @section('home_title')
        {{$category->name}}
    @endsection  

@section('content')

@include('front.partials.head_block')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        @yield('breadcrumbs')
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8 col-md-8">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <p class="lead">@yield('home_title')</p>
            </div>
        
        </div>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-xs-12 col-sm-6 col-md-6 col-ld-6">
                    @include('front.partials.article',['article'=>$article])
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-offset-4 col-md-offset-4 col-xs-12 col-sm-4 col-md-4">
                {{ $articles->render() }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-md-4">
        aside
    </div>
</div>


@endsection
