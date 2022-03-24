<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FetchController extends Controller
{
    public function fetch()
    {
    return view('fetch.fetch');
    }

    public function index()
    {
        $products = Product::all();
        return response()->json([
            'data' => $products,
        ], 200);
    }


    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->category_id = $request->get('category_id');
        $product->description = $request->get('description');
        $product->brands_id = $request->get('brands_id');
        $product->slug = Str::slug($request->get('name'));
//        if ($request->hasFile('image')) {
//            $ImageName = Str::slug($request->get('name')) . '.' . $request->image->getClientOriginalExtension();
//            $request->image->move(public_path('uploads'), $ImageName);
//            $product->image = '/uploads/' . $ImageName;
//        }
        $product->save();

        return response()->json([
            'data' => $product,
        ], 200);
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        $data['product'] = $product;

        return response()->json([
            'data' => $product,
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->category_id = $request->get('category_id');
        $product->description = $request->get('description');
        $product->slug = Str::slug($request->get('name'));
        if ($request->hasFile('image')) {
            $ImageName = Str::slug($request->get('name')) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $ImageName);
            $product->image = '/uploads/' . $ImageName;
        }
        $product->save();

        return response()->json([
            'data' => $product,
        ], 200);
    }


    public function destroy($id)
    {
         Product::find($id)->delete();

        return response()->json([
            'success' => true,
        ], 200);
    }
}
