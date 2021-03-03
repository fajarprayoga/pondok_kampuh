<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use SebastianBergmann\Environment\Console;

class DashboardController extends Controller
{
    public function index()
    {
        $product = Product::all()->count();
        $order = Order::where('status', 'PENDING')->count();
        $user = User::all()->count();
        $category = Category::all()->count();

        $data = [
            'product' => $product,
            'order' => $order,
            'user' => $user,
            'category' => $category
        ];
        return view('dashboard.index', compact('data'));
    }
}
