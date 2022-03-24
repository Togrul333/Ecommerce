@extends('admin.layouts.master')
@section('title','Create')
@section('content')
  <div class="container">
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary " style="margin-top: 10px;"><strong> Update Product - {{$product->name}} </strong></h6>
          </div>
          <div class="card-body">
              <form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                      <label>Product name</label>
                      <input type="text" name="name" class="form-control" value="{{$product->name}}" required>
                  </div>
                  <div class="form-group">
                      <label>Product Kategory</label>
                      <select name="category_id" class="form-control" required>
                          <option>Secim yapiniz</option>
                          @foreach($categories as $category)
                              <option @if($product->category_id == $category->id) selected @endif  value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Product image</label>
                      <input type="file" name="image" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Product description</label>
                      <textarea name="description" id="editor" class="form-control" rows="4">{{$product->description}}</textarea>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Update product</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection

