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
		        <th>Category</th>
		        <th>Availble In Stock</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
			    @forelse($products as $product)
			    	<tr>
			      		<td style="width: 10%;vertical-align: middle;">{{ $product->id }}</td>
				        <td style="width: 10%;vertical-align: middle;">{{ $product->title }}</td>
				        <td style="width: 10%;vertical-align: middle;">{{ $product->buyingPrice }}</td>
				        <td style="width: 10%;vertical-align: middle;">{{ $product->sellingPrice }}</td>
				        <td style="width: 10%;vertical-align: middle;">{{ $product->category->title }}</td>
				        <td style="width: 10%;vertical-align: middle;">{{ $product->available_in_stock }}</td>
				        <td style="width: 10%;vertical-align: middle;">
				        	<div class="btn-group">
							 
										{{Form::open(["route" => ["admin.products.destroy", $product->id], "method" => "DELETE"])}}
											<a type="button" href="{{route("admin.products.show", $product->id)}}" class="btn btn-sm btn-warning">Edit</a>
											<button type="submit" class="btn btn-sm btn-danger">Delete</button>
										{{Form::close()}}
									</div>
				       </td>
			      </tr>
			    @empty
			    	<tr>
			    		<td colspan="7">
			    			<h3 class="text-center text-danger">You have no products right now</h3>
			    		</td>
			    	</tr>
			    @endforelse
		    </tbody>
		  </table>
		  {{$products->links()}}
    	</div>
    </div>
@endsection