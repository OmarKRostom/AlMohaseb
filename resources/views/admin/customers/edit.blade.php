@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Edit customer",
				"icon" => "fa fa-plus",
				"description" => "Edit existing customer in your system"
			])
	</div>

	{{ Form::model($customer, ['route' => ['admin.customers.update', $customer->id], 'method' => 'PUT']) }}
		@include("admin.customers._form")
	{{ Form::close() }}
@endsection