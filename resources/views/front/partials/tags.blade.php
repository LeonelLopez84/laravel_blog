<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">Tags</h3>
	</div>
	<div class="panel-body">
		<div class="list-group">
			@foreach($tags as $tag)
				<a href="{{url("tags/{$tag->name}")}}" class="label label-info">{{$tag->name}}</a>
			@endforeach
		</div>
	</div>
</div>