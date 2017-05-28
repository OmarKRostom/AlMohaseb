@extends("layout")

@section("content")
    <div class="row">
            @include("admin.includes.pageHeader", [
                "pageHeader" => $pageHeader,
                "icon" => "fa fa-money",
                "description" => "List Payments"
            ])
    </div>

    <div class="row">
        <div class="col-xs-12" style="margin-bottom: 25px;">
            <a
                href="{{ route("admin.payments.create", compact('type')) }}"
                class="btn btn-success col-xs-12">
                    <i class="fa fa-plus"></i> Add {{ ucwords($type) }} Payment
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered">
            <thead>
              <tr class="alert alert-success">
                <th>#</th>
                <th>Amount</th>
                <th>{{ $receiver }}</th>
                <th>Method</th>
                <th>Creator</th>
                <th>Date</th>
                {{-- <th>Actions</th> --}}
              </tr>
            </thead>
            <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td style="width: 10%;vertical-align: middle;">{{ $payment->id }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $payment->amount }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $payment->receivable->name }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $payment->getMethod() }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $payment->creator->name }}</td>
                        <td style="width: 10%;vertical-align: middle;">{{ $payment->created_at->diffForHumans() }}</td>
                        {{-- <td style="width: 10%;vertical-align: middle;">
                            <a href="{{ route('admin.orders.show', $payment) }}" class="btn btn-primary">
                                View Order
                            </a>
                       </td> --}}
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
          {{-- {{ $payments->links() }} --}}
        </div>
    </div>
@endsection