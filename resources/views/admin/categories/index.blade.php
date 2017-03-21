@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Categories",
				"icon" => "fa fa-list-alt",
				"description" => "Manage categories"
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
			{{Form::open(['route' => ['admin.categories.store'], 'method' => 'POST'])}}
			<div style="width: 100%;" class="input-group">
		  		<input type="text" class="form-control" style="width:100%;" name="title">
				<span style="width: 25%;" class="input-group-btn">
    				<button type="submit" style="width: 100%" class="btn btn-success"><i class="fa fa-plus"></i>Add Category</button>
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
		      	<th>Name</th>
		        <th>Actions</th>
		      </tr>
		    </thead>
		    <tbody>
			    @foreach($categories as $category)
			      	<tr>
			      		<th style="width: 33%;vertical-align: middle;">{{$category->id}}</th>
				        <th style="width: 33%;vertical-align: middle;">{{$category->title}}</th>
				        <th style="width: 33%;vertical-align: middle;">
				        	<div class="btn-group">
							 
							  {{Form::open(["route" => ["admin.categories.destroy", $category->id], "method" => "DELETE"])}}
							  	<button type="submit" class="btn btn-danger">Delete</button>
							  {{Form::close()}}
							</div>
				        </th>
			      </tr>
			    @endforeach
		    </tbody>
		  </table>
		  {{$categories->links()}}
    	</div>
    </div>
@endsection