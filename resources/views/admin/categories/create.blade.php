@extends("admin.layouts.panel")

@section("title","Crear Categorias")

@section("content")

@include("admin.partials.errors")

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">@yield('title')</div>
			  <div class="panel-body">
			{{ Form::open(['route' => 'categories.store',"method"=>"POST"]) }}

				<div class="form-group">
					{{Form::label('name','Nombre')}}
					{{Form::text('name',null, ['class'=>'form-control','placeholder'=>'Nombre Categoría','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('category_id','Categoría Padre')}}
					{{Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Seleccione una opción'] ) }}
				</div>

				<div class="form-group">
					{{Form::submit('Crear',['class'=>'btn btn-success']) }}
				</div>
			{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection