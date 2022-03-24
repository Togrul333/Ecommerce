@extends('admin.layouts.master')
@section('title','Create')
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><strong></strong></h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Создать продукт</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Определить катогорию продукта</label>
                        <select name="category_id" class="form-control" required>
                            <option>Secim yapiniz</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Фото продукта</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Описание продукта</label>
                        <textarea name="description" id="editor" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Создать продукт</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
