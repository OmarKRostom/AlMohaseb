@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Products",
				"icon" => "fa fa-gift",
				"description" => "Manage Products"
			])
	</div>
	<div class="row">
		<div class="col-xs-12" style="margin-bottom: 25px;">
			<a href="{{route("admin.products.create")}}" class="btn btn-success col-xs-12"><i class="fa fa-plus"></i>Add Product</a>
		</div>
	</div>
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table table-bordered">
		    <thead>
		      <tr class="alert alert-success">
		      	<th>#</th>
		      	<th>Name</th>
		        <th>Buying Price</th>
		        <th>Selling Price</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($products as $product)
			    	@if($product->id != Auth::product()->id)
			      	<tr>
			      		<th style="width: 20%;vertical-align: middle;">{{$product->id}}</th>
				        <th style="width: 20%;vertical-align: middle;">{{$product->name}}</th>
				        <th style="width: 20%;vertical-align: middle;">{{$product->productname}}</th>
				        <th style="width: 20%;vertical-align: middle;">{{$product->type}}</th>
				        <th style="width: 20%;vertical-align: middle;">
				        	<div class="btn-group">
							 
							  {{Form::open(["route" => ["admin.products.destroy", $product->id], "method" => "DELETE"])}}
							    <a type="button" href="{{route("admin.products.show", $product->id)}}" class="btn btn-warning">Edit</a>
							  	<button type="submit" class="btn btn-danger">Delete</button>
							  {{Form::close()}}
							</div>
				        </th>
			      </tr>
			      @endif
			    @endforeach
		    </tbody>
		  </table>
		  {{$products->links()}}
    	</div>
    </div>
@endsection