@extends('front.layouts.master')
@section('title','Brands')
@section('content')
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            @foreach($brands as $item)
                            <a href="{{route('brand',$item->name)}}"><img  src="{{$item->image}}" alt=""></a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    @include('front.widgets.brand-products')
@endsection

