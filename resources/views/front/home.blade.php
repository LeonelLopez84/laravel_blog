@extends('front.layouts.app')

@section("title","Blog Laravel")

@section('content')

@include('front.partials.wrap_block')
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8 col-md-8">
        @section('home_title')
            {{trans('app.home_title')}}
        @endsection

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <p class="lead">@yield('home_title')</p>
            </div>
        </div>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-xs-12 col-sm-6 col-md-6 col-ld-6">
                    @include('front.partials.article2',['article'=>$article])
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
        aside
    </div>
</div>

@endsection
