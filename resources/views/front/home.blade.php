@extends('front.layouts.app')

@section("title","Blog Laravel")

@if(isset($name)) 
    @section('breadcrumbs', Breadcrumbs::render('filtro_name',$name))

    @section('home_title')
        <h3>{{$name}}</h3>
    @endsection

@elseif(isset($search))
    @section('breadcrumbs', Breadcrumbs::render('search',$search))

    @section('home_title')
        <h3>{{$search}}</h3>
    @endsection


@else
    @section('breadcrumbs', Breadcrumbs::render('home'))

    @section('home_title')
        <h3>{{trans('app.home_title')}}</h3>
    @endsection

@endif




@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
               @yield('breadcrumbs')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
               @yield('home_title')
            </div>
        </div>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-xs-12 col-sm-6 col-md-6">
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
    <div class="col-xs-12 col-sm-4 col-md-4">
        @include('front.partials.search')

        @include('front.partials.categories')
        
        @include('front.partials.tags')
    </div>
</div>
@endsection
