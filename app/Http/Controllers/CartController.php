<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Traits\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $productDay = Product::where('brands_id', 1)->inRandomOrder()->paginate(2);
        $userid = Auth::id();
        $cartItems = Cart::where('user_id', $userid)->get();
        return view('front.cart', compact('cartItems','productDay'));
    }

    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $cart = new Cart();
            $cart->user_id = Auth::id();
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect()->back()->with('message', 'added to cart');
        } else {
            return redirect()->back()->withErrors('login', 'login olun');
        }

    }

    public function cartDelete(Request $request, $id)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->product_qty = $request->get('product_item_qty');
        $cart->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            // $cartItem=Cart::where('id',$id)->first();
            //$cartItem->delete();
            Cart::find($id)->delete();

            return redirect()->back()->with('message', 'deleted  cart');

        } else {
            return redirect()->back()->withErrors('login', 'login olun');

        }
    }
}
