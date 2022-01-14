<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/shop-list', function () {
    return view('shop-list');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('/products', [ProductController::class, 'index'])->name('index');
Route::get('/products/search', [ProductController::class, 'search'])->name('search');
