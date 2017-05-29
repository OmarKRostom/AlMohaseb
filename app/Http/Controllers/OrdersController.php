<?php

namespace AlMohaseb\Http\Controllers;

use AlMohaseb\Agent;
use AlMohaseb\Order;
use AlMohaseb\Product;
use AlMohaseb\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use AlMohaseb\Http\Requests\CreateOrderRequest;

class OrdersController extends Controller
{   
    /**
     * Show the form to create a resource
     * 
     * @return Response 
     */
    public function create()
    {
        $type = request()->type;

        if(! in_array($type, ['selling', 'purchasing'])) {
            return redirect(route('admin.dashboard'));
        }

        $order = new Order;

        $order->id = (DB::table($order->getTable())->select('id')->orderBy('id', 'desc')->first()->id ?? 0) + 1;

        if ($type === 'selling') {
            $responsibles = Customer::pluck('name', 'id');
        } elseif ($type === 'purchasing') {
            $responsibles = Agent::pluck('name', 'id');
        }

        $products = Product::pluck('title', 'id');

        return view("admin.orders.create-{$type}", compact('order', 'type', 'responsibles', 'products'));

        // return redirect(route('admin.dashboard'));
    }

    public function store(CreateOrderRequest $request)
    {
        $order                   = new Order;
        $order->creator_id       = auth()->id();
        $order->responsible_type = ($request->type === 'selling' ? Customer::class : Agent::class);
        $order->responsible_id   = $request->responsible_id;

        $order->save();

        $products = Product::find(array_map(function($p) {
            return $p['productId'];
        }, $request->selected_products));

        $insertedProducts = [];

        foreach($request->selected_products as $key => $product) {
            $theProduct = $products[$key];

            $insertedProducts[$product['productId']] = [
                'quantity' => $product['quantity'],
                'price' => ($request->type === 'selling' ? $theProduct->sellingPrice : $theProduct->buyingPrice)
            ];
        }


        $order->products()->attach($insertedProducts);   

        return response()->json(['message' => 'success']);
    }

    /**
     * Show the specified resource
     * 
     * @param  Order  $order 
     * @return Response        
     */
    public function show(Order $order)
    {
        $order->load('responsible', 'creator', 'products.category');
        return view('admin.orders.show', compact('order'));
    }

    public function selling()
    {
        $orders = Order::with('creator')->selling()->paginate(15);

        foreach ($orders as $order) {
            $order->price = $order->calcualteTotalPrice();
        }

        return view('admin.orders.index', [
            'type'        => 'selling',
            'pageHeader'  => 'Selling Orders',
            'responsible' => 'Customer',
            'orders'      => $orders
        ]);
    }

    public function purchasing()
    {
        $orders = Order::with('creator')->purchasing()->paginate(15);

        foreach ($orders as $order) {
            $order->price = $order->calcualteTotalPrice();
        }

        return view('admin.orders.index', [
            'type'        => 'purchasing',
            'pageHeader'  => 'Purchasing Orders',
            'responsible' => 'Agent',
            'orders'      => $orders
        ]);
    }

}
