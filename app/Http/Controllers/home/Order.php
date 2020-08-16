<?php

namespace App\Http\Controllers\home;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Order extends Controller
{
    public function index()
    {
        return view('home.Order.index');
    }

    public function post_order(Request $r, CartHelper $c)
    {
        if ($order = \App\Models\Order::create([
            'name' => $r->name,
            'email' => $r->email,
            'address' => $r->address,
            'phone' => $r->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])) {
            $order_id = $order->id;
            foreach ($c->items as $product_id => $item) {
                $quantity = $item['quantity'];
                $price = $item['price'];
                $group_category_id = $item['group_category_id'];
                $product_name = $item['name'];
                $data = new OrderProduct();
                $data->product_id = $product_id;
                $data->order_id = $order_id;
                $data->name = $product_name;
                $data->quantity = $quantity;
                $data->group_category_id = $group_category_id;
                $data->created_at = Carbon::now();
                $data->updated_at = Carbon::now();
                $data->save();
            }
            session(['cart' => '']);
            return redirect()->route('cart')->with('success', 'Đặt hàng thành công!');
        }
    }
}
