@extends('front.layouts.master')
@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="center-block col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Endirim</th>
                                    <th class="product-subtotal">Total</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php $total = 0; @endphp
                                @foreach($cartItems as $item)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <form method="post" action="{{route('carts.destroy',$item->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background: orangered; margin-top: 10px" type="submit"
                                                        title="Sil" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href=""><img width="145" height="145"
                                                            alt="poster_1_up"
                                                            class="shop_thumbnail"
                                                            src="{{$item->product->image}}"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="">{{$item->product->name}}</a>
                                            <a href="">{{$item->product->id}}</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">$ {{$item->product->price}}</span>
                                        </td>

                                        <td class="product-quantity">
                                            <form method="post" action="{{route('carts.update',$item->id)}}">
                                                @csrf
                                                @method('put')
                                                <div class="quantity buttons_added">
                                                    <input type="number" size="4" class="input-text qty text"
                                                           name="product_item_qty"
                                                           title="Qty" value="{{$item->product_qty}}" min="0" step="1">
                                                    <button type="submit"><i class="fa fa-pencil"></i></button>
                                                </div>
                                            </form>
                                        </td>

                                        <td>
                                        @if (!$item->product->colorPrice)
                                            <span>
{{--                                                //cartin discountunu istifade etmek ucun--}}
                                                {{--                                                {{$item->product->discount($item->product->id, $item->discoun)}}--}}

                                                {{--                                                productun discountu --}}
                                                {{$item->product->discount($item->product->id, 15)}} $
                                            </span>
                                        @else
                                           <span>
                                                {{$item->product->colorPrice($item->product->id)}} $ rengine gore endirim
                                            </span>
                                        @endif
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{$item->product_qty * $item->product->price }}</span>
                                        </td>
                                    </tr>
                                    @php $total += $item->product->price * $item->product_qty ; @endphp
                                @endforeach
                                </tbody>
                            </table>
                            {{--                            //22222222222222222222222222222--}}
                            <div class="cart-collaterals">
                                <div class="cross-sells">
                                    <h2>ВАС МОЖЕТ ЗАИНТЕРЕСОВАТЬ ...</h2>
                                    <ul class="products">
                                        @foreach($productDay as $prodDay)
                                            <li class="product">
                                                <a href="">
                                                    <img width="325" height="325" alt="T_4_front"
                                                         class="attachment-shop_catalog wp-post-image"
                                                         src="{{asset('ustora/')}}/img/product-2.jpg">
                                                    <h3>{{$prodDay->name}}</h3>
                                                    <span class="price"><span
                                                            class="amount">$ {{$prodDay->price}}</span></span>
                                                </a>
                                                <form method="post" action="{{route('add-to-cart')}}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$prodDay->id}}">
                                                    <button type="submit" href="" class="add-to-cart-link center-block">
                                                        <i class="fa fa-shopping-cart"></i> Add to cart
                                                    </button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                {{--                                //2.2--}}
                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>

                                    <table cellspacing="0">
                                        <tbody>
                                        <tr class="shipping">
                                            <th>Доставка и погрузка</th>
                                            <td>Бесплатная доставка</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total price</th>
                                            <td><strong><span class="amount">{{$total}} $</span></strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <h2>перейти к оформлению заказа</h2>
                                    <a href="{{route('order')}}">
                                        <button class="btn btn-block btn-primary">Оформить заказ</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
