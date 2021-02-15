<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PondokKampuhController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('register', function () {
//     return view('auth.register');
// });

Route::get('login',[ AuthController::class, 'login'])->name('auth.login');
Route::post('login-process',[ AuthController::class, 'loginAction'])->name('auth.loginAction');

Route::get('register',[ AuthController::class, 'register'])->name('auth.register');
Route::post('register-process',[ AuthController::class, 'registerAction'])->name('auth.registerAction');

// route toko
Route::get('home',[ PondokKampuhController::class, 'home'])->name('home');
Route::get('home/produk/{slug}',[ PondokKampuhController::class, 'produk'])->name('produk');


Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    });
    
    Route::resource('user', UserController::class)->names([
        'index' => 'user.index',
        'update' => 'user.update'
    ]);
    
    Route::resource('product', ProductController::class)->names([
        'index' => 'product.index',
        'create' => 'product.store',
        'update' => 'product.update',
        'delete' => 'product.destroy',
    ]);
    
    Route::resource('category', CategoryController::class)->names([
        'index' => 'category.index',
        'create' => 'category.store',
        'update' => 'category.update',
        'delete' => 'category.destroy'
    ]); 

    Route::get('home/cart',[ CartController::class, 'cart'])->name('cart');
    Route::get('home/cart/add/{id}/size/{size}',[ CartController::class, 'addCart'])->name('addCart');
    Route::get('home/cart/update',[ CartController::class, 'updateCart'])->name('updateCart');
    Route::delete('home/cart/remove/{id}',[ CartController::class, 'removeCart'])->name('removeCart');
    Route::delete('home/cart/remove',[ CartController::class, 'removeAllCart'])->name('removeAllCart');

    Route::get('home/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('home/province', [CheckoutController::class, 'get_province'])->name('province');
    Route::get('home/city/{id}', [CheckoutController::class, 'get_city'])->name('city');
    // Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}','CheckoutController@get_ongkir');
    Route::get('home/ongkir/destination={city_destination}&weight={weight}&courier={courier}', [CheckoutController::class, 'get_ongkir'])->name('ongkir');
    Route::post('home/checkout/process', [CheckoutController::class, 'process'])->name('processCheckout');
    Route::get('logout',[ AuthController::class, 'logout'])->name('auth.logout');
});

