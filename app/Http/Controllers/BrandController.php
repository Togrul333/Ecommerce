<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brands()
    {
        $data['brands'] = Brand::all();
        $brand = Brand::first();
        $data['brand'] = $brand;
        return view('front.brands.brand', $data);
    }
    public function brand($name)
    {
        $brands = Brand::all();

        $brand = Brand::where('name',$name)->first();

        if (!$brand)
        {
            abort(404);
        }

        $data['brand'] = $brand;
        $data['brands'] = $brands;

        return view('front.brands.brand',$data);
    }
}
