@extends('layouts.layout')
@section('content')
<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>{{$category->name}}</h4>
        <div class="site-pagination">
            <a href="#">Home</a> /
            <a href="{{route('main')}}">Main</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- Category section -->
<section class="category-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Categories</h2>
                    <ul class="category-menu">
                        @foreach($tools as $tool)
                        <li><a href="{{route('category',$tool->id)}}">{{$tool->name}}</a>
                            @foreach($tool->products as $product)
                            <ul class="sub-menu">
                                <li><a href="{{route('showProduct',$product->items->first()->id)}}">{{$product->name}} <span></span></a></li>
                            </ul>
                            @endforeach
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">refine by</h2>
                    <div class="price-range-wrap">
                        <h4>Price</h4>
                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="{{$minMax['min']}}" data-max="{{$minMax['max']}}">
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
                        </div>
                        <div class="range-slider">
                            <div class="price-input">
                                <input type="text" id="minamount">
                                <input type="text" id="maxamount">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-widget mb-0">
                    <h2 class="fw-title">Size</h2>
                    <div class="fw-size-choose">
                        @foreach($size as $s)
                        <div class="sc-item">
                            <input type="radio" name="sc" id="{{$s}}">
                            <label for="xs-size">{{$s}}</label>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>

            <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">
                    @foreach ($products as $product )
                    @foreach ($product->items as $item)
                        <div class="col-lg-4 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                @if($item->sale > 0)
                                <div class="tag-sale">ON SALE</div>
                                @endif
                                    <a href="{{route('showProduct',$item->id)}}">
                                    <img src="{{asset('/storage/'.$product->images->first()->url)}}" alt="">
                                    </a>

                                    <div class="pi-links">
                                    <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                </div>
                            </div>
                            <div class="pi-text">
                                <h6>${{$item->sale_price}}</h6>
                                <a href="{{route('showProduct',$item->id)}}">
                                <p>{{$product->name}}</p>
                                <p>{{'Size:'.$item->size}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                        @endforeach
                    <div class="text-center w-100 pt-3">
                        <button class="site-btn sb-line sb-dark">LOAD MORE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category section end -->
@endsection
