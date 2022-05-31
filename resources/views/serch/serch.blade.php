<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    {{--    <link rel="stylesheet" href="stil.css" />--}}
</head>
<body class="bg-info">
<div class="container">

    <div class="row mt-4">
        <form action=" {{route('products')}}" method="get">
            <div class="form-group">
                <label for="search">Search products</label>
                <input type="text" name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif class="form-control" id="search">
            </div>
            <br>
            <div class="mb-3">
                <div class="form-label">Categories</div>
                <select name="category_id" class="form-select form-select-sm">
                    <option ></option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(isset($_GET['category_id'])) @if($_GET['category_id']==$category->id) selected @endif @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <hr>
        <h2>Products</h2>
        <ul>
            @foreach($products as $product)
                <li>{{$product->name}}</li>
            @endforeach
        </ul>
    </div>
</div>

<script src="custom.js"></script>
</body>
</html>
