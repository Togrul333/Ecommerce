<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Traits\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{



    public function order()
    {
        $userid = Auth::id();
        $cartItems = Cart::where('user_id', $userid)->get();
        return view('front.orders.order',compact('cartItems'));
    }
    public function order_place(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->user_name = $request->user_name;
        $order->user_address =$request->user_address;
        $order->user_number = $request->user_number;
        $order->save();

        $userauthid = Auth::id();
        $cartItems = Cart::where('user_id', $userauthid)->get();
        foreach ($cartItems as $item){
            OrderItem::create([
               'ord_id'=>$order->id,
               'prod_id'=>$item->product_id,
               'prod_qty'=>$item->product_qty,
               'price'=>$item->product->price,
            ]);
        }

        Cart::destroy($cartItems);


        return redirect()->route('Homepage');
    }

}
