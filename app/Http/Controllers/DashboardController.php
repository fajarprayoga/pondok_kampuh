<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::all()->count();
        $order = Order::where('status', 'PENDING')->count();
        $user = User::all()->count();
        $category = Category::all()->count();

        $stock = Product::where('stock', '<=', '10')->get();

        $data = [
            'product' => $product,
            'order' => $order,
            'user' => $user,
            'category' => $category,
            'stock' => $stock
        ];
        return view('dashboard.index', compact('data'));
    }

    public function grafik(){
        $orders = DB::table('orderdetail')->join('products', 'orderdetail.product_id', 'products.id')
        ->select('products.name', DB::raw('SUM(orderdetail.quantity) as quantity '))
        ->groupBy('orderdetail.product_id')
        ->take(5)
        ->orderBy('quantity', 'DESC')
        ->get();

        // $orders = DB::table('products')
        // ->take(5)
        // ->orderBy('stock', 'ASC')
        // ->get();

        return ['donut' => $orders];
    }
}
