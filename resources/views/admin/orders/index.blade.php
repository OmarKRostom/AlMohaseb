@extends("layout")

@section("content")
    <div class="row">
            @include("admin.includes.pageHeader", [
                "pageHeader" => $pageHeader,
                "icon" => "fa fa-truck",
                "description" => "List Orders"
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
            <a href="{{route("admin.orders.create")}}" class="btn btn-success col-xs-12"><i class="fa fa-plus"></i>Add Order</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered">
            <thead>
              <tr class="alert alert-success">
                <th>#</th>
                <th>Creator</th>
                <th>{{ $responsible }}</th>
                <th>Price</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td style="width: 10%;vertical-align: middle;">{{ $order->id }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $order->creator->name }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $order->responsible->name }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $order->price }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $order->created_at->diffForHumans() }}</td>
                        <td style="width: 10%;vertical-align: middle;">
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-primary">
                                View Order
                            </a>
                       </td>
                  </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <h3 class="text-center text-danger">You have no {{ strtolower($pageHeader) }} right now</h3>
                        </td>
                    </tr>
                @endforelse
            </tbody>
          </table>
          {{ $orders->links() }}
        </div>
    </div>
@endsection