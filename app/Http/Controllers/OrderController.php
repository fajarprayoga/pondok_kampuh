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
        ->latest()
        ->get();
        // return dd($orders[0]->orderDetail[0]->pivot);
        return view('order.index', compact('orders'));
    }

     // notif order
     public function notif_order($id)
     {
         $order = Order::findOrFail($id)->update([
             'notif' => 'NOTNEW'
           ]);
         // return $order->notif;
     }

     public function status_order($id, Request $request)
     {
        $order = Order::findOrFail($id)->update([
            'status' => $request->status
        ]);

        if($order){
            return redirect()->back()->with('success', 'Order status is updated');
        }else{
            return redirect()->back()->with('danger', 'Order status is not updated');
        }
     }

     public function destroy($id)
     {
         $order = Order::findOrFail($id);
         $order->orderDetail()->detach();
         $order->delete();
         return redirect()->back()->with('success', 'Order deleted');
     }
}
