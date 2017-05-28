@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Customers",
				"icon" => "fa fa-male",
				"description" => "Manage customers"
			])
	</div>
	<div class="row">
		<div class="col-xs-12" style="margin-bottom: 25px;">
			<a href="{{route("admin.customers.create")}}" class="btn btn-success col-xs-12"><i class="fa fa-plus"></i>Add Customers</a>
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
		        <th>Credit</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($customers as $customer)
			      	<tr>
				        <th style="width: 25%;vertical-align: middle;">{{$customer->name}}</th>
				        <th style="width: 25%;vertical-align: middle;">{{$customer->email}}</th>
				        <th style="width: 25%;vertical-align: middle;">{{$customer->phone}}</th>
				        <th style="width: 10%;vertical-align: middle;">{{$customer->credit}}</th>
				        <th style="width: 25%;vertical-align: middle;">
				        	<div class="btn-group">
							 
							  {{Form::open(["route" => ["admin.customers.destroy", $customer->id], "method" => "DELETE"])}}
							    <a type="button" href="{{route("admin.customers.show", $customer->id)}}" class="btn btn-warning">Edit</a>
							  	<button type="submit" class="btn btn-danger">Delete</button>
							  {{Form::close()}}
							</div>
				        </th>
			      </tr>
			    @endforeach
		    </tbody>
		  </table>
		  {{$customers->links()}}
    	</div>
    </div>
@endsection