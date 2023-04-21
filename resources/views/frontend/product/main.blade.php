@extends('layouts.layout')
@section('content')
    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            @foreach($advertising->images as $img)

                <div class="hs-item set-bg" data-setbg="{{asset('/storage/'.$img->url)}}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 text-white">
                            <h2>{{$advertising->item->product->name}}</h2>
                            <p>{{$advertising->item->product->description}} </p>
                            <a href="#" class="site-btn sb-line">DISCOVER</a>
                            <a href="#" class="site-btn sb-white">ADD TO CART</a>
                        </div>
                    </div>
                    <div class="offer-card text-white">
                        <span>from</span>
                        <h2>${{$advertising->item->sale_price}}</h2>
                        <p>SHOP NOW</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="container">
            <div class="slide-num-holder" id="snh-1"></div>
        </div>
    </section>
    <!-- Hero section end -->



    <!-- Features section -->
    <section class="features-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{asset('img/icons/1.png')}}" alt="#">
                        </div>
                        <h2>Fast Secure Payments</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{asset('img/icons/2.png')}}" alt="#">
                        </div>
                        <h2>Premium Products</h2>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="{{asset('img/icons/3.png')}}" alt="#">
                        </div>
                        <h2>Free & fast Delivery</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features section end -->

    <!-- letest product section -->
    <section class="top-letest-product-section">
        <div class="container">
            <div class="section-title">
                <h2>LATEST PRODUCTS</h2>
            </div>
            <div class="product-slider owl-carousel">
                @foreach( $latestProduct as $item)
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="{{asset('/storage/'.$item->images->first()->url)}}" alt="">
                        <div class="pi-links">
                            <a href="{{route('showProduct',$item->items->first()->id)}}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                        </div>
                    </div>
                    <div class="pi-text">
                        <h6>${{$item->price}}</h6>
                        <p>{{$item->name}} </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- letest product section end -->



    <!-- Product filter section -->
    <section class="product-filter-section">
        <div class="container">
            <div class="section-title">
                <h2>BROWSE TOP SELLING PRODUCTS</h2>
            </div>
            <ul class="product-filter-menu">
                @foreach ($tools as $tool)
                    <li><a href="{{route('productCategory', ['client_menu' => $tool->id]) }}" >{{$tool->name}}</a></li>
                    @foreach($tool->child as $child)
                    <li><a href ="{{route('productCategory', ['client_menu'=>$child->id])}}" >{{$child->name}}</a></li>
                    @endforeach
                @endforeach
            </ul>
            <div class="row">
                    @foreach($Product as $product)
                        <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{asset('/storage/'.$product->images->first()->url)}}" alt="">
                            <div class="pi-links">
                                <a href="{{route('showProduct',$product->items->first()->id)}}" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>${{$product->price}}</h6>
                            <p>{{$product->name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center pt-5">
                <button class="site-btn sb-line sb-dark">LOAD MORE</button>
            </div>
        </div>
    </section>
    <!-- Product filter section end -->

    <!-- Banner section -->
   @if($advertising->child_img != null)
    <section class="banner-section">
        <div class="container">
            <div class="banner set-bg" data-setbg="{{asset('/storage/'.$advertising->child_img)}}">
                <div class="tag-new">NEW</div>
                <span>New Arrivals</span>
                @if($advertising->child_item_id != 0)
                <h2>{{$advertising->childItem->product->name}}</h2>
                <a href="#" class="site-btn">SHOP NOW</a>
                @endif
            </div>
        </div>
    </section>
    @endif
    <!-- Banner section end  -->
@endsection
