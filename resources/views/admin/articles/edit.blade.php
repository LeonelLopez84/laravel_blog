@extends("admin.layouts.panel")

@section("title","Editar Articulo")

@section("content")

@include("admin.partials.errors")

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">@yield('title')</div>
			  <div class="panel-body">
			{{ Form::open(['route' => ['articles.update',$article->id],"method"=>"PUT",'files'=>true]) }}

				<div class="form-group">
					{{Form::label('title','Titulo')}}
					{{Form::text('title',$article->title, ['class'=>'form-control','placeholder'=>'Título del Articulo','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('category_id','Categorias')}}
					{{Form::select('category_id',$categories, $article->category_id,['class'=>'form-control','placeholder'=>'Seleccione una opción','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('preview','Preview')}}
					{{Form::textarea('preview',$article->preview, ['class'=>'form-control','placeholder'=>'Contenido previo','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('content','Contenido')}}
					{{Form::textarea('content',$article->content, ['class'=>'form-control editor','placeholder'=>'Contenido','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('tags','Tag')}}
					{{Form::select('tags[]',$tags, $selected_tags,['class'=>'form-control select-tag','multiple','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('image','Imagen')}}
					{{Form::file('image')}}
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