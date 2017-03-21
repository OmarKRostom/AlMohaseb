@extends("layout")

@section("content")
	<div class="row">
			@include("admin.includes.pageHeader", [
				"pageHeader" => "Add agent",
				"icon" => "fa fa-plus",
				"description" => "Add agent for your system"
			])
	</div>

	{{ Form::model($agent, ['route' => ['admin.agents.store'], 'method' => 'POST']) }}
		@include("admin.agents._form")
	{{ Form::close() }}
@endsection