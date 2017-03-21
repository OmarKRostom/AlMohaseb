@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Users",
				"icon" => "fa fa-users",
				"description" => "Manage users"
			])
	</div>
	<div class="row">
		<div class="col-xs-12" style="margin-bottom: 25px;">
			<a href="{{route("admin.users.create")}}" class="btn btn-success col-xs-12"><i class="fa fa-plus"></i>Add Users</a>
		</div>
	</div>
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table table-bordered">
		    <thead>
		      <tr class="alert alert-success">
		      	<th>Name</th>
		        <th>Username</th>
		        <th>Type</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($users as $user)
			    	@if($user->id != Auth::user()->id)
			      	<tr>
				        <th style="width: 25%;vertical-align: middle;">{{$user->name}}</th>
				        <th style="width: 25%;vertical-align: middle;">{{$user->username}}</th>
				        <th style="width: 25%;vertical-align: middle;">{{$user->type}}</th>
				        <th style="width: 25%;vertical-align: middle;">
				        	<div class="btn-group">
							 
							  {{Form::open(["route" => ["admin.users.destroy", $user->id], "method" => "DELETE"])}}
							    <a type="button" href="{{route("admin.users.show", $user->id)}}" class="btn btn-warning">Edit</a>
							  	<button type="submit" class="btn btn-danger">Delete</button>
							  {{Form::close()}}
							</div>
				        </th>
			      </tr>
			      @endif
			    @endforeach
		    </tbody>
		  </table>
		  {{$users->links()}}
    	</div>
    </div>
@endsection