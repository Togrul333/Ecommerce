<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ProductController extends Controller
{


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function admin()
    {
        // перед тем как вюшка будет отдана пользователю  будем проверять токое право
//        Gate::authorize('view-protected-part');
//     if .....   Gate::check('view-protected-part');

//        Gate::allows('view-protected-part');


//        // Более расширенно получает класс респонсе
//        $response = Gate::inspect('view-protected-part');
//        if ($response->denied()){
//            return $response->message();
//        }




        //        $response = Gate::inspect('view-protected-part');
//        // и данный респонсе содержит мотод allowed() если вернет true
//        $response->allowed();
//
//        // и данный респонсе содержит мотод denied() если вернет false
//        $response->denied();
//
//        // и данный респонсе содержит мотод message() который получет информацыю из гейта
//        $response->message();



//        $this->authorize('view-protected-part');

        //есть  какой нибудь из них из гейтов
////        if (Gate::any(['view-protected-part','view-protected-part2'])){
////            //razreseno
////        }


        //нет  какогота  из них из гейтов обратное действие
////        if (Gate::none(['view-protected-part','view-protected-part2'])){
////            //razreseno
////        }
///

        // все ети проверки можно зделать в бладе с помошь @can('view-protected-part') @endcan

//=========================================================================================================

        // обратите внимание на синтаксис здесь мы пишем кебаб кейсе а внутри политики (viewProtectedPart) камлкейсе
//     $this->authorize('view-protected-part',[self::class]);

        $response = Gate::inspect('view-protected-part',[self::class]);
        if ($response->denied())
        {
            abort($response->code(),$response->message());
        }

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
