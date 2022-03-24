@extends('front.layouts.master')
@section('title','Esas seyfe')
@section('content')
{{--    //4--}}
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <li>
                    <img src="{{asset('ustora/')}}/img/h4-slide.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            iPhone <span class="primary">6 <strong>Plus</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Dual SIM</h4>
                        <a class="caption button-radius" href="{{asset('ustora/')}}/#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="{{asset('ustora/')}}/img/h4-slide2.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            by one, get one <span class="primary">50% <strong>off</strong></span>
                        </h2>
                        <h4 class="caption subtitle">school supplies & backpacks.*</h4>
                        <a class="caption button-radius" href="{{asset('ustora/')}}/#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="{{asset('ustora/')}}/img/h4-slide3.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Select Item</h4>
                        <a class="caption button-radius" href="{{asset('ustora/')}}/#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
                <li><img src="{{asset('ustora/')}}/img/h4-slide4.png" alt="Slide">
                    <div class="caption-group">
                        <h2 class="caption title">
                            Apple <span class="primary">Store <strong>Ipod</strong></span>
                        </h2>
                        <h4 class="caption subtitle">& Phone</h4>
                        <a class="caption button-radius" href="{{asset('ustora/')}}/#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- ./Slider -->
    </div> <!-- End slider area -->
{{--    //6--}}
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Products</h2>
                        <div class="product-carousel">
                            @foreach($products as $product)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{asset('ustora/')}}/img/product-5.jpg" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <form  method="post" action="{{route('add-to-cart')}}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button  type="submit" href="" class="add-to-cart-link center-block"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                                </form>

                                <h2><a href="">{{$product->name}}</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$ {{$product->price}}</ins> <del>$ {{$product->price + 50}}</del>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
{{--    //8--}}
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
{{--                //1--}}
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Лучшие новинки</h2>
                        <div class="single-wid-product">
                            <a href="{{asset('ustora/')}}/single-product.html"><img src="{{asset('ustora/')}}/img/product-thumb-1.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="{{asset('ustora/')}}/single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                    </div>
                </div>
{{--                //2--}}
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Недавно просмотренные</h2>
                        <div class="single-wid-product">
                            <a href="{{asset('ustora/')}}/single-product.html"><img src="{{asset('ustora/')}}/img/product-thumb-4.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="{{asset('ustora/')}}/single-product.html">Sony playstation microsoft</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                    </div>
                </div>
{{--                //3--}}
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Самые лучшие</h2>
                        <div class="single-wid-product">
                            <a href="{{asset('ustora/')}}/single-product.html"><img src="{{asset('ustora/')}}/img/product-thumb-3.jpg" alt="" class="product-thumb"></a>
                            <h2><a href="{{asset('ustora/')}}/single-product.html">Apple new i phone 6</a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins>$400.00</ins> <del>$425.00</del>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
@endsection
