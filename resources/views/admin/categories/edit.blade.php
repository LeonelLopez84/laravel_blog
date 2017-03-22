@extends("admin.layouts.panel")

@section("title","Editar Categoría ".$category->name)

@section("content")
@include("admin.partials.errors")
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">@yield('title')</div>
			  <div class="panel-body">
			{{ Form::open(['route' => ['categories.update',$category->id],"method"=>"PUT"]) }}

				<div class="form-group">
					{{Form::label('name','Nombre')}}
					{{Form::text('name',$category->name, ['class'=>'form-control','placeholder'=>'Nombre Completo','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('category_id','Categoría Padre')}}
					{{Form::select('category_id',$categories, $category->category_id,['class'=>'form-control','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('status_id','Estatus')}}
					{{Form::select('status_id',$status,$category->status_id,['class'=>'form-control','required'] ) }}
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