<div class="form-group">
	{!! Form::label("name", "Name") !!}
	{!! Form::text("name", $user->name, ["class" => "form-control"]) !!}
	@if($error = $errors->first("name"))
		<div class="alert alert-danger">
	    	{{ $error }}
	  	</div>
	@endif
</div>

<div class="form-group">
	{!! Form::label("username", "Username") !!}
	{!! Form::text("username", $user->username, ["class" => "form-control"]) !!}
	@if($error = $errors->first("username"))
		<div class="alert alert-danger">
	    	{{ $error }}
	  	</div>
	@endif
</div>

<div class="form-group">
	{!! Form::label("type", "Type") !!}
	<select name="type" class="form-control" placeholder="Please select a type role ...">
		@foreach($types as $key => $type)
			<option value="{{$key}}">{{$type}}</option>
		@endforeach
	</select>
	@if($error = $errors->first("type"))
		<div class="alert alert-danger">
	    	{{ $error }}
	  	</div>
	@endif
</div>	

<button class="btn btn-success col-xs-12">Submit</button>