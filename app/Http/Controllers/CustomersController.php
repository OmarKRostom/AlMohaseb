<?php

namespace AlMohaseb\Http\Controllers;

use Illuminate\Http\Request;
use AlMohaseb\Customer;
use Validator;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customers = Customer::paginate(15);
        return view("admin.customers.index")->with(compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $customer = new Customer;
        return view("admin.customers.add", compact("customer"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $customer = new Customer;
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.customers.add", compact("customer"))->withErrors($validator);
        } else {
            $customer = Customer::create([
                'name' => request()->name,
                'email' => request()->email,
                'phone' => request()->phone
            ]);

            flash()->overlay('Customer added successfully !', 'Success', 'success');
            return redirect(route("admin.customers.index"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view("admin.customers.edit", compact("customer"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $customer = Customer::find($id);
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/'
        ]);
        //VALIDATION CASES
        if($validator->fails()) {
            return view("admin.customers.edit", compact("customer"))->withErrors($validator);
        } else {
            $customer = Customer::find($id);
            $customer->update([
                'name' => request()->name,
                'email' => request()->email,
                'phone' => request()->phone
            ]);
        }

        flash()->overlay('Customer edited successfully !', 'Success', 'success');
        return redirect(route("admin.customers.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        flash()->overlay('Customer deleted successfully !', 'Success', 'success');
        return redirect(route("admin.customers.index"));
    }
}
