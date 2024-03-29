<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public $apiKey =  "key: a4dcb505f795abcf44a5d341babfb85e";
    
    // index
    public function index()
    {
        $cart = session()->get('cart');
        $weight = array_sum(array_column($cart, 'weightTotal')); 
        $total = array_sum(array_column($cart, 'priceTotal')); 
        $provinsi = $this->get_province();
        return view('pondok_kampuh.checkout', ['province' => $provinsi, 'weight' => $weight, 'total' => $total]);
        // // return dd($provinsi[0]['province']);
        // return $weight;
    }

    // process
    public function process(Request $request)
    {
        $cart = session()->get('cart');
        $karakter = $request->id.$request->name.$request->total.$request->codepos;
        $shuffle  = str_shuffle($karakter);
        $code = mb_substr($shuffle,0,6);
        $total = array_sum(array_column($cart, 'priceTotal')); 
        $data = [
            'users_id' => Auth::user()->id,
            'code' => '#'.$code,
            'name' => $request->name, 
            'email' => $request->email,
            'destination' =>$request->province .' '. $request->city.' '. $request->address, 
            'phone' => $request->phone,
            'courier' => $request->courier,
            'service' => (int)$request->service,
            'postcode' => $request->codepos,
            'total' => ($total + $request->priceOngkir)
        ];

        $order = Order::create($data);

        if($order && $cart){
            foreach($cart as $index => $item){
                $order->orderDetail()->attach(
                    $item['productId'], 
                    [
                        'quantity' => $item['quantity'], 
                        'price' => $item['price'],
                        'size' => $item['size']
                    ]
                        
                );
                    // $product = Product::findOrFail($item['productId']);
                    // $product->stock =  ($product->stock - $item['quantity']);
                    // $product->save();
                    // $size = Size::findOrFail($item['size']);
                    // $size->stock =  ($size->stock - $item['quantity']);
                    // $size->save();

                    // $product->stock = (($product->stock - $cart['quantity']));
            }
            Session::forget('cart');
            return redirect()->route('cart')->with('success', 'Produk di tambahkan di keranjang');
            // return'Checkout Berhasil';
        }else{
            return 'Checkout Gagal';
        }
        // return var_dump($data);
    }


    // Province
    public function get_province(){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);
            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
        
    }
    
    // city
    public function get_city($id){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
        // return 'cite';
    }

    // ongkir
    public function get_ongkir($destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=17&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                $this->apiKey
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }

}
