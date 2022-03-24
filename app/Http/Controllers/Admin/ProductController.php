<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }

    public function index()
    {
       $data['products'] = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.products.index',$data);
    }


    public function create()
    {
        $data['categories'] = Category::all();

        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:3',
            'image' => 'required|image',
        ]);

        $product = new Product();
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

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $data['product']=$product;
        return view('admin.products.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['product'] = Product::findOrFail($id);
        return view('admin.products.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'min:3',
            'image' => 'image',
        ]);

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
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->route('products.index');

    }
}
