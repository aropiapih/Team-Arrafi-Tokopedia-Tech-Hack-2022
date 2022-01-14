<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cartData = User::find(Auth::id())->cart()->first()->product();

        return $cartData;
    }

    public function add(Request $request)
    {
        Cart::insert([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return null;
    }

    public function delete(Request $request)
    {
        Cart::find($request->product_id)->delete();

        return null;
    }
}
