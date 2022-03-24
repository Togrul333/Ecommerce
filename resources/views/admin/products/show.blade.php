@extends('admin.layouts.master')
@section('title','Create')
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">{{$product->category->name}}</a>
                            <a href="">{{$product->name}}</a>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{asset('ustora/')}}/img/product-2.jpg" alt="">
                                    </div>

                                    <div class="product-gallery">
                                        <img src="{{asset('ustora/')}}/img/product-thumb-1.jpg" alt="">
                                        <img src="{{asset('ustora/')}}/img/product-thumb-2.jpg" alt="">
                                        <img src="{{asset('ustora/')}}/img/product-thumb-3.jpg" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>${{$product->price}}</ins>
                                        <del>${{$product->price + 100}}</del>
                                    </div>

                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty"
                                                   value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Product Description</h2>
                                            <p>{{$product->description}}</p>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('ustora/')}}/style.css">
    <link rel="stylesheet" href="{{asset('ustora/')}}/css/responsive.css">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

@endsection
@section('js')
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="{{asset('ustora/')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('ustora/')}}/js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="{{asset('ustora/')}}/js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="{{asset('ustora/')}}/js/main.js"></script>
@endsection
