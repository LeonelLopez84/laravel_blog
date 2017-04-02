@extends("admin.layouts.panel")

@section("title","Editar Articulo")

@section("content")

@include("admin.partials.errors")

	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default" id="article">
			  <div class="panel-heading">@yield('title')</div>
			  <div class="panel-body">
			{{ Form::open(['route' => ['articles.update',$article->id],"method"=>"PUT",'files'=>true,'id'=>'article']) }}

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
					{{Form::text('tags',  $selected_tags,['class'=>'form-control','required','data-role'=>"tagsinput"] ) }}
				</div>

				<div class="form-group">
					{{Form::label('statu_id','Estatus')}}
					{{Form::select('statu_id',$status,$article->statu_id,['class'=>'form-control','required'] ) }}
				</div>
				<div class="form-group">
					{{Form::label('image','Imagen')}}
					{{Form::file('image',['id'=>$article->id])}}
				</div>
				<div class="form-group">
					<div class="row image-container" >
						@foreach($article->images as $image)
							@include("admin.partials.image",['image',$image])
						@endforeach
					</div>
				</div>
				<div class="form-group">
					{{Form::submit('Actualizar',['class'=>'btn btn-info']) }}
				</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection