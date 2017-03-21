@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Add customer",
				"icon" => "fa fa-plus",
				"description" => "Add customer for your system"
			])
	</div>

	{{ Form::model($customer, ['route' => ['admin.customers.store'], 'method' => 'POST']) }}
		@include("admin.customers._form")
	{{ Form::close() }}
@endsection