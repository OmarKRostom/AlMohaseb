@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Agents",
				"icon" => "fa fa-user-circle",
				"description" => "Manage Agents"
			])
	</div>
	<div class="row">
		<div class="col-xs-12" style="margin-bottom: 25px;">
			<a href="{{route("admin.agents.create")}}" class="btn btn-success col-xs-12"><i class="fa fa-plus"></i>Add agent</a>
		</div>
	</div>
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table table-bordered">
		    <thead>
		      <tr class="alert alert-success">
		      	<th>Name</th>
		        <th>Email</th>
		        <th>Phone</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($agents as $agent)
			      	<tr>
				        <th style="width: 25%;vertical-align: middle;">{{$agent->name}}</th>
				        <th style="width: 25%;vertical-align: middle;">{{$agent->email}}</th>
				        <th style="width: 25%;vertical-align: middle;">{{$agent->phone}}</th>
				        <th style="width: 25%;vertical-align: middle;">
				        	<div class="btn-group">
							 
							  {{Form::open(["route" => ["admin.agents.destroy", $agent->id], "method" => "DELETE"])}}
							    <a type="button" href="{{route("admin.agents.show", $agent->id)}}" class="btn btn-warning">Edit</a>
							  	<button type="submit" class="btn btn-danger">Delete</button>
							  {{Form::close()}}
							</div>
				        </th>
			      </tr>
			    @endforeach
		    </tbody>
		  </table>
		  {{$agents->links()}}
    	</div>
    </div>
@endsection