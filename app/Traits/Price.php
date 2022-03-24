<?php

namespace App\Traits;


use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

trait Price
{
    /**
     * @param $discount
     * @param $id
     * @return string\
     */
    public function discount($id, ?int $discount = 0): string
    {
        $product = Product::findOrFail($id);
        return $discount ? $product->price - $discount : $product;
    }

    public function colorPrice($id)
    {
        $product = Product::findOrFail($id);
        if ($product->colorPrice) {
            if ($product->colorPrice == 'red') {
                return $discountcolor = $product->price - 1;

            }
            if ($product->colorPrice == 'yellow') {
                return $discountcolor = $product->price - 2;

            }
            if ($product->colorPrice == 'gray') {
                return $discountcolor = $product->price - 3;

            }

        } else {
            return $discountcolor = $product->price - 8;
        }


    }

}
