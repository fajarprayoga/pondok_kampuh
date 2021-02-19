<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $product = Product::findOrFail($id);
        // $size = Size::findOrFail($request->size);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "id" => $id,
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
        // // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['priceTotal'] = $cart[$id]['price'] * $cart[$id]['quantity'];
            $cart[$id]['weightTotal'] = $cart[$id]['weight'] * $cart[$id]['quantity'];
            session()->put('cart', $cart);
            return redirect('home')->with('success', 'Produk di tambahkan ke keranjang');
        }
        // // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $id,
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
        // return dd($size->name);
    }

    public function updateCart(Request $request)
    {
        if($request->id){
            if($request->idSize){
                $cart = session()->get('cart');
                $cart[$request->id]['size'] = $request->idSize;
                $cart[$request->id]['quantity'] = $request->qty;
                $cart[$request->id]['priceTotal'] = $request->qty * $cart[$request->id]['price'];
                $cart[$request->id]['weightTotal'] = $request->qty * $cart[$request->id]['weight'];
                session()->put('cart', $cart);
            }
        }
        return ($cart[$request->id]['weightTotal'] );
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
