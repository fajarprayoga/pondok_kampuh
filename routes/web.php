<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('home',[ HomeController::class, 'index'])->name('home');

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

    Route::get('logout',[ AuthController::class, 'logout'])->name('auth.logout');
});

