@extends("admin.layouts.panel")

@section("title","Editar Tag ".$tag->name)

@section("content")
@include("admin.partials.errors")
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">@yield('title')</div>
			  <div class="panel-body">
			{{ Form::open(['route' => ['tags.update',$tag->id],"method"=>"PUT"]) }}

				<div class="form-group">
					{{Form::label('name','Nombre')}}
					{{Form::text('name',$tag->name, ['class'=>'form-control','placeholder'=>'Nombre Completo','required'] ) }}
				</div>

				<div class="form-group pull-right">
					{{Form::submit('Editar',['class'=>'btn btn-primary']) }}
				</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection