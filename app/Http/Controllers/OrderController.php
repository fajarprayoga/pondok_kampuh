<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

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

     public function historyOrder()
     {
        $orders = Order::with('customer')
        ->with('orderDetail')
        ->latest()
        ->get();
         return view('pondok_kampuh.history_order', compact('orders'));
     }

     public function buktiTransfer($id, Request $request)
     {

        $order = Order::findOrFail($id);

        if($request->image){
            if($order->image != null){
                Storage::delete('public/'. $order->image);
            }

            $image= $request->image;
            $image_path = $image->store('bukti-transfer', 'public');
            $order->update([
                'image' =>   $image_path,
                'notif' => 'NOTNEW'
            ]);
            if($order){
                return redirect()->back()->with('success', 'Product is Added'); 
            }else{
                return 'gagal';
            }
        }else{
            return 'data kosong';
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
