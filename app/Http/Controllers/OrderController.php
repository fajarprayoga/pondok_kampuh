<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')
        ->with('orderDetail')
        ->get();
        // return dd($orders[0]->orderDetail[0]->pivot);
        return view('order.index', compact('orders'));
    }
}
