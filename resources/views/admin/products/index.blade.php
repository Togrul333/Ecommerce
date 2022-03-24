@extends('admin.layouts.master')
@section('title','Esas seyfe')
@section('content')
    <div class="container">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table ">
                <thead>
                <tr style="border-top: 2px solid #5a88ca">
                    <th>image</th>
                    <th>Makale Basligi</th>
                    <th>Kategoriyas</th>
                    <th>Olusturma tarixi</th>
                    <th><a href="{{route('products.create')}}" title="Create new product"
                                     class="btn btn-sm btn-primary">   <i class="fa fa-pencil"></i> Create new product</a></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{$product->image}}" width="200">
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td  >
                            <a target="_blank" style="margin-top: 20px" href="{{route('products.show',$product->id)}}" title="Goruntule" class="btn btn-sm btn-success"><i
                                    class="fa fa-eye"></i></a>
                            <a href="{{route('products.edit',$product->id)}}" style="margin-top: 20px" title="Dizenle"
                               class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            <br>
                            <form  method="post" action="{{route('products.destroy',$product->id)}}">
                                @csrf
                                @method('DELETE')
                                <button style="background: orangered; margin-top: 10px" type="submit"  title="Sil" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
       <div class="text-center"> {{ $products->links() }}</div>

    </div>
    </div>
@endsection
