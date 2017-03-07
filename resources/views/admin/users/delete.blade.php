{{ Form::open(['method' => 'DELETE', 'route' =>['users.destroy', $id],"id"=>"delete-form"]) }}
		
	<button href="#" class="btn btn-danger"><i class="fa fa-trash"></i></button>

{{Form::close()}}