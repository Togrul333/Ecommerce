<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $data['products'] = Product::orderBy('created_at', 'desc')->get();
        return view('front.index',$data);
    }
    public function shop()
    {
        return view('front.maqazin');
    }
}
