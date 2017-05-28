<?php

namespace AlMohaseb\Http\Controllers;

use AlMohaseb\Agent;
use AlMohaseb\Payment;
use AlMohaseb\Customer;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function customers()
    {
        $payments = Payment::with('creator')->customers()->latest()->get();

        return view('admin.payments.index', [
            'type'       => 'customer',
            'pageHeader' => 'Customers Payments',
            'receiver'   => 'Customer',
            'payments'   => $payments
        ]);
    }

    public function agents()
    {
        $payments = Payment::with('creator')->agents()->latest()->get();

        return view('admin.payments.index', [
            'type'       => 'agent',
            'pageHeader' => 'Agents Payments',
            'receiver'   => 'Agent',
            'payments'   => $payments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = request()->type;

        if(! in_array($type, ['agent', 'customer'])) {
            return redirect(route('admin.dashboard'));
        }

        if($type === 'customer') {
            $receivers = Customer::pluck('name', 'id');
            $receiversTitle = 'Customers';
            $pageHeader = 'Customer Payment';
            $description = 'Create Customer Payment';
        } else {
            $receivers = Agent::pluck('name', 'id');
            $receiversTitle = 'Agents';
            $pageHeader = 'Agent Payment';
            $description = 'Create Agent Payment';
        }

        $payment = new Payment;

        return view("admin.payments.create", compact('payment', 'type', 'receivers', 'receiversTitle', 'pageHeader', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type'          => ['required', 'in:customer,agent'],
            'amount'        => ['required', 'numeric'],
            'method'        => ['required', 'in:' . join(Payment::getAvailableMethods(), ',')],
            'receivable_id' => ['required', "exists:" . (request()->type === 'customer' ? 'customers' : 'agents') . ",id"],
        ], [], [
            'receivable_id' => (request()->type === 'customer' ? 'Customer' : 'Agent'),
        ]);

        $payment                  = new Payment;
        
        $payment->amount          = $request->amount;
        $payment->method          = $request->method;
        $payment->creator_id      = auth()->id();
        $payment->receivable_id   = $request->receivable_id;
        $payment->receivable_type = ($request->type === 'customer' ? Customer::class : Agent::class);

        $payment->save();

        flash()->overlay('Payment added successfully !', 'Success', 'success');

        return redirect(route('admin.payments.' . str_plural($request->type)));
    }

    /**
     * Display the specified resource.
     *
     * @param  \AlMohaseb\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \AlMohaseb\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \AlMohaseb\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AlMohaseb\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
