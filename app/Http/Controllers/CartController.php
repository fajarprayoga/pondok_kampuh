<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart');
        $sizes = Size::all();
        return view('pondok_kampuh.cart', ['carts' => $cart, 'sizes' => $sizes]);
        // return dd($cart);
    }

    public function addCart($id, $idSize)
    {
        $cartid = $id.$idSize;
        $product = Product::findOrFail($id);
        // $size = Size::findOrFail($request->size);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $cartid => [
                        "id" => $cartid,
                        "productId" => $id,
                        "name" => $product->name, 
                        "quantity" => 1,
                        "price" => $product->price,
                        "priceTotal" => $product->price,
                        "size" => $idSize,
                        "weight" => $product->weight,
                        "weightTotal" => $product->weight,
                        "image" => $product->image[0]->name
                    ]
            ];
            session()->put('cart', $cart);
            return redirect('home')->with('success', 'Produk di tambahkan ke keranjang');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$cartid])) {
            $cart[$cartid]['quantity']++;
            $cart[$cartid]['priceTotal'] = $cart[$cartid]['price'] * $cart[$cartid]['quantity'];
            $cart[$cartid]['weightTotal'] = $cart[$cartid]['weight'] * $cart[$cartid]['quantity'];
            session()->put('cart', $cart);
            return redirect('home')->with('success', 'Produk di tambahkan ke keranjang');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$cartid] = [
            "id" => $cartid,
            "productId" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "priceTotal" => $product->price,
            "size" => $idSize,
            "weight" => $product->weight,
            "weightTotal" => $product->weight,
            "image" => $product->image[0]->name
        ];
        session()->put('cart', $cart);
        return redirect('home')->with('success', 'Produk di tambahkan ke keranjang');
        // return dd($cart);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');
        if($request->idProduct!= 'null'){
            $cartid = $request->idProduct.$request->idSize;
            if($request->id){
                if($request->idSize){
                    if(isset($cart[$cartid])){
                        $cart[$cartid]['quantity'] =$cart[$cartid]['quantity'] +  $cart[$request->id]['quantity'];
                        $cart[$cartid]['priceTotal'] =$cart[$cartid]['quantity'] * $cart[$cartid]['price'];
                        $cart[$request->id]['weightTotal'] = ( $cart[$cartid]['quantity'] +  $cart[$request->id]['quantity']) * $cart[$cartid]['weight'];
                        unset($cart[$request->id]);
                        session()->put('cart', $cart);
                        return 1;
                    }else{
                        $cart[$request->id]['size'] = $request->idSize;
                        session()->put('cart', $cart);
                        return 0;
                    }
                }       
            }
        }else{
            $cart[$request->id]['quantity'] = $request->qty;
            $cart[$request->id]['priceTotal'] =$request->qty * $cart[$request->id]['price'];
            $cart[$request->id]['weightTotal'] = $request->qty * $cart[$request->id]['weight'];
            session()->put('cart', $cart);
            return 0;
        }
    }

    public function removeCart($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                return redirect()->route('cart')->with('success', 'Produk di hapus dari keranjang');
            }
        }
    }

    public function removeAllCart()
    {
        $cart = session()->get('cart');
        if(isset($cart)){
            Session::forget('cart');
            return redirect()->route('cart')->with('success', 'Produk di hapus dari keranjang');
        }
    }
}
