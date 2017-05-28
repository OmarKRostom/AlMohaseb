@extends("layout")

@section("content")
    <div class="row">
            @include("admin.includes.pageHeader", [
                "pageHeader" => $pageHeader,
                "icon" => "fa fa-money",
                "description" => $description
            ])
    </div>
  <div class="row">
    <div class="col-xs-12">
        {!! Form::model($payment, ['route' => 'admin.payments.store', 'method' => 'POST']) !!}
            @include('_errors')
            
            {!! Form::hidden('type', $type) !!}

            <div class="form-group">
                {!! Form::label('amount', 'Amount', ['class' => 'control-label']) !!}
                {!! Form::input('number', 'amount', $payment->amount, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('receivable_id', $receiversTitle, ['class' => 'control-label']) !!}
                {!! Form::select('receivable_id', $receivers, $payment->receivable_id, ['class' => 'form-control']) !!}
            </div>

            <label class="control-label">Payment Method</label>

            @foreach (AlMohaseb\Payment::getAvailableMethods() as $method)
                <div class="radio">
                    <label>
                      {!! Form::radio('method', $method, $payment->method === $method) !!} {{ $payment->getMethod($method) }}
                    </label>
                </div>
            @endforeach


            <button class="btn btn-block btn-primary">Add <i class="fa fa-plus"></i></button>
        {!! Form::close() !!}
    </div>
  </div>
@endsection