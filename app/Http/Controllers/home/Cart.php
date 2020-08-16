<?php

namespace App\Http\Controllers\home;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Cart extends Controller
{
    public function cart()
    {
        return view('home.Cart.index');
    }

    public function add(CartHelper $cart, $id)
    {
        $product = Product::find($id);
        $cart->add($product);
        return redirect()->back();
    }

    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function update(CartHelper $cart, $id)
    {
        if (request()->quantity >= 1) {
            $quantity = request()->quantity ? request()->quantity : 1;
            $cart->update($id, $quantity);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Số lượng sản phẩm không đc nhỏ hơn 1!');
        }
    }

    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
}
