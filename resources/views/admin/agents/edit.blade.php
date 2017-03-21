@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Edit agent",
				"icon" => "fa fa-plus",
				"description" => "Edit existing agent in your system"
			])
	</div>

	{{ Form::model($agent, ['route' => ['admin.agents.update', $agent->id], 'method' => 'PUT']) }}
		@include("admin.agents._form")
	{{ Form::close() }}
@endsection