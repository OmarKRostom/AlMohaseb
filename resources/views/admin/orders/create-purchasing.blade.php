@extends("layout")

@section("content")
    <div class="row">
        @include("admin.includes.pageHeader", [
            "pageHeader" => "Create Purchasing Order #{$order->id}",
            "icon" => "fa fa-truck",
            "description" => ""
        ])
    </div>
  <div class="row">
    <div class="col-xs-12">
        <create-order
            :responsibles="{{ $responsibles->toJson() }}"
            :products="{{ $products->toJson() }}"
            type="{{ $type }}"
            create-order-url="{{ route('admin.orders.store') }}"
            redirect-to="{{ route('admin.orders.' . $type) }}"
            ></create-order>
    </div>
  </div>
@endsection