@extends("layout")

@section("content")
    <div class="row">
            @include("admin.includes.pageHeader", [
                "pageHeader" => "Order #{$order->id}",
                "icon" => "fa fa-truck",
                'description' => ''
            ])
    </div>

    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 25px;">
            <a href="{{route("admin.orders." . $order->type)}}">
                <i class="fa fa-arrow-left"></i> List {{ ucwords($order->type) . ' Orders' }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="text-center">Order Info</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr align="center">
                        <td> <strong>ID #</strong> </td>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr align="center">
                        <td> <strong>Creator</strong> </td>
                        <td>{{ $order->creator->name }}</td>
                    </tr>
                    <tr align="center">
                        <td> <strong>{{ class_basename($order->responsible) }}</strong> </td>
                        <td>{{ $order->responsible->name }}</td>
                    </tr>
                    <tr align="center">
                        <td> <strong>Price</strong> </td>
                        <td>{{ $order->calcualteTotalPrice() }}</td>
                    </tr>
                    <tr align="center">
                        <td> <strong>Date</strong> </td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="text-center">Products List</h3>

            <table class="table table-bordered">
                <thead>
                  <tr class="alert alert-success">
                    <th>#</th>
                    <th>Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Category</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($order->products as $product)
                        <tr>
                            <td style="width: 10%;vertical-align: middle;">{{ $product->id }}</td>
                            <td style="width: 10%;vertical-align: middle;">{{ $product->title }}</td>
                            <td style="width: 10%;vertical-align: middle;">{{ $product->pivot->price }}</td>
                            <td style="width: 10%;vertical-align: middle;">{{ $product->pivot->quantity }}</td>
                            <td style="width: 10%;vertical-align: middle;">
                                {{ floatval($product->pivot->quantity) * $product->pivot->price }}
                            </td>
                            <td style="width: 10%;vertical-align: middle;">{{ $product->category->title }}</td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <h3 class="text-center text-danger">This order doesn't have any products.</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
           
        </div>
    </div>
@endsection