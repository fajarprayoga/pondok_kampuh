<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PondokKampuhController extends Controller
{
    public function home()
    {
        $product = Product::where('stock', '>', 0)->latest()->paginate(6);
        return view('pondok_kampuh/home', ['products' => $product]);
        // return dd($product);
    }

    public function produk($slug)
    {
        $product = Product::where('slug', $slug)->get()->first();
        return view('pondok_kampuh/produk', ['product' => $product ]);
        // return dd($product);
    }

}
