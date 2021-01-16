<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('auth.login');
});



Route::resource('user', UserController::class)->names([
    'index' => 'user.index'
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
