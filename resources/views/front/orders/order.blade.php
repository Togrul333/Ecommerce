@extends('front.layouts.master')
@section('content')
    <form  method="post" action="{{route('order_place')}}">
        @csrf
        <div class="container " style="margin-top: 20px">
            <div class="row">
                <div class="col-md-5">
                    <div class="card" >
                        <div class="card-body " >
                            <h2>Basic details</h2>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">name</label>
                                    <input name="user_name" type="text" class="form-control" placeholder="name">
                                </div>
                                <div class="col-md-12">
                                    <label for="">number</label>
                                    <input name="user_number" type="text" class="form-control" placeholder="number">
                                </div>
                                <div class="col-md-12">
                                    <label for="">adress</label>
                                    <input name="user_address" type="text" class="form-control" placeholder="adress">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h2>Order details</h2>
                            <hr>
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                <tr>
{{--                                    <th class="product-name">{{tr('front', "Product name")}}</th>--}}
                                    <th class="product-name">Product name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $total = 0; @endphp
                                @foreach($cartItems as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <a href="">{{$item->product->name}}</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">$ {{$item->product->price}}</span>
                                        </td>

                                        <td class="product-quantity">
                                            <span class="amount">{{$item->product_qty}}</span>

                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">{{$item->product_qty * $item->product->price}}</span>
                                        </td>
                                    </tr>
                                    @php $total += $item->product->price * $item->product_qty; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="border: #1bd172" >
                            <div > <h1> Umumi mebleg :   <del > {{$total}}</del> deil  </h1> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button  type="submit"  title="Sil" class="btn btn-primary btn-block">Place order</button>

        </div>
    </form>




    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
