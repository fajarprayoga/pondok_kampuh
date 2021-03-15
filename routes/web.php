<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PondokKampuhController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Route::get('send-mail', function () {
   
//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];
   
//     \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\NotifOrder($details));
   
//     dd("Email is Sent.");
// });

Route::group(['middleware' => ['auth', 'verified']], function() {
    // route toko
    Route::get('home',[ PondokKampuhController::class, 'home'])->name('home');
    Route::get('/',[ PondokKampuhController::class, 'home'])->name('home');
    Route::get('home/produk/{slug}',[ PondokKampuhController::class, 'produk'])->name('produk');

    Route::get('dashboard', function () {
        return view('dashboard.index');
    });

    Route::post('dashboard-grafik', [DashboardController::class, 'grafik'])->name('dashboard.grafik');
    
    Route::resource('user', UserController::class)->names([
        'index' => 'user.index',
        'update' => 'user.update',
        'delete' => 'user.destroy'
    ]);
    
    Route::resource('product', ProductController::class)->middleware('can:isAdmin')->names([
        'index' => 'product.index',
        'create' => 'product.store',
        'update' => 'product.update',
        'delete' => 'product.destroy',
    ]);
    
    Route::resource('category', CategoryController::class)->middleware('can:isAdmin')->names([
        'index' => 'category.index',
        'create' => 'category.store',
        'update' => 'category.update',
        'delete' => 'category.destroy'
    ]); 

    Route::resource('order', OrderController::class)->middleware('can:isAdmin')->names([
        'index' => 'order.index',
        'create' => 'order.store',
        'update' => 'order.update',
        'delete' => 'order.destroy'
    ]); 

    Route::resource('profile', ProfileController::class)->names([
        'index' => 'profile.index',
        // 'create' => 'profile.store',
        'update' => 'profile.update',
        // 'delete' => 'profile.destroy'
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
    Route::get('home/history', [OrderController::class, 'historyOrder'])->name('historyOrder');
    Route::put('home/upload-bukti/{id}', [OrderController::class, 'buktiTransfer'])->name('buktiTransfer');
    
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('can:isAdmin')->name('dashboard.index');
    
    Route::get('notif-order/{id}', [OrderController::class, 'notif_order'])->name('notifOrder');
    Route::post('status-order/{id}', [OrderController::class, 'status_order'])->middleware('can:isAdmin')->name('statusOrder');

    Route::get('toko', [TokoController::class, 'index'])->middleware('can:isAdmin')->name('toko');
    Route::put('toko/update', [TokoController::class, 'update'])->middleware('can:isAdmin')->name('toko.update');


    // report
    Route::get('report-stock', [ProductController::class, 'report'])->middleware('can:isAdmin')->name('product.report');
    Route::get('report-order', [OrderController::class, 'report'])->middleware('can:isAdmin')->name('order.report');
});
Route::get('logout',[ AuthController::class, 'logout'])->name('auth.logout');

