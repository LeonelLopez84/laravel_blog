<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		{{ Form::open(['route'=>'home','method'=>'GET','class'=>'navbar-form']) }}
			<div class="input-group">
				{{Form::text('search',$search,['class'=>'form-control','placeholder'=>'Buscar Categoría'])}}
				<span class="input-group-btn">
					{{Form::submit('Buscar',['class'=>'btn btn-default']) }}
				</span>
			</div>
		{{Form::close()}}
	</div>
</div>