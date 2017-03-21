@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Edit user",
				"icon" => "fa fa-plus",
				"description" => "Edit existing user in your system"
			])
	</div>

	{{ Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) }}
		@include("admin.users._form")
	{{ Form::close() }}
@endsection