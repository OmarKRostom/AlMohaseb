@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Add user",
				"icon" => "fa fa-plus",
				"description" => "Add user for your system"
			])
	</div>

	{{ Form::model($user, ['route' => ['admin.users.store'], 'method' => 'POST']) }}
		@include("admin.users._form")
	{{ Form::close() }}
@endsection