<div class="form-group">
	{!! Form::label("name", "Name") !!}
	{!! Form::text("name", $customer->name, ["class" => "form-control"]) !!}
	@if($error = $errors->first("name"))
		<div class="alert alert-danger">
	    	{{ $error }}
	  	</div>
	@endif
</div>

<div class="form-group">
	{!! Form::label("email", "Email") !!}
	{!! Form::text("email", $customer->email, ["class" => "form-control"]) !!}
	@if($error = $errors->first("email"))
		<div class="alert alert-danger">
	    	{{ $error }}
	  	</div>
	@endif
</div>

<div class="form-group">
	{!! Form::label("phone", "Phone") !!}
	{!! Form::text("phone", $customer->phone, ["class" => "form-control"]) !!}
	@if($error = $errors->first("phone"))
		<div class="alert alert-danger">
	    	{{ $error }}
	  	</div>
	@endif
</div>

<button class="btn btn-success col-xs-12">Submit</button>