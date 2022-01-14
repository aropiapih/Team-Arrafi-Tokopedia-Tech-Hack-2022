<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        /** @var int[] $product_ids */
        $product_ids = $request->post('product_ids');

        DB::beginTransaction();

        try {
            /** @var OrderDetail[] $order_details */
            $order_details = [];
            $amount = 0;
            foreach ($product_ids as $product_id) {
                Cart::where('product_id', $product_id)->delete();
                $order_detail = new OrderDetail();
                $order_detail->product_id = $product_id;
                $order_details[] = $order_detail;
                $product = Product::find($product_id);
                $amount += $product->price;
            }

            $order = new Order();
            $order->amount = $amount;
            $order->user_id = Auth::id();
            $order->save();
            $order->detail()->saveMany($order_details);
        } catch (Throwable) {
            DB::rollBack();
        }

        DB::commit();
    }
}
