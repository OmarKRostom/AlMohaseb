@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Products",
				"icon" => "fa fa-gift",
				"description" => "Update Product"
			])
	</div>
  <div class="row">
  	<div class="col-xs-12">
  		{!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'PUT']) !!}
  			@include('_errors')
  			@include('admin.products._form', ['product' => $product, 'categories' => $categories])

  			<button class="btn btn-block btn-warning">Save <i class="fa fa-check"></i></button>
  		{!! Form::close() !!}
  	</div>
  </div>
@endsection