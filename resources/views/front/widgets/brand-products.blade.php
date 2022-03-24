@if(isset($brand) && count($brand->products)>0)
        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    @foreach($brand->products as $product)
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="">
{{--                                    <img src="{{asset('ustora/')}}/img/product-2.jpg" alt="">--}}
                                    <img src="{{$product->image}}" alt="">
                                </a>
                            </div>
                            <h2>{{$product->name}}</h2>
                            <h2>Mehsulun brendi - {{$brand->name}}</h2>
                            <div class="product-carousel-price">
                                <ins>$ {{$product->price}}</ins> <del>$ {{$product->price + 29}}</del>
                            </div>
                            <form  method="post" action="{{route('add-to-cart')}}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button  type="submit" href="" class="add-to-cart-link center-block"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
{{--                <div class="row">--}}
{{--                 {{$products->links()}}--}}
{{--                </div>--}}
            </div>
        </div>
@else
    <div class="alert alert-danger">
        <h1>Bu Brende aid mehsul yoxdu.</h1>
    </div>
@endif
