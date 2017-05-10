@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Products",
				"icon" => "fa fa-gift",
				"description" => "Create Product"
			])
	</div>
  <div class="row">
  	<div class="col-xs-12">
  		{!! Form::model($product, ['route' => 'admin.products.store', 'method' => 'POST']) !!}
  			@include('_errors')
  			@include('admin.products._form', ['product' => $product, 'categories' => $categories])

  			<button class="btn btn-block btn-primary">Add <i class="fa fa-plus"></i></button>
  		{!! Form::close() !!}
  	</div>
  </div>
@endsection