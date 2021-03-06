@extends('front.layouts.app')

@section("title","Blog Laravel")

@if(isset($search))
    @section('breadcrumbs', Breadcrumbs::render('search',$search))
    @section('home_title')
       Resultados para "{{$search}}"
    @endsection
@else
    @section('breadcrumbs', Breadcrumbs::render('home'))
    @section('home_title')
       {{trans('app.home_title')}}
    @endsection
@endif

@section('content')

@include('front.partials.head_block',['lastArticles'=>$lastArticles])

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
            <div class="col-sm-offset-3 col-md-offset-3 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                {{ $articles->render() }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-md-4">
       @include("front.partials.visited")
       @include("front.partials.shared")
    </div>
</div>

@endsection
