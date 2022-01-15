<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShoppingListController;
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

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::get('/profile', function () {
    return view('profile');
});

require __DIR__ . '/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// products home and search
Route::group(['prefix' => '/products', 'middleware' => 'auth'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/search', [ProductController::class, 'search'])->name('search');
});

// user profile
Route::group(['prefix' => '/profile', 'middleware' => 'auth', 'as' => 'user.'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/update', [UserController::class, 'updateShoppingLimit'])->name('updateShoppingLimit');
});

// cart
Route::group(['prefix' => '/cart', 'middleware' => 'auth', 'as' => 'cart.'], function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/delete', [CartController::class, 'delete'])->name('delete');
});

// shopping list
Route::group(['prefix' => '/shop-list', 'middleware' => 'auth', 'as' => 'shoppingList.'], function () {
    Route::get('/', [ShoppingListController::class, 'index'])->name('index');
    Route::post('/add', [ShoppingListController::class, 'store'])->name('store');
    Route::post('/delete', [ShoppingListController::class, 'delete'])->name('delete');
});

// Item list
Route::group(['prefix' => '/shop-list/{id}', 'middleware' => 'auth', 'as' => 'itemList.'], function () {
    Route::get('/', [ItemListController::class, 'index'])->name('index');
    Route::post('/add', [ItemListController::class, 'store'])->name('store');
    Route::post('/delete', [ItemListController::class, 'delete'])->name('delete');
});

Route::middleware('auth')->post('/place_order', [OrderController::class, 'placeOrder']);
