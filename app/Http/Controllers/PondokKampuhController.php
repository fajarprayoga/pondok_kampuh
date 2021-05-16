<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PondokKampuhController extends Controller
{
    public function home(Request $request)
    {
        if(!empty($request->search)){
            $product = Product::where('name', 'LIKE', "%$request->search%")->where('stock', '>', 0)->where('status', 'ACTIVE')->latest()->paginate(6);
        }else{
            $product = Product::where('stock', '>', 0)->where('status', 'ACTIVE')->latest()->paginate(6);
        }

        return view('pondok_kampuh/home', ['products' => $product]);
    }

    public function produk($slug)
    {
        $product = Product::where('slug', $slug)->get()->first();
        return view('pondok_kampuh/produk', ['product' => $product ]);
        // return dd($product);
    }

}
