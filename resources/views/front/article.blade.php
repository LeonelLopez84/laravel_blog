@extends('front.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-sm-offset-4 col-md-offset-4 col-xs-12 col-sm-4 col-md-4">
                {{ $articles->render() }}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4">
        @include('front.partials.categories')
        @include('front.partials.tags')
    </div>
</div>
@endsection
