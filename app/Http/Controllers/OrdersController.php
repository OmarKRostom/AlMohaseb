<?php

namespace AlMohaseb\Http\Controllers;

use AlMohaseb\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function selling()
    {
        $orders = Order::with('creator')->selling()->paginate(15);

        foreach ($orders as $order) {
            $order->price = $order->calcualteTotalPrice();
        }

        return view('admin.orders.index', [
            'pageHeader' => 'Selling Orders',
            'responsible' => 'Customer',
            'orders' => $orders
        ]);
    }

    public function purchasing()
    {
        $orders = Order::with('creator')->purchasing()->paginate(15);

        foreach ($orders as $order) {
            $order->price = $order->calcualteTotalPrice();
        }

        return view('admin.orders.index', [
            'pageHeader' => 'Purchasing Orders',
            'responsible' => 'Agent',
            'orders' => $orders
        ]);
    }

}
