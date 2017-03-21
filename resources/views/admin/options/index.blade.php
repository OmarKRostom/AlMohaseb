@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Options",
				"icon" => "fa fa-gift",
				"description" => "Manage Options"
			])
	</div>
	@if ($errors->any())
        <div class="alert alert-danger col-xs-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	<div class="row">
		<div class="col-xs-12" style="margin-bottom: 25px;">
			{{Form::open(['route' => ['admin.options.store'], 'method' => 'POST'])}}
			<div style="width: 100%;" class="input-group">
		  		<input type="text" class="form-control" style="width:50%;" name="title">
		  		<select name="product_id" class="form-control" style="width:50%;">
					@foreach($products as $product)
						<option value="{{$product->id}}">{{$product->title}}</option>
					@endforeach
				</select>
				<span style="width: 30%;" class="input-group-btn">
    				<button type="submit" style="width: 100%" class="btn btn-success"><i class="fa fa-plus"></i>Add Option</button>
			  	</span>
			</div>
			{{Form::close()}}
		</div>
	</div>
    <div class="row">
    	<div class="col-xs-12">
    		<table class="table table-bordered">
		    <thead>
		      <tr class="alert alert-success">
		      	<th>#</th>
		      	<th>Title</th>
		        <th>Product</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($options as $option)
			      	<tr>
			      		<th style="width: 20%;vertical-align: middle;">{{$option->id}}</th>
				        <th style="width: 20%;vertical-align: middle;">{{$option->title}}</th>
				        <th style="width: 20%;vertical-align: middle;">{{$option->product->title}}</th>
				        <th style="width: 20%;vertical-align: middle;">
				        	<div class="btn-group">
							 
							  {{Form::open(["route" => ["admin.options.destroy", $option->id], "method" => "DELETE"])}}
							  	<button type="submit" class="btn btn-danger">Delete</button>
							  {{Form::close()}}
							</div>
				        </th>
			      </tr>
			    @endforeach
		    </tbody>
		  </table>
		  {{$options->links()}}
    	</div>
    </div>
@endsection