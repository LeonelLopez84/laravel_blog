<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		{{ Form::open(['route'=>'home','method'=>'GET','class'=>'search-form','id'=>'search-form']) }}
			<div class="input-group">
				{{Form::text('search',$search,['class'=>'form-control','placeholder'=>'Buscar Articulo'])}}
				<span class="input-group-btn">
					{{Form::submit('Buscar',['class'=>'btn btn-success']) }}
				</span>
			</div>
		{{Form::close()}}
	</div>
</div>