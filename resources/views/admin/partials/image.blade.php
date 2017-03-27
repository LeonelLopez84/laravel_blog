<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="panel  panel-default">
			<div class="panel-body" style="background-image: url({{url("/articles/images/".$image->name)}})">
					<button class="btn btn-danger pull-right" name="image-delete" id="{{$image->id}}"> 
						<i class="fa fa-trash"></i>
					</button>
			</div>
			<div class="panel-footer text-center">{{url("/articles/images/".$image->name)}}</div>
		</div>
	</div>
