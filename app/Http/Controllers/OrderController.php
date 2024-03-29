<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use PDF;

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
        dd($orders[0]->orderDetail[0]->size);
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
        $banks = Bank::all();

        if($order){
            $order = Order::findOrFail($id);
            if($order->status == 'SUCCESS'){
                $details = [
                    'title' => 'Orderan sudah sampai dengan code  '. $order->code,
                    'body' => 'Terimah kasih telah berbelanja di toko kami ' . $order->email ,
                    // 'bank' => $banks
                ];     
                Mail::to(Auth::user()->email)->send(new \App\Mail\NotifOrder($details));
                foreach($order->orderDetail as $item){
                    $product = Product::findOrFail($item->id);
                    $product->stock =  ($product->stock - $item->pivot->quantity);
                    $product->save();
                    $size = Size::findOrFail($item->pivot->size);
                    $size->stock =  ($size->stock - $item->pivot->quantity);
                    $size->save();
                }
            }
            return redirect()->back()->with('success', 'Order status is updated');
        }else{
            return redirect()->back()->with('danger', 'Order status is not updated');
        }
     }

     public function historyOrder()
     {
        $orders = Order::where('users_id', '=', Auth::user()->id)
            ->with('orderDetail')
            ->latest()
            ->get();
        return view('pondok_kampuh.history_order', compact('orders'));
     }

     public function buktiTransfer($id, Request $request)
     {

        $order = Order::findOrFail($id);
        $banks = Bank::all();
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
                $details = [
                    'title' => 'Verifikasi Bukti Orderan '. $order->code . ' from '. $order->email,
                    'body' => 'Cek Bukti Pembayaran dari orderan dengan code '. $order->code,
                    'bank' => null
                ];
                       
                Mail::to('admin@pondok_kampuh.com')->send(new \App\Mail\NotifOrder($details));
                return redirect('home')->with('success', 'termia kasih, mohon cek berskala status orderan id '. $order->code );
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

     public function report(Request $request)
     {
        // $orders = Order::where('status', 'SUCCESS')->with('customer')
        // ->with('orderDetail')
        // ->latest()
        // ->get();
        //  return view('order.report', compact('orders'));

        
        if($request->filter == 1){
            $orders = Order::with('customer')
            ->with('orderDetail')
            ->latest()
            ->whereDate('created_at', '>', Carbon::now()->subDays(7))
            ->get();
        }else if($request->filter == 2){
            $orders = Order::with('customer')
            ->with('orderDetail')
            ->latest()
            ->whereDate('created_at', '>', Carbon::now()->subDays(30))
            ->get();
        }else if($request->filter == 3){
            $orders = Order::with('customer')
            ->with('orderDetail')
            ->latest()
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        }else if($request->filter == 4){
            $orders = Order::with('customer')
            ->with('orderDetail')
            ->latest()
            ->whereDate('created_at', '>', Carbon::now()->subMonth()->month)
            ->get();
        }
        $pdf = PDF::loadView('order.report', compact('orders'))->setPaper('a4', 'landscape');
        return $pdf->stream();
     }
}
